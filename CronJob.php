<?php

/***
/////////////////// for laravel 11 ///////////////////////////// 

 * step-1: php artisan make:command DailyTask --command=app:daily-task
 * step-2: go to => app/Console/Commands/DailyTask.php
 * step-3: Now go to => routes/console.php

     write below code in console.php:
 
       use Illuminate\Support\Facades\Schedule;
 
        Schedule::command('test:cron')->everyFiveMinutes();


 * step-4: php artisan schedule:run



 


/////////////////// for laravel 8 ///////////////////////////// 
 * Terminal Command:
 * step-1: php artisan schedule:run
 * step-2: php artisan schedule:work
 * step-3: Set a schedule into app>>console:kernal.php 
 
 *   protected function schedule(Schedule $schedule)
    {
        $schedule->command('daily:task')->everyMinute();
    }

 * step-4: php artisan make:command DailyTask
 * above command will make a file into app>>console>>command:DailyTask.php
 * step-5: now write query into hadle()-method
 
 * public function handle(){
  Log::info('i am selim');
  }
 
 
 * Now go to Storage>>Log>>Laravel.log file and see the output
 */
