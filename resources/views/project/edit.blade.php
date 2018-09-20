@extends('basic')

@section('title')
    edit project {{ $project->name }}
@endsection

@section('content')
    <h1><span class="text-info">{{ $project->name }}</span> <span class="text-muted">[edit]</span></h1>
    <form action="{{ route('project.edit',[$project->id]) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $project->id }}">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                   value="{{ $project->name }}">
        </div>
        <div class="form-group">
            <label for="owner">owner</label>
            <input type="number" class="form-control" name="owner" id="owner" placeholder="owner"
                   value="{{ $project->owner }}">
        </div>
        <div class="form-group">
            <label for="yml">yml</label>
            <textarea name="yml" id="yml" cols="30" rows="10" class="form-control">{{ $project->yml }}</textarea>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">save</button>
    </form>
@endsection