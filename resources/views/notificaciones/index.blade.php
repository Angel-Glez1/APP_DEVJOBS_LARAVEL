@extends('layouts.app')

@section('navegacion')
    @include('ui.admi_navegation')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Notificaciones</h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-1/2">
            @if (count($notificaciones) > 0)
                <ul class="max-w-md mx-auto mt-10">
                    <p class="text-center">nuevas notificaciones</p>
                    @foreach ($notificaciones as $notificacion)

                        @php
                            $data = $notificacion->data;
                        @endphp

                        <li class="p-5 border border-gray-400 mb-5 hover:bg-green-200 hover:pointer">
                            <p class="mb-4">
                                Tienes un nuevo candidato en:
                                <span class="font-bold">{{ $data['vacante'] }}</span>
                            </p>
                            <p class="mb-4">
                                Te escribio hace:
                                <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </p>

                            <a class="bg-green-500 p-3 inline-block text-xs font-bold uppercase text-white mb-4"
                                href="{{ route('candidato.index', ['id' => $data['vacante_id']]) }}">Ver candidatos
                            </a>

                        </li>
                    @endforeach
                </ul>

            @else
                <p class="text-center bg-yellow-100 p-3  font-bold">No tienes notificaciones recientes</p>
            @endif
        </div>
        <hr>
        <div class="md:w-1/2 px-4">
            {{-- Mostar notificaciones leidas --}}
            <div class="bg-gray-100 py-3">
            @if (count($notificacionesAnteriores) > 0)
            <h2 class="text-center mb-10 text-2xl underline ">Notifcaciones leidas</h2>
                <ul class="max-w-lg mx-auto">
                    @foreach ($notificacionesAnteriores as $notificacion)

                        @php
                            $data = $notificacion->data;
                        @endphp

                        <li class="p-5 border border-gray-400 mb-5 hover:bg-green-200 hover:pointer">
                            <p class="mb-4">
                                Tienes un nuevo candidato en:
                                <span class="font-bold">{{ $data['vacante'] }}</span>
                            </p>

                            <p class="mb-4">
                                Te escribio hace:
                                <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </p>

                            <a class="bg-green-500 p-3 inline-block text-xs font-bold uppercase text-white mb-4"
                                href="{{ route('candidato.index', ['id' => $data['vacante_id']]) }}">Ver candidatos
                            </a>

                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-3xl text-center">No tienes notificaciones</p>
            @endif
            </div>

        </div>
    </div>





@endsection
