<?php

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData ) {
        return redirect("/login");
    }

    $books = Book::paginate(25);

    return view('books.index', ["books" => $books]);
});
Route::get('books/create', function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData ) {
        return redirect("/login");
    }

    $categories = Category::all();

    return view('books.create', [ 'categories' => $categories ]);
});
Route::post('books/create', function () {
    $validated = request()->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'isbn' => 'required|string|unique:books,ISBN|max:17',
        'publication_year' => 'required|integer|digits:4',
        'image' => 'nullable|url',
        'description' => 'nullable|string|max:2000',
        'category' => 'nullable|array', // This ensures it's an array
        'category.*' => 'exists:categories,id', // Validates that each selected category ID exists in the categories table
    ]);

    $book = Book::create([
        'title' => $validated['title'],
        'author' => $validated['author'],
        'ISBN' => $validated['isbn'],
        'publication_year' => $validated['publication_year'],
        'image_url' => $validated['image'] ?? null,
        'description' => $validated['description'],
    ]);

    if (isset($validated['category'])) {
        $categoryIds = array_map('intval', $validated['category']);  // Convert all category IDs to integers
        $book->categories()->attach($categoryIds);
    }

    return redirect("/book/{$book->id}");
});
Route::get('books/edit/{id}', function ($id) {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData ) {
        return redirect("/login");
    }

    $categories = Category::all();
    $book = Book::with('categories')->find($id);

    if (!$book) {
        abort(404, 'Book not found');
    }

    return view('books.edit', ['book' => $book, 'categories' => $categories ]);
});
Route::put('books/edit/{id}', function ($id) {
    $book = Book::find($id);

    if (!$book) {
        abort(404, 'Book not found');
    }

    $validated = request()->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'isbn' => 'required|string|max:17|unique:books,ISBN,' . $book->id,
        'publication_year' => 'required|integer|digits:4',
        'image' => 'nullable|url',
        'description' => 'nullable|string|max:2000',
        'category' => 'nullable|array', // Ensures 'category' is an array
        'category.*' => 'exists:categories,id', // Validates each category ID
    ]);

    $book->update([
        'title' => $validated['title'],
        'author' => $validated['author'],
        'ISBN' => $validated['isbn'],
        'publication_year' => $validated['publication_year'],
        'image_url' => $validated['image'] ?? null,
        'description' => $validated['description'],
    ]);

    if (isset($validated['category'])) {
        $book->categories()->sync($validated['category']);
    }

    return redirect("/book/{$book->id}");
});
Route::get('book/{id}', function ($id) {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData ) {
        return redirect("/login");
    }

    $book = Book::with('categories')->find($id);

    if (!$book) {
        abort(404, 'Book not found');
    }

    return view('books.show', ['book' => $book]);
});
Route::delete('book/{id}', function ($id) {
    $book = Book::find($id);

    if (!$book) {
        return abort(404, 'Book not found');
    }

    $book->delete();

    return redirect('/');
});
Route::post('book/borrow/{id}', function ($id) {
    $userData = FacadesAuth::user();
    $book = Book::find($id);

    if (!$book) {
        return abort(404, 'Book not found');
    }

    $book->user_id = $userData->id;
    $book->borrowed_date = Carbon::now();
    $book->due_date = Carbon::now()->addDays(7);
    $book->save();

    return redirect("/book/{$book->id}");
});



Route::get("borrowed_books", function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData ) {
        return redirect("/login");
    }

    if ($userData->role_id != 3) {
        $books = Book::whereNotNull('user_id')->with('user')->paginate(5);
    } else {
        $books = Book::where('user_id', $userData->id)->with('user')->paginate(5);
    }

    return view('borrowed.index', ["books" => $books]);
});
Route::delete("borrowed_books/{id}", function ($id) {
    $book = Book::find($id);

    if (!$book) {
        return abort(404, 'Book not found');
    }

    $book->user_id = null;
    $book->borrowed_date = null;
    $book->due_date = null;
    $book->save();

    return redirect("/borrowed_books");
});




