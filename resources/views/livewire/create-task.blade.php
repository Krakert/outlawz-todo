<div class="bg-blue-500 rounded-lg p-2 m-2 w-[600px]">
    <p class="text-2xl text-center">Create Task</p>

    @error('description')
        <span class="error">- {{ $message }}</span>
    @enderror

    <form class="flex place-content-center" wire:submit.prevent="submit">
        <input wire:model="description" class="rounded-lg p-2 mr-2" type="text" placeholder="Build a Todo App...">
        <button class="bg-red-500 rounded-lg p-2">Submit</button>
    </form>
</div>
