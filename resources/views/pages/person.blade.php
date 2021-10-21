@extends('layout.main')

@section('subhead')
    <title>Reportes - SIG</title>
@endsection

@section('content')
    @include('layout.components.mobil-menu')
    <div class="flex">
        @include('layout.components.side-menu')
        <div class="content">
            @include('layout.components.top-bar')
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-12">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Lista de Personas Registradas.
                                </h2>
                            </div>
                            @livewire('report-person')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @livewireScripts
@endsection
@push('script')
<script>
    document.addEventListener('livewire:load', function () {
      console.log('cargando js del liveware')
    })
</script>
@endpush
