@extends('components.layouts.app')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div>
                {{ $slot }}  
                @livewire('list-tasks') 
            </div>
        </div>
    </div>
</main>