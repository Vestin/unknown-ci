@extends('basic')

@section('title')
    {{ $task->project->name }} | task: {{ $task->id }}
@endsection

@section('head')
    <style>
        .task {
            border-bottom: 1px solid #EEE;
        }

        .task ul, li {
            list-style: none;
        }
    </style>
@endsection

@section('content')
    <a href="{{ route('project',[$task->project->id]) }}">back</a>
    <h1>{{ $task->project->name }} | task: {{ $task->id }}</h1>
    <h2>tasks</h2>
    <div class="task">
        <ul>
            <li>task id: {{ $task->id }}</li>
            <li class="{{ $task->viewModel->statusClass }}">status: {{ $task->viewModel->statusDes }}</li>
            <li>start time: {{ $task->start_time }}</li>
            <li>end time:{{ $task->end_time }}</li>
            <li>create at: {{ $task->created_at }}</li>
            <li>update at: {{ $task->updated_at }}</li>
        </ul>
    </div>
    <h3>log</h3>
    <pre style="max-width:100%;">{{ $task->viewModel->getLog() }}</pre>
@endsection