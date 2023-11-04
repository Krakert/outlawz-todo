<div>
    @if (count($tasks) > 0)
        <div class="bg-blue-500 rounded-lg p-2 m-2 w-[600px]">
            <h2 class="text-2xl text-center m-auto">Tasks</h2>
            <ul>
                @foreach ($tasks as $key => $task)
                    <div x-data="{ open: false, toggle() { this.open = !this.open } }">
                        <div class="bg-blue-300 rounded-lg p-2 m-2" @click="toggle()">
                            <li>
                                <span class="task-number">{{ ++$key }}</span> -
                                {{ $task->description }}
                            </li>
                            <div x-show="open">
                                <div class="flex flex-row">
                                    <div class="bg-red-500 rounded-lg p-2 mr-2">
                                        <x-heroicon-o-check class="w-6 h-6 text-white"
                                            wire:click="taskCompleted({{ $task->id }})" @click="toggle()" />
                                    </div>
                                    <div class="bg-red-500 rounded-lg p-2">
                                        <x-heroicon-o-pencil-square class="w-6 h-6 text-white"
                                            wire:click="editTask({{ $task->id }})" @click="toggle()" />
                                    </div>
                                    <div class="bg-red-500 rounded-lg p-2 ml-2">
                                        <x-heroicon-o-trash class="w-6 h-6 text-white"
                                            wire:click="deleteTask({{ $task->id }})" @click="toggle()" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    @endif
</div>
