<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class Push extends Component
{
    public string $stack;
    public bool $once;
    protected static array $pushedOnce = [];

    public function __construct(string $stack, bool $once = false)
    {
        $this->stack = $stack;
        $this->once = $once;
    }

    public function render()
    {
        return function (array $data) {
            $content = trim($data['slot']);

            if ($this->once) {
                $key = md5($this->stack . $content);
                if (!isset(self::$pushedOnce[$key])) {
                    self::$pushedOnce[$key] = true;
                }

                return;
            }

            View::startPush($this->stack);
            echo $content;
            View::stopPush();

            return;
        };
    }
}
