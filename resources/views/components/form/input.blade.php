@props([
    'type' => 'text',
    'name',
    'label',
    'value' => null,
    'extraAttributes' => '',
])

<div class="field">
    <x-form.label :text="$label" />
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $extraAttributes }}
    />
    <x-form.message :field-name="$name" />
</div>
