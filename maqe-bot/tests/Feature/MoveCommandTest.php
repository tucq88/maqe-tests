<?php

namespace Tests\Feature;

use Tests\TestCase;

class MoveCommandTest extends TestCase
{
    public function testInvalidPath()
    {
        $this->artisan('move', ['path' => '111'])
             ->expectsOutput('Invalid PATH format!')
             ->assertExitCode(0);
    }

    public function testSampleMove()
    {
        $this->artisan('move', ['path' => 'RW15RW1'])
             ->expectsOutput('X=15, Y=-1, Direction=South')
             ->assertExitCode(0);
    }

    public function testSampleMove2()
    {
        $this->artisan('move', ['path' => 'W5RW5RW2RW1R'])
             ->expectsOutput('X=4, Y=3, Direction=North')
             ->assertExitCode(0);
    }

    public function testSampleMove3()
    {
        $this->artisan('move', ['path' => 'RRW11RLLW19RRW12LW1'])
             ->expectsOutput('X=7, Y=-12, Direction=South')
             ->assertExitCode(0);
    }

    public function testSampleMove4()
    {
        $this->artisan('move', ['path' => 'LLW100W50RW200W10'])
             ->expectsOutput('X=-210, Y=-150, Direction=West')
             ->assertExitCode(0);
    }

    public function testSampleMove5()
    {
        $this->artisan('move', ['path' => 'LLLLLW99RRRRRW88LLLRL'])
             ->expectsOutput('X=-99, Y=88, Direction=East')
             ->assertExitCode(0);
    }

    public function testSampleMove6()
    {
        $this->artisan('move', ['path' => 'W55555RW555555W444444W1'])
             ->expectsOutput('X=1000000, Y=55555, Direction=East')
             ->assertExitCode(0);
    }
}
