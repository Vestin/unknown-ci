@extends('basic')

@section('title')
    unknown hook detail
@endsection


@section('head')
    <style>
        dd {
            margin-left: 20px;
            word-wrap: break-word
        }
    </style>
@endsection

@section('content')
    <a href="{{ route('unknown.hooks') }}">back</a>
    <h1>unknown hook detail</h1>
    <p> Use this to
        <strong><a href="{{ route('hook.create-page',[$unknownHook->id]) }}">Generate Hook</a></strong>
    </p>
    @foreach($unknownHook->parseRequest() as $blockKey => $block)

        <h3>{{ $blockKey }}</h3>
        @foreach($block as $key=>$value)
            <dl>
                <dt>{{ $key }}</dt>
                <dd>{{ json_encode($value) }}</dd>
            </dl>
        @endforeach
    @endforeach

    @if(empty($unknownHook->parseRequest()))
        No data here.
    @endif
@endsection