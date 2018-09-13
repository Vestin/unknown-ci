@extends('basic')

@section('title')
    hooks
@endsection

@section('head')
    <style>
        .params-box > div {
            margin-right: 10px;
        }

        dd {
            margin-left: 20px;
            word-break: break-all;
        }
    </style>
@section('head')

@section('content')
    <h1>Edit Hook <i>{{ $hook->name }}</i></h1>
    <form action="{{ route('hook.edit',[$hook->id]) }}" method="post" id="createHookForm">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $hook->name }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"
                      rows="5">{{ $hook->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="rule">Rules</label>
            <textarea name="rule" id="rule" class="form-control"
                      rows="5">@foreach($hook->viewModel->rules as $key=>$value) {{$key}}
                :{{$rule}} @endforeach</textarea>
        </div>

        <div class="form-group">
            <label for="rule">Bind Projects</label>
            <select multiple name="projects[]" id="projects" class="form-control">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
    <hr>
@endsection