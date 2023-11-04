@extends('components.layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div>
                {{ $slot }}  
                @livewire('list-tasks') 
                @livewire('edit-task')
            </div>
        </div>
    </div>
</main>