@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
            <x-feathericon-alert-octagon class="w-6 h-6 mr-2" />
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <x-feathericon-x class="w-4 h-4" />
            </button>
        </div>
    @endforeach
@endif
