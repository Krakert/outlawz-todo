<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On; 


class EditTask extends Component
{

    public $task;
    public $description;

    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    public function mount()
    {
        $this->getTask();
    }

    #[On('editing-task')]
    public function editingTask()
    {
        $this->getTask();
    }

    public function getTask()
    {
        $this->task = Task::where('editing', '=', true)
            ->first();

        if($this->task) {
            $this->description = $this->task->description;
        }
    }

    public function submit()
    {
        $this->validate();

        $this->updateTask();

        $this->task = null;

        $this->dispatch('task-edited');
    }

    public function updateTask()
    {
        $this->task->description = $this->description;
        $this->task->editing = false;

        $this->task->save();
    }




    public function render()
    {
        return view('livewire.edit-task');
    }
}
