<div>
    <div class="box py-8 px-6">
        @include('layout.partials.errors')
        @include('layout.partials.flashMessage')
        <h1 class="text-xl text-gray-900">Crear un nuevo convenio</h1>
        <form wire:submit.prevent='createAgreement' enctype="multipart/form-data"
            class="intro-y grid grid-cols-12 gap-2 items-center">
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Convenio</label>
                <input wire:model='archivoConvenio' type="file" class="form-control">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Fecha de Firma</label>
                <input wire:model='fechaConvenio' type="date" class="form-control">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Unidad Economica</label>
                <select wire:model="institution" class="form-select">
                    <option value="">Seleccione un opcion</option>
                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->razon_social }} -
                            {{ $institution->nombre_comercial }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12 sm:col-span-3 pt-6">
                <button type="submit" class="btn btn-secondary">Guardar</button>
            </div>
        </form>
    </div>

    <h1 class="text-xl text-gray-900">Filtros</h1>
    <div class="box grid grid-cols-12 mt-2 py-4 px-6 gap-2 items-center">        
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Unidad Economica</label>
            <select wire:model="searchInstitution" class="form-select">
                <option value="">Seleccione un opcion</option>
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->razon_social }} -
                        {{ $institution->nombre_comercial }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Fecha de Firma</label>
            <input wire:model='searchDate' type="date" class="form-control">
        </div>

        <div class="col-span-12 sm:col-span-3 pt-6">
            <button wire:click='defaultFilters' class="btn btn-secondary">
                <x-feathericon-rotate-cw class="w-4 h-4 mr-2" /> Reiniciar
            </button>
        </div>
    </div>

    <div class="box py-8 px-6 mt-3">
        <div class="overflow-x-auto pt-4">
            <table class="table">
                <thead>
                    <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Unidad Economica</th>
                        <th class="whitespace-nowrap">Fecha de Firma</th>
                        <th class="whitespace-nowrap">Archivo</th>
                        <th class="whitespace-nowrap">Registrado por</th>
                        <th class="whitespace-nowrap">Estado</th>
                        <th class="whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agreements as $agreement)
                        <tr>
                            <td class="border-b dark:border-dark-5">{{ $agreement->id }}</td>
                            <td class="border-b dark:border-dark-5">
                                {{ $agreement->institution->nombre_comercial }}
                                <br>
                                {{ $agreement->institution->razon_social }}
                            </td>
                            <td class="border-b dark:border-dark-5">{{ $agreement->fecha_convenio }}</td>
                            <td class="border-b dark:border-dark-5">
                                <a class="flex cursor-pointer" wire:click="downloadAgreement({{ $agreement->id }})">
                                    <x-feathericon-hard-drive class="w-4 h-4 mr-2" /> Descargar
                                </a>
                            </td>
                            <td class="border-b dark:border-dark-5">{{ $agreement->user->email }}</td>
                            <td class="border-b dark:border-dark-5">{{ $agreement->estado }}</td>
                            <td class="border-b dark:border-dark-5">
                                <a class="flex cursor-pointer text-theme-6 mr-2"
                                    wire:click="softDeleteAgreement({{ $agreement->id }})">
                                    @if ($agreement->estado == 'ACTIVO')
                                        <x-feathericon-trash class="w-4 h-4 mr-1" /> Baja
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
                            href="{{ route('page.dashboard') }}">Finalizar</a>
</div>
