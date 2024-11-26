<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Add this:
        $schedule->call(function () {
            $now = Carbon::now();

            FacadesDB::table('books')
                ->where('due_date', '<', $now) // Check books past their due date
                ->update([
                    'user_id' => null,           // Reset user ID
                    'borrowed_date' => null,     // Clear borrowed date
                    'due_date' => null,          // Clear due date
                ]);
        })->daily(); // This runs the task daily
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
