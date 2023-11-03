<div class="card tasks-card">
    <div class="card-body justify-content-center">
        <h2>Tasks</h2>

        <p class="card-separator"></p>

        <ul class="task-list">
            <div>
                @foreach ($tasks as $task)
                <livewire:task :task="$task->description">
                @endforeach
            </div>
        </ul>
    </div>
</div>

