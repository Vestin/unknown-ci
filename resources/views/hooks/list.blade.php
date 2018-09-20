@extends('basic')

@section('title')
    hooks
@endsection

@section('content')
    <h1>hooks</h1>
    <table class="table">
        <thead>
        <tr>
            <th>hook</th>
            <th>description</th>
            <th>bind projects</th>
            <th>active</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hooks as $hook)
            <tr>
                <td><strong>{{ $hook->name }}</strong></td>
                <td>{{ $hook->description }}</td>
                <td>
                    <ol>
                        @foreach($hook->projects as $project)
                            <li>{{ $project->name }}</li>
                        @endforeach
                        @if(empty($hook->projects))
                            <li>doesn't bind any project</li>
                        @endif
                    </ol>
                </td>
                <td>
                    @if($hook->active)
                        <i class="glyphicon glyphicon-ok-circle text-success"></i>
                    @else
                        <i class="glyphicon glyphicon-remove-circle text-danger"></i>
                    @endif
                </td>
                <td><a href="{{ route('hook.detail',[$hook->id]) }}">Info</a></td>
            </tr>
        @endforeach
        @if(empty($hooks))
            <tr>
                <td colspan="5">No Hook, <a href="{{ route('unknown.hooks') }}">generate hook from unknown hooks</a>
                </td>
            </tr>
        @endif
        </tbody>
        <tfoot>
        <tr>
            <th>hook</th>
            <th>description</th>
            <th>bind projects</th>
            <th>active</th>

            <th>action</th>
        </tr>
        </tfoot>
    </table>
@endsection