<div>
    @if ($ventana == 1)
        <div class="box py-8 px-6 mt-2">
            <h1 class="text-xl text-gray-900">Lista de Convenios Pendientes</h1>
            <div class="overflow-x-auto mt-6">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap uppercase">#</th>
                            <th class="whitespace-nowrap uppercase">Nombre Comercial</th>
                            <th class="whitespace-nowrap uppercase">Razon Social</th>
                            <th class="whitespace-nowrap uppercase">Estado </th>
                            <th class="whitespace-nowrap uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignments as $assignament)
                            @if ($assignament->institution->estado == 'REGISTRADO')
                                <tr>
                                    <td class="border-b dark:border-dark-5">{{ $assignament->id }}</td>
                                    <td class="border-b dark:border-dark-5">
                                        {{ $assignament->institution->nombre_comercial }}</td>
                                    <td class="border-b dark:border-dark-5">
                                        {{ $assignament->institution->razon_social }}
                                    </td>
                                    <td class="border-b dark:border-dark-5">{{ $assignament->estado }}</td>
                                    <td class="border-b dark:border-dark-5">
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input wire:model='institution_id' class="form-check-switch"
                                                    type="checkbox" value="{{ $assignament->institution_id }}">
                                                <label class="form-check-label">
                                                    Registrar
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if ($ventana == 2)
        <div class="box py-8 px-6 mt-2">
            <form wire:submit.prevent='createAgreement' enctype="multipart/form-data"
                class="grid grid-cols-12 gap-2 items-center">
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Convenio</label>
                    <input wire:model='archivoConvenio' type="file" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Fecha de Inicio</label>
                    <input wire:model='fechaConvenio' type="date" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Fecha de Fin</label>
                    <input wire:model='finConvenio' type="date" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Detalle</label>
                    <input wire:model='detalle' type="text" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3 pt-6">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    @endif
    <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
        href="{{ route('page.dashboard') }}">Finalizar</a>
</div>
