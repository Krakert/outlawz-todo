<div>
    @if (!empty($task))
        <div>
            <p class="text-2xl">Edit Task</p>
            @error('description')
                <span class="error">- {{ $message }}</span>
            @enderror
            <form wire:submit.prevent="submit">
                <input wire:model="description" class="form-text" type="text">
                <button class="btn btn-todo">Update</button>
            </form>
        </div>
    @endif
</div>
