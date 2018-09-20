@extends('basic')

@section('title')
    Pre Clear All UnknownHooks
@endsection

@section('content')
    <h1>Sure clear All UnknownHooks? </h1>
    <form action="{{ route('unknown.hooks.clear') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-sm btn-primary">Clear</button>
    </form>
@endsection