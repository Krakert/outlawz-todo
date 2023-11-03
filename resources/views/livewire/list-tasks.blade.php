<div class="card tasks-card">
    <div class="card-body justify-content-center">
        <h2>Tasks</h2>

        <p class="card-separator"></p>

        <ul class="task-list">
            <div>
                @foreach ($tasks as $key => $task)
                    @livewire('task', ['task' => $task->description], key($key))
                @endforeach
            </div>
        </ul>
    </div>
</div>

