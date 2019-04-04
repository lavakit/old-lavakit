<div class="form-group">
    {!! Form::label($fieldName, trans($fieldInfo['description'])) !!}

    <select class="form-control" name="{{ $fieldName }}" id="{{ $fieldName }}">
        @foreach (\ThemeFrontend::allThemeName() as $theme)
            <option value="{{ $theme }}" {{ isset($dbSettings[$fieldName]) && $dbSettings[$fieldName]->plain_value == $name ? 'selected' : '' }}>
                {{ ucfirst($theme) }}
            </option>
        @endforeach
    </select>
</div>