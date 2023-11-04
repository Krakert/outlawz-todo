<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Attributes\On; 

class CompletedTasks extends Component
{

    public $tasks;

    public function mount()
    {
        $this->getTasks();
    }

    #[On('task-completed')]
    public function getTasks()
    {
        $tasks = Task::where('completed_at', '!=', null)
            ->orderBy('completed_at', 'desc')
            ->get();

        foreach ($tasks as $task) {
            $date = Carbon::parse($task->completed_at);
            $task->completed_at = $date->format('m-d-Y g:i A');
        }

        $this->tasks = $tasks;
    }

    public function deleteTask($id)
    {
        $this->getTask($id);
        $this->task->delete();

        $this->mount();
    }

    public function getTask($id)
    {
        $this->task = Task::find($id);
    }

    public function render()
    {
        return view('livewire.completed-tasks');
    }
}
