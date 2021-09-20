<div>
    @include('layout.partials.errors')
    @include('layout.partials.flashMessage')
    @if ($ventana == 1)
        <div class="box py-8 px-6">
            <h1 class="text-xl text-gray-900">Lista de Vacancias Pendientes</h1>
            <div class="overflow-x-auto mt-6">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Entidad economica</th>
                            <th class="whitespace-nowrap">Denominación del cargo</th>
                            <th class="whitespace-nowrap">Personal requerido</th>
                            <th class="whitespace-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $vacancy)
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $vacancy->id }}</td>
                                <td class="border-b dark:border-dark-5 text-gray-700 uppercase">
                                    {{ $vacancy->institution->nombre_comercial }}
                                    <br>
                                    <span class="text-gray-600">
                                        {{ $vacancy->institution->razon_social }}
                                    </span>
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $vacancy->nombre }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $vacancy->cantidad }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input wire:model='vacancia_id' class="form-check-switch" type="checkbox"
                                                value="{{ $vacancy->id }}">
                                            <label class="form-check-label">
                                                Registrar Contrato
                                            </label>
                                        </div>
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
            <form wire:submit.prevent='addContract' enctype="multipart/form-data"
                class="intro-y grid grid-cols-12 gap-2 items-center">
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Persona</label>
                    <select wire:model="payroll_id" class="form-select">
                        <option value="">Seleccione un opcion</option>
                        @foreach ($payrolls as $payroll)
                            <option class="uppercase" value="{{ $payroll->id }}">
                                {{ $payroll->person->nombres }} {{ $payroll->person->paterno }}
                                {{ $payroll->person->materno }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Paquete</label>
                    <select wire:model="package_id" class="form-select">
                        <option value="">Seleccione un opcion</option>
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Contrato</label>
                    <input wire:model='archivoContrato' type="file" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Codigo</label>
                    <input wire:model='codigo' type="text" class="form-control" placeholder="MPD/INF/001-2021">
                </div>
                <div class="col-span-12 sm:col-span-3 pt-6">
                    <button type="submit" class="btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
        <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
        href="{{ route('contract.institution') }}">Finalizar</a>
    @endif
</div>
