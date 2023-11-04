<!DOCTYPE html>
<html lang="en">

@extends('components.layouts.app')
@section('content')
    <main class="grid place-items-center">
        {{ $slot }}
        @livewire('edit-task')
        @livewire('list-tasks')
        @livewire('completed-tasks')
    </main>
