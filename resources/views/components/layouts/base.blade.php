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

    <div class="space-x-4">
    <button class="bg-gray-300 px-4 py-2 rounded text-gray-700" />
    <button class="bg-gray-300 px-4 py-2 rounded text-gray-700" />
</div>
</main>