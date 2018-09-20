@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </div>
@endif