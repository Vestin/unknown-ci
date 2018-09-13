@extends('basic')

@section('title')
    add project
@endsection


@section('content')
    <h1>add project</h1>
    <form action="{{ route('project.add') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="owner">owner</label>
            <input type="number" class="form-control" name="owner" id="owner" placeholder="owner">
        </div>
        <div class="form-group">
            <label for="yml">yml</label>
            <textarea name="yml" id="yml" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">add</button>
    </form>
@endsection