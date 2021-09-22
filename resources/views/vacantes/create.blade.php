@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css"
        integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('navegacion')
    @include('ui.admi_navegation')
@endsection


@section('content')

    <h1 class="text-3xl text-center mt-10">Nueva Vacantes</h1>

    <form action="" class="max-w-lg mx-auto my-10">

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2 text-2xl"> Titulo Vacante </label>

            <input id="titulo" name="titulo" type="text"
                class="p-3 
                    bg-gray-100 
                    rounded 
                    form-input 
                    border
                    w-full                 
                    focus:outline-none 
                    leading-tight
                    focus:bg-white 
                    focus:border-green-500 @error('titulo') border-red-500 @enderror"
                value="{{ old('titulo') }}" autocomplete="off" />

            @error('titulo')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2 text-2xl"> Categoria </label>
            <select name="categoria"
                class="block 
                appearance-none
                w-full 
                border 
                border-gray-200 
                text-gray-700 
                rounded 
                leading-tight 
                bg-gray-100
                focus:outline-none 
                focus:bg-white 
                focus:border-green-500
                p-3
                ">
                <option disabled selected>- Selecciona --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2 text-2xl"> Experiencia </label>
            <select name="experiencia"
                class="block 
                appearance-none
                w-full 
                border 
                border-gray-200 
                text-gray-700 
                rounded 
                leading-tight 
                bg-gray-100
                focus:outline-none 
                focus:bg-white 
                focus:border-green-500
                p-3
                ">
                <option disabled selected>- Selecciona --</option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2 text-2xl"> Ubicacion </label>
            <select name="ubicacion"
                class="block 
                appearance-none
                w-full 
                border 
                border-gray-200 
                text-gray-700 
                rounded 
                leading-tight 
                bg-gray-100
                focus:outline-none 
                focus:bg-white 
                focus:border-green-500
                p-3
                ">
                <option disabled selected>- Selecciona --</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2 text-2xl"> Salario </label>
            <select name="salario"
                class="block 
                appearance-none
                w-full 
                border 
                border-gray-200 
                text-gray-700 
                rounded 
                leading-tight 
                bg-gray-100
                focus:outline-none 
                focus:bg-white 
                focus:border-green-500
                p-3
                ">
                <option disabled selected>- Selecciona --</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2 text-2xl"> Informacion sobre la vacante </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 border focus:outline-none focus:bg-white focus:border-green-500 focus:outline focus:shadow-outline "></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>


        <div class="mb-5">
            <button
                class="bg-green-500 w-full p-3 hover:bg-green-600 text-gray-100 font-bold uppercase focus:outline focus:shadow-outline">
                Publicar Vacante
            </button>
        </div>
    </form>
@endsection

@section('scritps')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js"
        integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderList', 'h2', 'h3', 'orderedlist', 'unorderedlist', 'html'],
                    static: true,
                    sticky: true
                },
                placeholder : {
                    text : 'Informacion de la vacante'
                }
            });

            editor.subscribe('editableInput', function(eventObj,editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;

            });


        });
    </script>    
@endsection
