@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection


@section('content')
    <h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>
    
    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Publicado : <span class="font-normal"> {{ $vacante->created_at->diffForHumans() }} </span>
                por: <span class="font-normal"> {{ $vacante->user->name }} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoria : <span class="font-normal"> {{ $vacante->categoria->nombre }} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario : <span class="font-normal"> {{ $vacante->salario->nombre }} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicacion : <span class="font-normal"> {{ $vacante->ubicacion->nombre }} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia : <span class="font-normal"> {{ $vacante->experiencia->nombre }} </span>
            </p>

            <h2 class="text-3xl text-center mt-10 text-gray-700 mb-10">Conocimentos y Tecnologias</h1>
            @php
                $arrSkills = explode(',', $vacante->skills)
            @endphp

            @foreach ($arrSkills as $skill)
                <p class="inline-block border border-green-500 bg-green-100 py-2 px-8 rounded text-gray-700 my-2 w-100">
                    {{ $skill }}
                </p>    
            @endforeach

            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen">
                <img src="/storage/vacantes/{{$vacante->imagen}}"  class="w-20 mt-10" alt="{{$vacante->titulo}} ">  
            </a>

            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>


            
        </div>

        <aside class="md:w-2/5 bg-green-300 p-5 rounded m3">
            <h2 class="text-2xl my-2 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>

            <form action="{{route('candidatos.store')}}" enctype="multipart/form-data" method="POST" >
                @csrf

                <div class="mt-4">
                    <label for="nombre" class="block text-white text-sm font-bold mb-4">Nombre:</label>
                    <input 
                        type="text" 
                        id="nombre" 
                        class="p-3 bg-gray-100 rounded form-input w-full border outline-none  @error('nombre') border-red-500 @enderror "
                        value="{{old('nombre')}}"
                        name="nombre"
                        placeholder="Tu nombre"
                    >
                    @error('nombre')    
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 " role="alert">
                            <p>{{$message}} </p>
                        </div>    
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="email" class="block text-white text-sm font-bold mb-4">Email:</label>
                    <input 
                        type="text" 
                        id="email" 
                        class="p-3 bg-gray-100 rounded form-input w-full border outline-none  @error('email') border-red-500 @enderror "
                        value="{{old('email')}}"
                        name="email"
                        placeholder="Tu email"
                    >
                    @error('email')    
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 " role="alert">
                            <p>{{$message}} </p>
                        </div>    
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="cv" class="block text-white text-sm font-bold mb-4">Curriculum(pdf):</label>
                    <input 
                        type="file" 
                        id="cv" 
                        class="p-3 bg-gray-100 rounded form-input w-full border outline-none  @error('cv') border-red-500 @enderror "
                        name="cv"
                        accept="application/pdf"
                    >
                    @error('cv')    
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 " role="alert">
                            <p>{{$message}} </p>
                        </div>    
                    @enderror
                </div>

                <input type="hidden" name="vacante_id" value="{{ $vacante->id }}">

                <input 
                    type="submit" 
                    class="bg-green-600 w-full hover:bg-green-700 text-gray-100 mt-4 p-3 focus:outline-none focus:shadow-outline hover:pointer uppercase"
                    value="Postularte"
                    >
            </form>
        </aside>

    </div>
@endsection