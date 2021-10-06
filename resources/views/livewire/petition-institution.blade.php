<div>
    @include('layout.partials.errors')
    @include('layout.partials.flashMessage')
    @if ($ventana == 1)
        <div class="box py-8 px-6">
            <form wire:submit.prevent='createdPetition' enctype="multipart/form-data"
                class="grid grid-cols-12 gap-2 items-center">
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Titulo</label>
                    <input wire:model='titulo' type="text" class="form-control" placeholder="Reposición de enero">
                </div>
                <div class="col-span-12 sm:col-span-3 pt-6">
                    <button type="submit" class="btn btn-secondary">Crear</button>
                </div>
            </form>
        </div>

        <div class="box py-8 px-6 mt-4">
            <div class="overflow-x-auto pt-4">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">titulo</th>
                            <th class="whitespace-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petitions as $petition)
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $petition->id }}</td>
                                <td class="border-b dark:border-dark-5 uppercase">{{ $petition->titulo }}</td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input wire:model='petition_id' class="form-check-switch" type="checkbox"
                                                value="{{ $petition->id }}">
                                            <label class="form-check-label">
                                                Registrar Beneficiarios
                                            </label>
                                            <a class="flex cursor-pointer text-theme-9 mr-2 ml-4"
                                                wire:click="sendPetition({{ $petition->id }})">
                                                <x-feathericon-send class="w-4 h-4 mr-1" />Enviar
                                            </a>
                                            <a class="flex cursor-pointer text-theme-6 mr-2 ml-4"
                                                wire:click="softDeletePetition({{ $petition->id }})">
                                                <x-feathericon-trash class="w-4 h-4 mr-1" />Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $petitions->links() }}
            </div>
        </div>
    @endif
    @if ($ventana == 2)
        <div class="box py-8 px-6">
            <form wire:submit.prevent='addForm' enctype="multipart/form-data"
                class="grid grid-cols-12 gap-2 items-center">
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Beneficiario</label>
                    <select wire:model="contract_id" class="form-select uppercase">
                        <option value="">Seleccione un opcion</option>
                        @foreach ($contracts as $contract)
                            <option value="{{ $contract->id }}">{{ $contract->person->nombres }}
                                {{ $contract->person->paterno }} {{ $contract->person->materno }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Salario Basico</label>
                    <input wire:model='salario' type="number" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Dias Cotizados</label>
                    <input wire:model='dias' type="number" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Descuentos</label>
                    <input wire:model='descuentos' type="number" step="0.01" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <label class="form-label">Bonificaciones</label>
                    <input wire:model='bonificaciones' type="number" step="0.01" class="form-control">
                </div>
                <div class="col-span-12 sm:col-span-3 pt-6">
                    <button type="submit" class="btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>

        <div class="box py-8 px-6 mt-4">
            <div class="col-span-12 sm:col-span-3 pt-6">
                <button wire:click='exportExcel' class="btn btn-secondary">
                    <x-feathericon-file-text class="w-4 h-4 mr-1" /> Exportar Excel
                </button>
            </div>
            <div class="overflow-x-auto pt-4">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap uppercase">#</th>
                            <th class="whitespace-nowrap uppercase">Nombre del Beneficiario</th>
                            <th class="whitespace-nowrap uppercase">Ci del Beneficiario</th>
                            <th class="whitespace-nowrap uppercase">Fecha inicio de contrato</th>
                            <th class="whitespace-nowrap uppercase">dias</th>
                            <th class="whitespace-nowrap uppercase">Salario</th>
                            <th class="whitespace-nowrap uppercase">Descuentos</th>
                            <th class="whitespace-nowrap uppercase">Bonificaciones</th>
                            <th class="whitespace-nowrap uppercase">paquete</th>
                            <th class="whitespace-nowrap uppercase">total Ganado</th>
                            <th class="whitespace-nowrap uppercase">total Convenio</th>
                            <th class="whitespace-nowrap uppercase">Reposición</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forms as $form)
                            <tr>
                                <td class="border-b dark:border-dark-5 text-center">{{ $form->id }}</td>
                                <td class="border-b dark:border-dark-5 text-center uppercase">
                                    {{ $form->contract->person->nombres }} {{ $form->contract->person->paterno }}
                                    {{ $form->contract->person->materno }}</td>
                                <td class="border-b dark:border-dark-5 text-center">{{ $form->contract->person->ci }}
                                    {{ $form->contract->person->expedido }}</td>
                                <td class="border-b dark:border-dark-5 text-center">
                                    {{ \Carbon\Carbon::parse($form->contract->fecha_inicio)->format('d-m-Y') }}</td>
                                <td class="border-b dark:border-dark-5 text-center">{{ $form->dias }}</td>
                                <td class="border-b dark:border-dark-5 text-center">
                                    {{ $form->salario }}</td>
                                <td class="border-b dark:border-dark-5 text-center">{{ $form->descuentos }}</td>
                                <td class="border-b dark:border-dark-5 text-center">{{ $form->bonificaciones }}</td>
                                <td class="border-b dark:border-dark-5 text-center">
                                    {{ $form->contract->package->porcentaje }} %
                                    <br>
                                    {{ $form->contract->package->nombre }}
                                </td>
                                <td class="border-b dark:border-dark-5 text-center">
                                    {{ round(($form->salario / 30) * $form->dias, 2) - $form->descuentos + $form->bonificaciones }}
                                    Bs
                                </td>
                                <td class="border-b dark:border-dark-5 text-center">
                                    @if ($form->salario > 4000)
                                        {{ round((4000 / 30) * $form->dias, 2) }} Bs
                                    @else
                                        {{ round(($form->salario / 30) * $form->dias, 2) }} Bs
                                    @endif
                                </td>
                                <td class="border-b dark:border-dark-5 text-center">
                                    @if ($form->salario > 4000)
                                        {{ round((4000 / 30) * $form->dias * ($form->contract->package->porcentaje / 100), 2) }}
                                        Bs
                                    @else
                                        {{ round(($form->salario / 30) * $form->dias * ($form->contract->package->porcentaje / 100), 2) }}
                                        Bs
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
