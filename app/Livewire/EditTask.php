<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

/**
 * Class EditTask
 *
 * @package App\Livewire
 */
class EditTask extends Component
{
    /**
     * The currently edited task.
     *
     * @var Task
     */
    public $task;

    /**
     * The description of the task being edited.
     *
     * @var string
     */
    public $description;

    /**
     * Validation rules for the description field.
     *
     * @var array
     */
    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    /**
     * Mount the component and retrieve the task to be edited.
     */
    public function mount()
    {
        $this->getTask();
    }

    /**
     * Handle the 'editing-task' event to refresh the edited task.
     */
    #[On('editing-task')]
    public function editingTask()
    {
        $this->getTask();
    }

    /**
     * Retrieve the task to be edited.
     */
    public function getTask()
    {
        $this->task = Task::where('editing', '=', true)
            ->first();

        if ($this->task) {
            $this->description = $this->task->description;
        }
    }

    /**
     * validate user input and update the database, handle the submission of the edited task.
     */
    public function submit()
    {
        $this->validate();

        $this->updateTask();

        $this->task = null;

        $this->dispatch('task-edited');
    }

    /**
     * Update the task's description and editing status in the database.
     */
    public function updateTask()
    {
        $this->task->description = $this->description;
        $this->task->editing = false;

        $this->task->save();
    }

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.edit-task');
    }
}
