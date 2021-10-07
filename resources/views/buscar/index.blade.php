@extends('layouts.app')

@section('navegacion')
    @include('ui.categori_nav')
@endsection



@section('content')


    <div class="my-10 bg-gray-100 p-10 shadow">
        @include('ui.listadoVacntes') 
    </div>



@endsection
