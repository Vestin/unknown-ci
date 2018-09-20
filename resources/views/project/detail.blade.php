@extends('basic')

@section('title')
    project detail
@endsection

@section('head')
    <style>
        .task ul, li {
            list-style: none;
        }
    </style>
@endsection

@section('content')
    <h1>{{ $project->name }}</h1>
    <ul>
        <li>name: {{ $project->name }}</li>
        <li>owner: {{ $project->owner }}</li>
        <li>yml: <br><textarea name="" id="" cols="30" rows="10" readonly>{{ $project->yml }}</textarea></li>
        <li>create at: {{ $project->created_at }}</li>
        <li>update at: {{ $project->updated_at }}</li>
    </ul>
    <dl>
        <dt>Bind Hooks</dt>
        <dd>
            <ul>
                @foreach($project->hooks as $hook)
                    <li>
                        <a href="{{ route('hook.detail',[$hook->id]) }}">{{ $hook->name }}</a> | active:

                        @if($hook->active)
                            <i class="glyphicon glyphicon-ok-circle text-success"></i>
                        @else
                            <i class="glyphicon glyphicon-remove-circle text-danger"></i>
                        @endif
                    </li>
                @endforeach
                @if(count($project->hooks)==0)
                    <li>Bind no hooks</li>
                @endif
            </ul>
        </dd>
    </dl>
    <h2>tasks</h2>
    <div class="task">
        <table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>task ID</th>
                <th>status</th>
                <th>start time</th>
                <th>end time</th>
                <th>created at</th>
                <th>updated at</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $project->tasks->sortByDesc('id') as $task)
                <tr class="{{ $task->viewModel->statusClass }}">
                    <td><strong>{{ $task->id }}</strong></td>
                    <td>{{ $task->viewModel->statusDes }}</td>
                    <td>{{ $task->start_time }}</td>
                    <td>{{ $task->end_time }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                    <td><a href="{{  route('task',[$task->id]) }}">Detail</a></td>
                </tr>
            @endforeach
            @if(empty($project->tasks))
                <tr>
                    <td colspan="6">No Data</td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <th>task ID</th>
                <th>status</th>
                <th>start time</th>
                <th>end time</th>
                <th>created at</th>
                <th>updated at</th>
                <th>action</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

