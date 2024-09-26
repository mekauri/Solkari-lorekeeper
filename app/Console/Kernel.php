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
<<<<<<< HEAD
<<<<<<< HEAD
     * Define the application's command schedule.*/
    protected function schedule(Schedule $schedule) {
=======
=======
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
<<<<<<< HEAD
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
=======
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
        $schedule->command('check-news')
                ->everyMinute();
        $schedule->exec('rm public/images/avatars/*.tmp')
                ->daily();
        $schedule->command('check-sales')
                ->everyMinute();
        $schedule->command('clean-donations')
            ->everyMinute();

<<<<<<< HEAD
<<<<<<< HEAD


        $schedule->command('check-pet-drops')
            ->everyMinute();
        $schedule->command('reset-stamina')
            ->daily();
        $schedule->exec('rm public/images/avatars/*.tmp')
            ->daily();
        $schedule->command('update-extension-tracker')
            ->daily();
        $schedule->command('update-staff-reward-actions')
            ->daily();
        $schedule->command('restock-shops')
            ->daily();
        $schedule->command('update-timed-stock')
            ->everyMinute();
        $schedule->command('check-pet-drops')
            ->everyMinute();

=======
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
=======
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
    }
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
