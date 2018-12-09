<?php

namespace App\Services;

class BotMover {

    private $x;
    private $y;
    private $direction;

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->direction = 'North';
    }

    public function position()
    {
        return [
            'X' => $this->x,
            'Y' => $this->y,
            'Direction' => $this->direction
        ];
    }

    private function _changeAxis(string $behavior, int $steps = 0): void
    {
        if ($behavior === 'forward' && $this->direction === 'North') {
            $this->x = $this->x;
            $this->y = $this->y + $steps;
        }

        if ($behavior === 'forward' && $this->direction === 'South') {
            $this->x = $this->x;
            $this->y = $this->y - $steps;
        }

        if ($behavior === 'forward' && $this->direction === 'East') {
            $this->x = $this->x + $steps;
            $this->y = $this->y;
        }

        if ($behavior === 'forward' && $this->direction === 'West') {
            $this->x = $this->x - $steps;
            $this->y = $this->y;
        }
    }

    private function _changeDirection(string $behavior): void
    {
        if ($behavior === 'left' && $this->direction === 'North'
        || $behavior === 'right' && $this->direction === 'South')
        {
            $this->direction = 'West';
            return;
        }

        if ($behavior === 'left' && $this->direction === 'South'
        || $behavior === 'right' && $this->direction === 'North')
        {
            $this->direction = 'East';
            return;
        }


        if ($behavior === 'left' && $this->direction === 'West'
        || $behavior === 'right' && $this->direction === 'East')
        {
            $this->direction = 'South';
            return;
        }

        if ($behavior === 'left' && $this->direction === 'East'
        || $behavior === 'right' && $this->direction === 'West')
        {
            $this->direction = 'North';
            return;
        }
    }

    public function left(int $number = 1)
    {
        for ($i = 1; $i <= $number; $i++) {
            $this->_changeDirection('left');
        }
    }

    public function right(int $number = 1)
    {
        for ($i = 1; $i <= $number; $i++) {
            $this->_changeDirection('right');
        }
    }

    public function forward(int $number) {
        $this->_changeAxis('forward', $number);
    }

}
