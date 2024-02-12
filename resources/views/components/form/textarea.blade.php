@props([
    'name',
    'label',
    'rows' => 3,
    'cols' => 30, 
    'extraAttributes' => [],
    'value' => null,
    'model' => null // Set $model to null by default
])

<div class="field field field--column">
    <label for="{{ $name }}" class="field__label">{{ __($label) }}</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        cols="{{ $cols }}"
        rows="{{ $rows }}"
        @if ($model) wire:model="{{ $model }}" @endif {{-- Check if $model is set --}}
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'field__textarea', 'placeholder' => __('Vul opmerkingen in...')]) }}
        {!! implode(' ', array_map(fn ($key, $value) => $key . '="' . $value . '"', array_keys($extraAttributes), $extraAttributes)) !!}
    >{{ old($name) }}</textarea>

    @error($name)
        <span class="form__message" role="alert">
            <small>{{ $message }}</small>
        </span>
    @enderror
</div>
