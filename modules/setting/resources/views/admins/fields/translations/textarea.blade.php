<div class="form-group">
    {!! Form::label($fieldName . "[$lang]", trans($fieldInfo['description'])) !!}

    @if(isset($dbSettings[$fieldName]))
        {!!
            Form::textarea($fieldName . "[$lang]", old($fieldName . "[$lang]", valueDbSetting($dbSettings[$fieldName], $lang)), [
                'class' => 'form-control',
                'row' => 5,
                'placeholder' => trans($fieldInfo['placeholder'] ?? $fieldInfo['description'])
            ])
        !!}
    @else
        {!!
            Form::textarea($fieldName . "[$lang]", old($fieldName . "[$lang]"), [
                'class' => 'form-control',
                'rows' => 4,
                'placeholder' => trans($fieldInfo['placeholder'] ?? $fieldInfo['description'])
            ])
        !!}
    @endif
</div>