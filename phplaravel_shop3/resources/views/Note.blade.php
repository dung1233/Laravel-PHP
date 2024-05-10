
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    
@endif
<a href='{{url("/student/dangbai")}}' class="btn btn-primary">Tạo tiếp</a>

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
