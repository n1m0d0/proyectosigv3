<div class="box p-8">
    <h2 class="text-lg uppercase text-gray-900 py-4 mt-10 mb-10 text-center">{{ $institution->razon_social }}</h2>
    @include('layout.partials.errors')
    @include('layout.partials.flashMessage')
    <form wire:submit.prevent='addVacancy' enctype="multipart/form-data"
        class="intro-y grid grid-cols-12 gap-2 items-center">
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Casa Matriz / Sucursales</label>
            <select wire:model="sucursal" class="form-select">
                <option value="">Seleccione un opcion</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->tipo }} - {{ $branch->department->nombre }} - {{ $branch->direccion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Denominación del cargo</label>
            <input wire:model='nombreVacacia' type="text" class="form-control" placeholder="Encargado de Almacenes">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Grado Académico</label>
            <select wire:model='gradoAcademico' class="form-select">
                <option value="">Seleccione un opcion</option>
                <option>Egresado</option>
                <option>Técnico</option>
                <option>Profesional</option>
            </select>
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Area de Formacion</label>
            <select wire:model="carrera" class="form-select">
                <option value="">Seleccione un opcion</option>
                @foreach ($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Descripcion del trabajo</label>
            <input wire:model='descripcion' type="text" class="form-control"
                placeholder="Realizar el inventario de mercaderia">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Salario Mensual</label>
            <input wire:model='salario' type="text" class="form-control" placeholder="200.00">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Cantidad de Personal</label>
            <input wire:model='cantidad' type="text" class="form-control" placeholder="5">
        </div>
        <div class="col-span-12 sm:col-span-3 pt-6">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>

    <div class="overflow-x-auto pt-4">
        <table class="table intro-y">
            <thead>
                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Sucursal</th>
                    <th class="whitespace-nowrap">Vacancia</th>
                    <th class="whitespace-nowrap">Descripcion</th>
                    <th class="whitespace-nowrap">Cantidad</th>
                    <th class="whitespace-nowrap">Estado</th>
                    <th class="whitespace-nowrap">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $vacancy)
                    <tr>
                        <td class="border-b dark:border-dark-5">{{ $vacancy->id }}</td>
                        <td class="border-b dark:border-dark-5">{{ $vacancy->branch->department->nombre }} -
                            {{ $vacancy->branch->direccion }}</td>
                        <td class="border-b dark:border-dark-5">{{ $vacancy->nombre }}</td>
                        <td class="border-b dark:border-dark-5">{{ $vacancy->descripcion }}</td>
                        <td class="border-b dark:border-dark-5">{{ $vacancy->cantidad }}</td>
                        <td class="border-b dark:border-dark-5">{{ $vacancy->estado }}</td>
                        <td class="border-b dark:border-dark-5">
                            @if ($vacancy->estado == 'ACTIVO')
                                <a wire:click="inactiveVacancy({{ $vacancy->id }})" class="btn btn-danger">Dar de
                                    baja</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
                            href="{{ route('page.dashboard') }}">Finalizar</a>
</div>
