<div class="field field-alt">
    <label for="format">{{__('Formaat')}}</label>
    <select wire:model="format_id" name="format" id="">
        @foreach ($formats as $format)
            <option value="{{ $format->id }}">{{ $format->size }}</option>
        @endforeach
    </select>

    <section class="field field-alt">
        <label for="base_price">{{__('Basisbedrag')}}</label>
        <input wire:model="base_price" type="text" name="base_price" id="" readonly>
    </section>
</div>