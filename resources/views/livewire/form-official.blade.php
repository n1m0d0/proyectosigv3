<div>
    <div class="box py-10 px-8 sm:py-4 mt-5">
        @include('layout.partials.errors')
        @include('layout.partials.flashMessage')
        <h2 class="text-lg uppercase text-gray-900 py-2 text-left mt-4">Datos: </h2>
        <form wire:submit.prevent='addOfficial' class="grid grid-cols-12 gap-2 items-center">
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Nombres</label>
                <input wire:model='nombres' type="text" class="form-control" placeholder="Jose Luis">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Apellido Paterno</label>
                <input wire:model='paterno' type="text" class="form-control" placeholder="Delgado">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Apellido Materno</label>
                <input wire:model='materno' type="text" class="form-control" placeholder="Mamani">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Correo</label>
                <input wire:model='correo' type="text" class="form-control" placeholder="micorreo@gmail.com">
            </div>
            <div class="col-span-12 sm:col-span-3 pt-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto pt-4">
        <table class="table">
            <thead>
                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Nombre Completo</th>
                    <th class="whitespace-nowrap">Correo</th>
                    <th class="whitespace-nowrap">Estado</th>
                    <th class="whitespace-nowrap">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($officials as $official)
                    <tr>
                        <td class="border-b dark:border-dark-5">{{ $official->id }}</td>
                        <td class="border-b dark:border-dark-5">{{ $official->nombres }}
                            {{ $official->paterno }} {{ $official->materno }}</td>
                        <td class="border-b dark:border-dark-5">{{ $official->user->email }}</td>
                        <td class="border-b dark:border-dark-5">
                            @if ($official->user->activation == 1)
                                ACTIVO
                            @else
                                INACTIVO
                            @endif
                        </td>
                        <td>
                            @if ($official->user->activation == 1)
                                @if ($official->user->id != 1)
                                    <a class="flex cursor-pointer text-theme-6 mr-2"
                                        wire:click="softDeleteOfficial({{ $official->id }})">
                                        <x-feathericon-trash class="w-4 h-4 mr-1" /> Baja
                                    </a>
                                @endif
                            @else
                                @if ($official->user->id != 1)
                                    <a class="flex cursor-pointer text-theme-9 mr-2"
                                        wire:click="activateOfficial({{ $official->id }})">
                                        <x-feathericon-power class="w-4 h-4 mr-1" /> Alta
                                    </a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $officials->links() }}
    </div>

    <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
        href="{{ route('page.dashboard') }}">Finalizar</a>
</div>
