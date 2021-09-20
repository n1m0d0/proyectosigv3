<div>
    @include('layout.partials.errors')
    @include('layout.partials.flashMessage')
    @if ($ventana == 1)
        <div class="box py-8 px-6">
            <h1 class="text-xl text-gray-900">Lista de Inserciones</h1>
            <div class="overflow-x-auto mt-6">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Entidad economica</th>
                            <th class="whitespace-nowrap">Denominación del cargo</th>
                            <th class="whitespace-nowrap">Salario</th>
                            <th class="whitespace-nowrap">Beneficiario</th>
                            <th class="whitespace-nowrap">Paquete</th>
                            <th class="whitespace-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contracts as $contract)
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $contract->id }}</td>
                                <td class="border-b dark:border-dark-5 text-gray-700 uppercase">
                                    {{ $contract->institution->nombre_comercial }}
                                    <br>
                                    <span class="text-gray-600">
                                        {{ $contract->institution->razon_social }}
                                    </span>
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $contract->vacancy->nombre }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $contract->vacancy->salario }}
                                </td>
                                <td class="border-b dark:border-dark-5 uppercase">
                                    {{ $contract->person->nombres }} {{ $contract->person->paterno }}
                                    {{ $contract->person->materno }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $contract->package->nombre }}
                                    <br>
                                    <span class="text-gray-600">
                                        {{ $contract->package->porcentaje }}%
                                    </span>
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <!--<div class="form-check">
                                        <input  class="form-check-switch" type="checkbox"
                                            value="{{ $contract->id }}">
                                        <label class="form-check-label">
                                            Verificacion
                                        </label>
                                    </div> -->
                                    <div class="form-check">
                                        <input wire:model='contract_id' class="form-check-switch" type="checkbox"
                                            value="{{ $contract->id }}">
                                        <label class="form-check-label">
                                            Registrar Reposicion
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if ($ventana == 2)
        <h1 class="text-xl text-gray-900"></h1>
        <div class="box py-8 px-6 mt-2">
            <form wire:submit.prevent='payContract' enctype="multipart/form-data"
                class="intro-y grid grid-cols-12 gap-2 items-center">
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Fecha de Inicio</label>
                    <input wire:model='fechaInicio' class="form-control block mx-auto" type="date">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Fecha de Fin</label>
                    <input wire:model='fechaFin' class="form-control block mx-auto" type="date">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Monto</label>
                    <input wire:model='monto' type="text" class="form-control" placeholder="7800">
                </div>
                <div class="intro-y col-span-12 sm:col-span-3">
                    <label class="form-label">C31</label>
                    <input wire:model='archivoC31' type="file" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3 pt-6">
                    <button type="submit" class="btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
    @endif
</div>
