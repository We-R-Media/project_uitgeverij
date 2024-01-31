@props([
    'name',
    'label',
    'options' => [],
    'selected' => null,
    'extraAttributes' => '',
])

<div class="field">
    <label class="field__label" for="{{ $name }}">{{ __($label) }}</label>
    <div class="dropdown">
        <select name="{{ $name }}" id="{{ $name }}" {{ $extraAttributes }}>
            @foreach ($options as $value => $optionLabel)
                <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $optionLabel }}</option>
            @endforeach
        </select>
    </div>
    @error($name)
        <span class="form__message" role="alert">
            <small>{{ $message }}</small>
        </span>
    @enderror
</div>
