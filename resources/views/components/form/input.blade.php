@props([
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
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $extraAttributes }}
    />
{{-- {{dump( old($name, $value) )}} --}}
    {{-- {{dump($name)}}
    {{dump($value)}} --}}
    <x-form.message :field-name="$name" />
</div>
