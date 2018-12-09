<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Services\BotMover;

class MoveCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'move
        { path : The way that bot want to move }';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Maqe bot is making a move';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = $this->argument('path');

        // Validation
        $pattern = '/(?:(W\d+)|R|L)/';
        $pathIsValid = preg_match_all($pattern, $path, $clearPath);
        if (!$pathIsValid) {
            $this->error('Invalid PATH format!');
            return;
        }

        // Move
        $botMover = new BotMover();
        $botMover->move($clearPath[0]);
        $this->info(http_build_query($botMover->position(),'',', '));
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
