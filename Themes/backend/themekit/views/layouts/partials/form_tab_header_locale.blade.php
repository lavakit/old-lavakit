@php
    $prefix = $prefix ?? 'locale';
@endphp

@if (count(getSupportedLocales()) > 1)
    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
        @foreach (getSupportedLocales() as $locale => $language)
            <li class="nav-item">
                <a class="nav-link {{ locale() == $locale ? 'active show' : '' }}"
                   id="pills-tab-{{ $prefix . '-' . $locale }}"
                   data-toggle="pill"
                   href="#current-{{ $prefix . '-' . $locale }}">
                    {{ strtolower($language['name']) }}
                </a>
            </li>
        @endforeach
    </ul>
@endif