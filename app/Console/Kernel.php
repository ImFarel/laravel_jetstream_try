<?php

namespace App\Console;

use App\Jobs\ProcessScheduledInvitation;
use App\Jobs\SendDailyEmail;
use App\Mail\MailTestQueued;
use App\Models\Contact;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

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
        $schedule->call(function () {
            $now = date("Ymd");

            $invitation = Contact::where('sended', 0)->where('schedule', $now)->get();
            foreach ($invitation as $key => $value) {
                ProcessScheduledInvitation::dispatch($value)
                    ->delay(now('Asia/Jakarta')->addSeconds(15));
            }
            // })->timezone('Asia/Jakarta')->dailyAt('16:32');
        })->everyMinute();
        // $schedule->call(function () {
        //     // printf('Send daily email');
        //     // SendDailyEmail::dispatch();
        // })->everyMinute();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
