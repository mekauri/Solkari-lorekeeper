<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('check-news')->everyMinute();
        $schedule->exec('rm public/images/avatars/*.tmp')->daily();
        $schedule->command('check-sales')->everyMinute();
        $schedule->command('clean-donations')->everyMinute();
        $schedule->command('check-pet-drops')->everyMinute();
        $schedule->command('reset-stamina')->daily();
        $schedule->command('update-extension-tracker')->daily();
        $schedule->command('update-staff-reward-actions')->daily();
        $schedule->command('restock-shops')->daily();
        $schedule->command('update-timed-stock')->everyMinute();
    }

    /**
     * Middleware to be applied to the application.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'feeds' => \App\Http\Middleware\YourFeedsMiddleware::class,
    ];

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
}
