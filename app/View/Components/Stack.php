<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stack extends Component
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return function () {
            return view()->yieldPushContent($this->name);
        };
    }
}
