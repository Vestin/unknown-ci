@extends('basic')

@section('title')
    projects
@endsection

@section('content')
    <h1>projects</h1>
    <ul>
        @foreach($projects as $project)
            <li><a href="{{ route('project',[$project->id]) }}">{{ $project->name }}</a></li>
        @endforeach
        @if(empty($projects))
            <li>No projects have been found.</li>
        @endif
    </ul>
@endsection