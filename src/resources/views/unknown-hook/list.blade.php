@extends('basic')

@section('title')
    unknown hooks
@endsection

@section('content')
    <h1>Unknown Hooks</h1>
    <table class="table">
        <thead>
        <tr>
            <th>remote ip</th>
            <th>params</th>
            <th>request time</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unknownHooks->sortByDesc('id') as $unknownHook)
            <tr>
                <td>{{ $unknownHook->parseRequest()->server->REMOTE_ADDR }}</td>
                <td>{{ json_encode($unknownHook->parseRequest()->params) }}</td>
                <td>{{ $unknownHook->created_at }}</td>
                <td><a href="{{ route('unknown.hook.detail',[$unknownHook->id]) }}">more</a></td>
            </tr>
        @endforeach
        @if(!count($unknownHooks))
            <tr>
                <td colspan="4">No Hooks</td>
            </tr>
        @endif
        </tbody>
        <tfoot>
        <tr>
            <th>remote ip</th>
            <th>params</th>
            <th>request time</th>
            <th>action</th>
        </tr>
        </tfoot>
    </table>

@endsection