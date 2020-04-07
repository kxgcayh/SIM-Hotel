{{-- !! Always add div.row before --}}
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $title }}</h3>
            {{ $slot }}
        </div>
    </div>
</div>
