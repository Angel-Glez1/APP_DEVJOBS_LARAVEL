@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css"
        integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.min.css"
        integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('navegacion')
    @include('ui.admi_navegation')
@endsection


@section('content')

    <h1 class="text-3xl text-center mt-10">Editar Vacante: {{ $vacante->titulo }} </h1>

    <form action="{{ route('vacante.update', ['vacante' => $vacante->id ] ) }}" method="POST" class="max-w-lg mx-auto my-10">
        @csrf
        @method('PUT')

        {{-- titulo --}}
        <div class="mb-5">

            <label for="titulo" class="block text-gray-700 text-sm mb-2 text-2xl"> Titulo Vacante </label>
            <input id="titulo" name="titulo" type="text"
                class="p-3 bg-gray-100 rounded form-input border w-full focus:outline-none leading-tight focus:bg-white focus:border-green-500 @error('titulo') border-red-500 @enderror"
                value="{{ $vacante->titulo }}" autocomplete="off" />

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror

        </div>

        {{-- Categoria --}}
        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2 text-2xl"> Categoria </label>
            <select name="categoria"
                class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight bg-gray-100 focus:outline-none focus:bg-white focus:border-green-500 p-3 @error('categoria') border-red-500 @enderror">

                <option disabled selected>- Selecciona --</option>
                @foreach ($categorias as $categoria)

                    <option {{ $vacante->categoria_id  == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>

                @endforeach
            </select>

            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror

        </div>

        {{-- Experiencia --}}
        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2 text-2xl"> Experiencia </label>
            <select name="experiencia" class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight bg-gray-100 focus:outline-none focus:bg-white focus:border-green-500 p-3 @error('experiencia') border-red-500 @enderror ">
                <option disabled selected>- Selecciona --</option>

                @foreach ($experiencias as $experiencia)

                    <option value="{{ $experiencia->id }}" {{ $vacante->experiencia_id == $experiencia->id ? 'selected' : '' }}>
                        {{ $experiencia->nombre }}
                    </option>

                @endforeach
            </select>

            @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        {{-- Ubicacion --}}
        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2 text-2xl"> Ubicacion </label>
            <select name="ubicacion" class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight bg-gray-100 focus:outline-none focus:bg-white focus:border-green-500 p-3 @error('ubicacion')  border-red-500 @enderror">
                <option disabled selected>- Selecciona --</option>
                
                @foreach ($ubicaciones as $ubicacion)
                
                    <option value="{{ $ubicacion->id }}" {{ $vacante->ubicacion_id  == $ubicacion->id ? 'selected' : '' }}>
                        {{ $ubicacion->nombre }}
                    </option>

                @endforeach
            </select>

            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        {{-- Salario --}}
        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2 text-2xl"> Salario </label>
            <select name="salario" class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight bg-gray-100 focus:outline-none focus:bg-white focus:border-green-500 p-3 @error('salario') border-red-500 @enderror ">
                <option disabled selected>- Selecciona --</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}" {{ $vacante->salario_id  == $salario->id ? 'selected' : '' }}>
                        {{ $salario->nombre }}
                    </option>
                @endforeach
            </select>

            @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        {{-- Descripcion --}}
        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2 text-2xl"> Informacion sobre la vacante
            </label>
            <div
                class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 border focus:outline-none focus:bg-white focus:border-green-500 focus:outline focus:shadow-outline @error('descripcion')
                    border-red-500
                @enderror ">
            </div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{ $vacante->descripcion }}" >
            
            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        {{-- Imagen --}}
        <div class="mb-5">
            <label for="dropzoneDevJobs" class="block text-gray-700 text-sm mb-2 text-2xl"> Imagen de la vacante </label>
            <div class="dropzone rounded bg-gray-100 p-20" id="dropzoneDevJobs"></div>
            <input type="hidden" name="imagen" id="imagen" value="{{ $vacante->imagen }}" >
            <p id="error"></p>

            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text-sm mb-2 text-2xl">
                Habilidades y conocimientos <span class="text-xs">(Elige al menos 3)</span>
            </label>

            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
            @endphp
            <lista-skills 
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode($vacante->skills )}}"
                >
            </lista-skills>

             @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"
        integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {


            // Medium editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft',
                        'justifyCenter', 'justifyRight', 'justifyFull', 'orderList', 'h2', 'h3',
                        'orderedlist', 'unorderedlist', 'html'
                    ],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Informacion de la vacante'
                }

            });

            // Llena el editor con la request anterior en caso de error
            editor.setContent( document.querySelector('#descripcion').value );

            // Mover el contenido que esta escribiendo al input hidden que le pertenece a mediun editor
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;

            });

            // Dropzone
            const dropZoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: '/vacantes/imagen',

                dictDefaulMessage: 'Sube tu archivo aqui.',

                acceptedFiles: ".png, .jpg, .jpeg, .gif",

                addRemoveLinks: true,

                dictRemoveFile: 'Borrar archivo',

                maxFiles: 1,

                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },

                init: function(){
                    // Mostar la imagen que el usuario queria subir si es que hubo un error ala hora de subirlo
                    if(document.querySelector("#imagen").value.trim()){
                        const imagenPublicada = {}
                        imagenPublicada.size = 1234;
                        imagenPublicada.name= document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-sucess');
                        imagenPublicada.previewElement.classList.add('dz-complete');

                    }
                },

                success: function(file, response) {

                    // console.log(response);
                    document.querySelector('#error').textContent = '';
                    document.querySelector('#imagen').value = response.correcto;
                    file.nombreServidor = response.correcto;



                },

                maxfilesexceeded: function(file) {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]); //Eliminar el archivo anterior
                        this.addFile(file); // agregar el archivo 
                    }

                },
                removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement)

                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params).then(r => console.log(r));
                }



            })


        });
    </script>
@endsection
