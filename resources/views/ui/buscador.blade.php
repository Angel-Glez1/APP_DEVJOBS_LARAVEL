<h2 class="my-2 text-gray-700 text-2xl"> Busca una vacante </h2>


<form action="{{route('vacantes.search')}}" method="POST">
    @csrf


    {{-- Categoria --}}
    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2 text-sm"> Categoria </label>
        <select name="categoria"
            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight bg-gray-100 focus:outline-none focus:bg-white focus:border-green-500 p-3 @error('categoria') border-red-500 @enderror">

            <option disabled selected>- Selecciona --</option>
            @foreach ($categorias as $categoria)

                <option {{ old('categoria') == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">
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

    {{-- Ubicacion --}}
    <div class="mb-5">
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2 text-2xl"> Ubicacion </label>
        <select name="ubicacion"
            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight bg-gray-100 focus:outline-none focus:bg-white focus:border-green-500 p-3 @error('ubicacion')  border-red-500 @enderror">
            <option disabled selected>- Selecciona --</option>

            @foreach ($ubicaciones as $ubicacion)

                <option value="{{ $ubicacion->id }}" {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}>
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

    <div class="mb-5">
        <input
            type="submit"
            class="bg-green-500 w-full p-3 hover:bg-green-600 text-gray-100 font-bold uppercase focus:outline focus:shadow-outline"
            value="Buscar Vacantes"
        >
    </div>

</form>
