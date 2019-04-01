@foreach ($fields as $fieldName => $fieldInfo)
    @include(getViewFieldSetting($fieldInfo), [
        'lang' => $locale = $locale ?? '',
        'fieldName' => strtolower($prefix) . '::' . $fieldName,
        'fieldInfo' => $fieldInfo,
    ])
@endforeach