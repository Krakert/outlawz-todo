<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class CreateTask extends Component
{
    public $description;

    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    public function submit(): void
    {
        $this->validate();

        $this->createTask();

        $this->description = '';

        $this->dispatch('task-added');

    }

    public function createTask(): void
    {
        Task::create([
            'description' => $this->description
        ]);
    }

    public function render()
    {
        return view('livewire.create-task')
            ->layout('components/layouts.base');
    }
}
