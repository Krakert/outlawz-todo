@extends('components.layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div>
                {{ $slot }}  
                @livewire('list-tasks') 
                @livewire('edit-task')
                @livewire('completed-tasks')
            </div>
        </div>
    </div>
</main>