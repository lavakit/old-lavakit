@foreach ($fields as $fieldName => $fieldInfo)
    @include(getViewFieldSetting($fieldInfo), [
        'lang' => $locale = $locale ?? '',
        'fieldName' => strtolower($prefix ?? 'locale') . '::' . $fieldName,
        'fieldInfo' => $fieldInfo,
    ])
@endforeach