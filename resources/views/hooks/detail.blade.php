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
@endsection

@section('content')
    <h1><i>{{ $hook->name }}</i></h1>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">name</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $hook->name }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">active</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    @if($hook->active)
                        <i class="glyphicon glyphicon-ok-circle text-success"></i>
                    @else
                        <i class="glyphicon glyphicon-remove-circle text-danger"></i>
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">description</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $hook->description }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">create at</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $hook->created_at }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">rules</label>
            <div class="col-sm-10">
                <ul class="form-control-static">
                    @foreach($hook->viewModel->rules as $key=>$rule)
                        <li>{{ $key }} : {{ $rule }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">bind projects</label>
            <div class="col-sm-10">
                @foreach($hook->projects as $project)
                    <p class="form-control-static"><a
                                href="{{ route('project',[$project->id]) }}">{{ $project->name }}</a>
                    </p>
                @endforeach
                @if(empty($hook->projects))

                    <p class="form-control-static text-danger">This hook doesn't bind any project.</p>
                @endif
            </div>
        </div>
    </form>

    @if($hook->active)
        <form action="{{ route('hook.de-active',[$hook->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <button class="btn btn-warning">De-Active</button>
        </form>
    @else
        <form action="{{ route('hook.active',[$hook->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <button class="btn btn-primary">Active</button>
        </form>
    @endif
@endsection