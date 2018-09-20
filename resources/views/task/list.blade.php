@extends('basic')

@section('title')
    tasks
@endsection

@section('content')
    <h2>tasks</h2>
    <table class="table table-condensed table-bordered">
        <thead>
        <tr>
            <th>task ID</th>
            <th>project</th>
            <th>status</th>
            <th>start time</th>
            <th>end time</th>
            <th>created at</th>
            <th>updated at</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $tasks->sortByDesc('id') as $task)
            <tr class="{{ $task->viewModel->statusClass }}">
                <td>{{ $task->id }}</td>
                <td><strong>{{ $task->project->name }}</strong></td>
                <td>{{ $task->viewModel->statusDes }}</td>
                <td>{{ $task->start_time }}</td>
                <td>{{ $task->end_time }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
                <td><a href="{{  route('task',[$task->id]) }}">Detail</a></td>
            </tr>
        @endforeach
        @if(empty($tasks))
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
@endsection
