<div>
    <div class="bg-blue-500 rounded-lg p-2 m-2">
        <h2>Tasks</h2>
        <ul>
            <div>
                @foreach ($tasks as $key => $task)
                    <div x-data="{ open: false, toggle() { this.open = !this.open } }">
                        <div class="bg-blue-300 rounded-lg p-2 m-2" @click="toggle()">
                            <li>
                                <span class="task-number">{{ ++$key }}</span> -
                                {{ $task->description }}
                            </li>
                            <div x-show="open">
                                <div class="flex flex-row">
                                    <div class="bg-red-500 rounded-lg p-2 mx-2">
                                        <x-heroicon-o-check class="w-6 h-6 text-white"
                                            wire:click="taskCompleted({{ $task->id }})" @click="toggle()" />
                                    </div>
                                    <div class="bg-red-500 rounded-lg p-2 mx-1">
                                        <x-heroicon-o-pencil-square class="w-6 h-6 text-white"
                                            wire:click="editTask({{ $task->id }})" @click="toggle()" />
                                    </div>
                                    <div class="bg-red-500 rounded-lg p-2 mx-2">
                                        <x-heroicon-o-trash class="w-6 h-6 text-white"
                                            wire:click="deleteTask({{ $task->id }})" @click="toggle()" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </ul>
    </div>
</div>
