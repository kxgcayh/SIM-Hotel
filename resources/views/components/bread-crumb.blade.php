<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">{{ $title }}</h3>
        <ol class="breadcrumb">
            {{ $slot }}
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <div class="d-flex m-t-10 justify-content-end">
            {{-- Start Right Button --}}
            {{ $button ?? '' }}
            {{-- End Right Button --}}
            <div class="">
                <button class="right-side-toggle waves-effect waves-light btn-danger
                    btn btn-circle btn-sm pull-right m-l-10">
                    <i class="ti-settings text-white"></i>
                </button>
            </div>
        </div>
    </div>
</div>
