@if (count($vacantes) > 0)
    <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach ($vacantes as $vacante)
            <li class="p-10 border border-gray-300 bg-white shadow">
                <h2 class="text-2xl font-bold text-green-700">{{ $vacante->titulo }}</h2>

                <p class="block text-gray-700 font-normal my-2">
                    {{ $vacante->categoria->nombre }}
                </p>

                <p class="block text-gray-700 font-normal my-2">
                    Ubicación:
                    <span class="font-bold">{{ $vacante->ubicacion->nombre }}</span>
                </p>

                <p class="block text-gray-700 font-normal my-2">
                    Experiencia:
                    <span class="font-bold">{{ $vacante->experiencia->nombre }}</span>
                </p>

                <a class="bg-green-500 text-white mt-2 px-4 py-2 inline-block rounded font-bold text-sm"
                    href="{{ route('vacantes.show', ['vacante' => $vacante->id]) }}">
                    Ver vacante
                </a>
            </li>
        @endforeach
    </ul>

@else
    <p class="text-center borber border-green-800 bg-green-300 p-3 mt-2 w-30 mx-auto">
        No hay vacantes para esta categoria aún.
    </p>
@endif
