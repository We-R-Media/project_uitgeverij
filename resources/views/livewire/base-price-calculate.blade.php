<div class="form__section">
    <div class="field">
        <label class="field__label" for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" name="base_price" wire:model="base_price" readonly>
        @error('base_price')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
        @enderror
    </div>
