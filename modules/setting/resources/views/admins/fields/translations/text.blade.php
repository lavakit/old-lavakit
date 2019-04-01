<div class="form-group">
    <label for="{{ $fieldName . "[$lang]" }}">{{ trans($fieldInfo['description']) }}</label>

    @if(isset($dbSettings[$fieldName]))

    @else
        {!!
            Form::text($fieldName . "[$lang]", old($fieldName . "[$lang]"), [
                'class' => 'form-control',
                'placeholder' => trans($fieldInfo['placeholder'] ?: $fieldInfo['description'])
            ])
        !!}
    @endif
</div>