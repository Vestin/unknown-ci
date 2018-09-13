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
    <h1>Add Hook</h1>
    <form action="{{ route('hook.create') }}" method="post" id="createHookForm">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="rule">Rules</label>
            <textarea name="rule" id="rule" class="form-control" rows="5"></textarea>
        </div>

        <button class="btn btn-primary">Create Hook</button>
    </form>
    <hr>
    @foreach($unknownHook->parseRequest() as $blockKey => $block)
        <h3>{{ $blockKey }}</h3>
        @foreach($block as $key=>$value)
            <div class="params-box">
                <div class="pull-left">
                    <button class="btn btn-xs btn-success add-button">+</button>
                </div>
                <div class="pull-left">
                    <dl>
                        <dt realkey="{{ $blockKey }}.{{ $key }}">{{ $key }}</dt>
                        <dd>{{ json_encode($value) }}</dd>
                    </dl>
                </div>
            </div>
            <div class="clearfix"></div>
        @endforeach
    @endforeach
@endsection

@section('script')
    <script>
        $('.add-button').click(function () {
            $(this).attr('disabled', 'disabled');
            var data = $('#rule').val();

            var dl = $(this).parent().siblings('div').children('dl');
            data += dl.children('dt').attr('realkey') + ':' + dl.children('dd').text();

            $('#rule').val(data + '\n');
        })
    </script>
@endsection
