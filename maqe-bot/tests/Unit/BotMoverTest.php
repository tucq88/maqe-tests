<?php

namespace Tests\Feature;

use App\Services\BotMover;
use Tests\TestCase;

class BotMoverTest extends TestCase
{
    protected function setUp(): void {
        $this->botMover = new BotMover();
    }

    public function testInitialPosition()
    {
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'North'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveLeft() {
        $this->botMover->left();
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'West'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveLeftTwice() {
        $this->botMover->left(2);
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'South'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveLeftThird() {
        $this->botMover->left(3);
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'East'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveLeftFourth() {
        $this->botMover->left(4);
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'North'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveRight() {
        $this->botMover->right();
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'East'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveRightTwice() {
        $this->botMover->right(2);
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'South'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveRightThird() {
        $this->botMover->right(3);
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'West'],
            $this->botMover->position()
        );
    }

    public function testBotCouldMoveRightFourth() {
        $this->botMover->right(4);
        $this->assertEquals(
            ['X' => 0, 'Y' => 0, 'Direction' => 'North'],
            $this->botMover->position()
        );
    }

    public function testBotMoveForwardNorth() {
        $this->botMover->forward(1);
        $this->assertEquals(
            ['X' => 0, 'Y' => 1, 'Direction' => 'North'],
            $this->botMover->position()
        );
    }

    public function testBotMoveForwardSouth() {
        $this->botMover->left(2);
        $this->botMover->forward(1);
        $this->assertEquals(
            ['X' => 0, 'Y' => -1, 'Direction' => 'South'],
            $this->botMover->position()
        );
    }

    public function testBotMoveForwardEast() {
        $this->botMover->right();
        $this->botMover->forward(1);
        $this->assertEquals(
            ['X' => 1, 'Y' => 0, 'Direction' => 'East'],
            $this->botMover->position()
        );
    }

    public function testBotMoveForwardWest() {
        $this->botMover->left();
        $this->botMover->forward(1);
        $this->assertEquals(
            ['X' => -1, 'Y' => 0, 'Direction' => 'West'],
            $this->botMover->position()
        );
    }

}
