@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
    <h1>Gelini</h1>
@stop

@section('content')
    <p></p>
    <p></p>
    <p></p>
    <div class="col-md-19">
            
     <div class="card">
                               
     <img class="w-85" src="img/descarga2.jpg" alt="">
                   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>*/--}}
