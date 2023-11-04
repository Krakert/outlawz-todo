<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Attributes\On;

/**
 * Class CompletedTasks
 *
 * @package App\Livewire
 */
class CompletedTasks extends Component
{
    /**
     * The collection of completed tasks.
     *
     * @var array
     */
    public $tasks;

    /**
     * Mount the component and retrieve the completed tasks.
     */
    public function mount()
    {
        $this->getTasks();
    }

    /**
     * Get the completed tasks and format the completion date 
     * in 'm-d-Y g:i A' format (e.g., 12-31-2023 1:30 PM).
     */
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

    /**
     * Delete a completed task.
     *
     * @param int $id The ID of the completed task to be deleted.
     */
    public function deleteTask($id)
    {
        $this->getTask($id);
        $this->task->delete();

        $this->mount();
    }

    /**
     * Mark a completed task as uncompleted.
     *
     * @param int $id The ID of the completed task to be marked as uncompleted.
     */
    public function returnTask($id)
    {
        $this->getTask($id);
        $this->task->completed_at = null;
        $this->task->save();

        $this->mount();

        $this->dispatch('task-returned');
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
        return view('livewire.completed-tasks');
    }
}
