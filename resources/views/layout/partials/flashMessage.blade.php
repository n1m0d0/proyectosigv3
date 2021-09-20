@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
        <x-feathericon-alert-octagon class="w-6 h-6 mr-2"/> {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <x-feathericon-x class="w-4 h-4" />
        </button>
    </div>
@endif
@if (Session::has('alert'))
    <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert">
        <x-feathericon-alert-octagon class="w-6 h-6 mr-2"/> {{ Session::get('alert') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <x-feathericon-x class="w-4 h-4" />
        </button>
    </div>
@endif