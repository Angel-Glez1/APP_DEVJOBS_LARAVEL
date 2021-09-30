@extends('layouts.app')

@section('navegacion')
    @include('ui.admi_navegation')
@endsection


@section('content')
    <h1 class="text-2xl text-center mt-10">Candidatos: {{$vacante->titulo}}</h1>
    
    
    @if (count($vacante->candidatos) > 0)
    <ul class="max-w-md mx-auto mt-10">
        @foreach ($vacante->candidatos as $candidato)
        
            <li class="p-5 border border-gray-400 mb-5 hover:bg-green-200 hover:pointer">
                <p class="mb-4">
                    Nombre
                    <span class="font-bold">{{$candidato->nombre}}</span>
                </p>
                <p class="mb-4">
                    Email:
                    <span class="font-bold">{{$candidato->email}}</span>
                </p>
                <p class="mb-4">
                    Curriculum
                    <a href="/storage/cv/{{$candidato->cv}}" target="_blank" rel="noopener noreferrer" class="underline font-bold text-blue-800">Ver CV</a>
                </p>
            </li>

        @endforeach    
    </ul>

    @else
        <p class="text-5xl mt-5 text-center">No hay candidatos</p>
    @endif

@endsection