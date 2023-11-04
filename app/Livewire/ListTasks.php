<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListTasks extends Component
{

    public $tasks;
    public $task;

    protected $listeners = [
        'taskAdded',
        'taskEdited',
        'taskReturned'
    ];

    public function mount()
    {
        $this->getTasks();
    }

    public function taskAdded()
    {
        $this->getTasks();
    }

    public function taskEdited()
    {
        $this->getTasks();
    }

    public function getTasks()
    {
        $this->tasks = Task::where('completed_at', null)
        ->where('editing', '!=', true)
        ->get();
    }

    public function taskCompleted($id)
    {
        $this->getTask($id);
        $this->task->completed_at = now()->toDateTimeString();
        $this->task->save();

        $this->mount();
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
        return view('livewire.list-tasks');
    }
}
