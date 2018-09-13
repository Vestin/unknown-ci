@if(isset($sideMenu) && !empty($sideMenu))
    <ul class="list-group">
        @foreach($sideMenu as $item)
            <a class="list-group-item" href="{{ $item['url'] }}">{{ $item['name'] }}</a>
        @endforeach
    </ul>
@endif
