@extends('basic')

@section('title')
    Pre build project
@endsection

@section('content')
    <h1>Pre build Project <i>{{ $project->name }}</i></h1>
    <form action="{{ route('build',[$project->id]) }}" method="post">
        {{ csrf_field() }}
        <button class="btn btn-primary btn-sm">build</button>
    </form>
@endsection