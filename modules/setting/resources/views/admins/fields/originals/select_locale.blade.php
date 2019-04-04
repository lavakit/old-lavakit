<div class="form-group">
    {!! Form::label($fieldName, trans($fieldInfo['description'])) !!}

    <select multiple class="locales" name="{{ $fieldName }}[]" id="{{ $fieldName }}">
        @foreach ($locales as $flag => $locale)
            <option value="{{ $flag }}" {{ isset($dbSettings[$fieldName]) && isset(array_flip(json_decode($dbSettings[$fieldName]->plain_value))[$flag]) ? 'selected' : '' }}>
                {{ array_get($locale, 'name') }}
            </option>
        @endforeach
    </select>
</div>

@push('js-stack')
    <script>
        $( document ).ready(function() {
            $('.locales').selectize({
                delimiter: ',',
                plugins: ['remove_button']
            });
        });
    </script>
@endpush