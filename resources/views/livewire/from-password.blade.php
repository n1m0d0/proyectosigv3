<div>
    <div class="box py-10 px-8 sm:py-4 mt-5">
        @include('layout.partials.errors')
        @include('layout.partials.flashMessage')
        <h2 class="text-lg uppercase text-gray-900 py-2 text-left mt-4">Datos: </h2>
        <form wire:submit.prevent='updatePassword' class="grid grid-cols-12 gap-2 items-center">
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Contraseña Anterior</label>
                <input wire:model='claveAnterior' type="password" class="form-control">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Contraseña Nueva</label>
                <input wire:model='claveNueva' type="password" class="form-control">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Confirmacion</label>
                <input wire:model='verificacion' type="password" class="form-control">
            </div>
            <div class="col-span-12 sm:col-span-3 pt-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
        href="{{ route('page.dashboard') }}">Finalizar</a>
</div>
