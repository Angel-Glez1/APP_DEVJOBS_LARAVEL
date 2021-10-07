@extends('layouts.app')

@section('navegacion')
    @include('ui.categori_nav')
@endsection



@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white" >
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-3xl text-gray-700">
                Dev<span class="font-bold">Jobs</span>
            </p>

            <h1 class="mt-2 sm:mt-4 text-4xl font-bold leading-tight text-gray-700">
                Encuentra tu trabajo ideal
                <span class="text-green-500 block">Programadores/Desalladores</span>
            </h1>

            @include('ui.buscador')




        </div>

        <div class="block lg:w-1/2">
            <img src="/img/4321.jpg" alt="devjobs" class="inset-0 h-full w-full object-cover">
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            <span class="font-bold">Vacantes</span>
        </h1>

         @include('ui.listadoVacntes') 
    </div>



@endsection