@foreach($languages as $key => $lang)
    <a href="{{ $lang['url'] }}">{{ $lang['native_name'] }}</a>
    {{ (array_search($key, array_keys($languages)) + 1) < count($languages) ? '|' : null }}
@endforeach