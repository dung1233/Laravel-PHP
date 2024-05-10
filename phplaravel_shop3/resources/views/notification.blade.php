
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        <a href="{{ route('create.event') }}" class="btn btn-primary">Tạo tiếp</a>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
