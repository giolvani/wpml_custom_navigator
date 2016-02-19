#WPML Custom Selector/Navigator
###Widget


Create customized html structures for the WPML selector, using blade template engine.

Templates
------------

Default template (views/tpl_structure.blade.php)
```php
@foreach($languages as $key => $lang)
    <a href="{{ $lang['url'] }}">{{ $lang['native_name'] }}</a>
    {{ (array_search($key, array_keys($languages)) + 1) < count($languages) ? '|' : null }}
@endforeach
```


Template for [Sailing WordPress Theme](http://demo.thimpress.com/?item=sailing)
```php
<div class="thim-select-language">
    <div class="language">
        <span>Language</span>
        <ul>
            @foreach($languages as $lang)
                <li>
                    <a href="{{ $lang['url'] }}">
                        @if($lang['country_flag_url'])
                            <img src="{{ $lang['country_flag_url'] }}" alt="{{ $lang['language_code'] }}" width="18" height="12" />
                        @endif
                        {{ $lang['native_name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
```


References
------------

#### Available variables
 Var        | Description
:-----------|:-----------------------------------------------------------------------
 $languages | List of available languages
 $active    | Active language 


#### Tags documentation

 Tag                | Description
:-------------------|:-----------------------------------------------------------------------
 id                 | Internal reference id
 active             | This is the currently active language (exactly one language is active)
 native_name        | The native name of the language (never translated)
 translated_name    | The name of the language translated to the currently active language
 country_flag_url   | The URL to a PNG image with the country flag
 url                | The link to the translation in that language
 missing            | 1 if the translation for that element is missing, 0 if it it exists.
 
 
https://wpml.org/documentation/getting-started-guide/language-setup/custom-language-switcher/

#### Blade template documentation
https://laravel.com/docs/4.2/templates#blade-templating
