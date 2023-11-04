<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On; 

class ListTasks extends Component
{

    public $tasks;
    public $task;

    public function mount()
    {
        $this->getTasks();
    }

    #[On('task-added')]
    public function taskAdded()
    {
        $this->getTasks();
    }

    #[On('task-edited')]
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

    public function editTask($id)
    {
        $editingTask = Task::where('editing', '=', true)
            ->first();

        if(!$editingTask) {
            $this->getTask($id);
            $this->task->editing = true;
            $this->task->save();

            $this->mount();

            $this->dispatch('editing-task');
        }
    }

    public function taskCompleted($id)
    {
        $this->getTask($id);
        $this->task->completed_at = now()->toDateTimeString();
        $this->task->save();

        $this->mount();

        $this->dispatch('task-completed');

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
