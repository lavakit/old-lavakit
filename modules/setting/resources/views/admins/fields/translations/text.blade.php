<div class="form-group">
    {!! Form::label($fieldName . "[$lang]", trans($fieldInfo['description'])) !!}

    @if(isset($dbSettings[$fieldName]))
        {!!
            Form::text($fieldName . "[$lang]", old($fieldName . "[$lang]", valueDbSetting($dbSettings[$fieldName], $lang)
            ), [
                'class' => 'form-control',
                'placeholder' => trans($fieldInfo['placeholder'] ?? $fieldInfo['description'])
            ])
        !!}
    @else
        {!!
            Form::text($fieldName . "[$lang]", old($fieldName . "[$lang]"), [
                'class' => 'form-control',
                'placeholder' => trans($fieldInfo['placeholder'] ?? $fieldInfo['description'])
            ])
        !!}
    @endif
</div>