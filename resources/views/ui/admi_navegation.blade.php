

{{-- Mostar vacantes --}}
<a 
    href="{{ route('vacantes.index') }}" 
    class="text-white text-sm font-bold uppercase p-6 {{ Request::is('vacantes') ? 'bg-green-500' : ''  }} "
    >
    Ver vacantes
</a>

{{-- create --}}
<a 
    href="{{ route('vacantes.create') }}" 
    class="text-white text-sm font-bold uppercase p-6 {{ Request::is('vacantes/create') ? 'bg-green-500' : ''  }} "
    >
    Nueva Vacantes
</a>
