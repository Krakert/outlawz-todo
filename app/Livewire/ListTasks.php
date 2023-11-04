<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

/**
 * Class ListTasks
 *
 * @package App\Livewire
 */
class ListTasks extends Component
{
    /**
     * The collection of uncompleted tasks.
     *
     * @var array
     */
    public $tasks;

    /**
     * The task currently being edited.
     *
     * @var Task
     */
    public $task;

    /**
     * Mount the component and retrieve the uncompleted tasks.
     */
    public function mount()
    {
        $this->getTasks();
    }

    /**
     * Handle the 'task-added' event to refresh the list of tasks.
     */
    #[On('task-added')]
    public function taskAdded()
    {
        $this->getTasks();
    }

    /**
     * Handle the 'task-edited' event to refresh the list of tasks.
     */
    #[On('task-edited')]
    public function taskEdited()
    {
        $this->getTasks();
    }

    /**
     * Handle the 'task-returned' event to refresh the list of tasks.
     */
    #[On('task-returned')]
    public function taskReturned()
    {
        $this->getTasks();
    }

    /**
     * Get the uncompleted tasks that are not in the editing state.
     */
    public function getTasks()
    {
        $this->tasks = Task::where('completed_at', null)
            ->where('editing', '!=', true)
            ->get();
    }

    /**
     * Begin editing a task.
     *
     * @param int $id The ID of the task to be edited.
     */
    public function editTask($id)
    {
        $editingTask = Task::where('editing', '=', true)
            ->first();

        if (!$editingTask) {
            $this->getTask($id);
            $this->task->editing = true;
            $this->task->save();

            $this->mount();

            $this->dispatch('editing-task');
        }
    }

    /**
     * Mark a task as completed.
     *
     * @param int $id The ID of the task to be marked as completed.
     */
    public function taskCompleted($id)
    {
        $this->getTask($id);
        $this->task->completed_at = now()->toDateTimeString();
        $this->task->save();

        $this->mount();

        $this->dispatch('task-completed');
    }

    /**
     * Delete a task.
     *
     * @param int $id The ID of the task to be deleted.
     */
    public function deleteTask($id)
    {
        $this->getTask($id);
        $this->task->delete();

        $this->mount();
    }

    /**
     * Retrieve a specific task by its ID.
     *
     * @param int $id The ID of the task to be retrieved.
     */
    public function getTask($id)
    {
        $this->task = Task::find($id);
    }

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.list-tasks');
    }
}
