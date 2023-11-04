<div class="card task-card">
    <div class="card-body">
        <p class="text-2xl">Create Task</p>

        @error('description') <span class="error">- {{ $message }}</span> @enderror

        <form class="create-task justify-content-center" wire:submit.prevent="submit">
            <label>
                <input wire:model="description" class="form-text" type="text" placeholder="Build a Todo App...">
            </label>
            <button class="btn btn-todo">Submit</button>
        </form>
    </div>
</div>
