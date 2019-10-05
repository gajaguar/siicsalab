<div class="form-group {{ $style ?? '' }}">
  <label for="{{ $fieldName }}">
    {{ $label }}
  </label>

  <input id="{{ $fieldName }}"
         class="form-control {{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
         autocomplete="off"
         maxlength="{{ $maxLength }}"
         name="{{ $fieldName }}"
         {{ isset($readonly) && $readonly ? 'readonly' : '' }}
         type="text"
         value="{{ $value }}"
         data-autofocus="{{ $autofocus ?? 'false' }}"
         aria-describedby="{{ $textHelp }}">

  @if ($errors->has($fieldName))
    <span class="invalid-feedback"
          role="alert">
      {{ $errors->first($fieldName) }}
    </span>
  @else
    <small id="{{ $textHelp }}"
           class="form-text text-muted">
      {{ $textDescription }}
    </small>
  @endif
</div>