Route::get("users", function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData || $userData['role_id'] != 1 ) {
        return redirect("/login");
    }

    $users = User::paginate(20);

    return view("users.index", [ 'users' => $users ]);
});
Route::get("users/create", function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData || $userData['role_id'] != 1 ) {
        return redirect("/login");
    }

    return view("users.create");
});
Route::post("users/create", function () {
    $validated = request()->validate([
        'username' => 'required|string|max:255|unique:users',
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone_number' => 'nullable|string|max:15',
        'password' => 'required|string|min:8',
        'role' => 'required|in:1,2,3',
    ]);

    User::create([
        'username' => $validated['username'],
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'] ?? null,
        'hashed_password' => bcrypt($validated['password']),
        'role_id' => intval($validated['role']),
    ]);

    return redirect("/users");
});
Route::get("user/edit/{id}", function ($id) {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData || $userData['role_id'] != 1 ) {
        return redirect("/login");
    }

    $user = User::find($id);

    if (!$user) {
        return abort(404, 'User not found');
    }

    return view("users.edit", [ 'user' => $user ]);
});
Route::put("user/edit/{id}", function ($id) {
    $user = User::find($id);

    if (!$user) {
        return abort(404, 'User not found');
    }

    $validated = request()->validate([
        'username' => 'required|string|max:255|unique:users,username,' . $id,
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone_number' => 'nullable|string|max:15',
        'password' => 'nullable|string|min:8',
        'role' => 'required|in:1,2,3',
    ]);

    $user->update([
        'username' => $validated['username'],
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'] ?? null,
        'password' => isset($validated['password']) ? bcrypt($validated['password']) : $user->password,
        'role_id' => intval($validated['role']),
    ]);

    return redirect("/users");
});
Route::delete("user/delete/{id}", function ($id) {
    $user = User::find($id);

    if (!$user) {
        return abort(404, 'User not found');
    }

    $user->delete();

    return redirect("/users");
});





Route::get("categories", function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData || $userData['role_id'] == 3 ) {
        return redirect("/login");
    }

    $categories = Category::paginate(10);

    return view("categories.index", [ 'categories' => $categories ]);
});
Route::get("categories/create", function () {
    $userData = FacadesAuth::user() ?? null;
    if ( !$userData || $userData['role_id'] == 3 ) {
        return redirect("/login");
    }

    return view("categories.create");
});
Route::post('categories/create', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255|unique:categories',
    ]);

    Category::create([
        'name' => $validated['name'],
    ]);

    return redirect('/categories');
});
Route::delete('categories/delete/{id}', function ($id) {
    $category = Category::find($id);

    if (!$category) {
        return abort(404, 'Category not found');
    }

    $category->delete();

    return redirect('/categories');
});





Route::get('login', function () {
    $userData = FacadesAuth::user() ?? null;
    if ( $userData ) {
        return redirect("/");
    }

    return view('login.index');
});
Route::post('login', function () {

    $credentials = request()->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (!$user || $user->username !== $credentials['username'] || !Hash::check($credentials['password'], $user->hashed_password)) {
        return back()->withErrors(['login' => 'The provided credentials do not match our records.']);
    }

    request()->session()->regenerate();

    FacadesAuth::login($user);

    return redirect()->intended('/');
});



Route::get('signup', function () {
    $userData = FacadesAuth::user() ?? null;
    if ( $userData ) {
        return redirect("/");
    }

    return view('signup.index');
});
Route::post('signup', function () {
    $validated = request()->validate([
        'username' => 'required|string|max:255|unique:users',
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone_number' => 'nullable|string|max:15',
        'password' => 'required|string|min:8|confirmed',
    ]);

    User::create([
        'username' => $validated['username'],
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'] ?? null,
        'hashed_password' => bcrypt($validated['password']),
        'role_id' => 3,
    ]);

    return redirect("/login");
});



Route::delete("logout", function () {
    session()->flush();
    Cookie::queue(Cookie::forget('users'));

    return redirect("/login");
});
