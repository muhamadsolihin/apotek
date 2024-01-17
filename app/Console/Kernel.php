<?php

namespace App\Console;

use App\Models\InventoryItem; // Import the InventoryItem model
use App\Notifications\ItemExpiryNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $expiryThreshold = now()->addMonths(3);
        
        $expiringItems = InventoryItem::where('expired_date', '<=', $expiryThreshold)->get();

        foreach ($expiringItems as $item) {
            // Send notification for each expiring item
            Notification::send($item->user, new ItemExpiryNotification($item));
        }
    })->daily(); // Run the task daily
}

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $routeMiddleware = [
        // ... other middleware ...
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];

    
}
