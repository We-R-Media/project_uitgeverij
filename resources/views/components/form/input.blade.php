@props([
    'model' => null,
    'type' => 'text',
    'name',
    'label',
    'value' => null,
    'extraAttributes' => '',
    'column' => false
])

<div class="field {{ $column ? 'field--column' : '' }}">
    <x-form.label :text="$label" />
    <input
        wire:model="{{ $model }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $extraAttributes }}
    />
    <x-form.message :field-name="$name" />
</div>
