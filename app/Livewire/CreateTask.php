<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

/**
 * Class CreateTask
 *
 * @package App\Livewire
 */
class CreateTask extends Component
{
    /**
     * The description for the new task to be created.
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
     * Handle the submission of the new task creation.
     */
    public function submit(): void
    {
        $this->validate();

        $this->createTask();

        $this->description = '';

        $this->dispatch('task-added');
    }

    /**
     * Create a new task with the provided description.
     */
    public function createTask(): void
    {
        Task::create([
            'description' => $this->description
        ]);
    }

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.create-task')
            ->layout('components/layouts.base');
    }
}
