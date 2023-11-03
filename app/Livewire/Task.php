<?php

namespace App\Livewire;

use Livewire\Component;

class Task extends Component
{

    public String $task;

    public function render()
    {
        return view('livewire.task');
    }
}
