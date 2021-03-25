@extends('adminlte'::page)

@section('title', 'Dashboard')

@section('plugin.Sweetalert2', true)

@section('content_header')
    <h1>Tabla empleados</h1>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        Swal.fire(
        'Good job!',
        'You clicked the button',
        'succes'
        )
    
    </script>
@stop