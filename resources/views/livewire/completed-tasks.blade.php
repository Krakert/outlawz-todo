<div>
    <div class="bg-blue-500 rounded-lg p-2 m-2">
        <h2>Completed Tasks</h2>
        <ul>
            <div>
                @foreach ($tasks as $key => $task)
                    <div x-data="{ open: false, toggle() { this.open = !this.open } }">
                        <div class="bg-blue-300 rounded-lg p-2 m-2" @click="toggle()">
                            <li>
                                <span class="task-number">{{ $key }}</span> -
                                {{ $task->description }}
                            </li>
                            <div x-show="open">
                                <div class="flex flex-row">
                                    <div class="bg-red-500 rounded-lg p-2 mx-2">
                                        <x-heroicon-o-arrow-uturn-down class="w-6 h-6 text-white" @click="toggle()" />
                                    </div>
                                    <div class="bg-red-500 rounded-lg p-2 mx-2">
                                        <x-heroicon-o-trash class="w-6 h-6 text-white" @click="toggle()" />
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
