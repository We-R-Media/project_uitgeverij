<div class="fields base">
    <div class="field field-alt">
        <label for="canceled">{{ __('Geannuleerd') }}</label>
        <div class="radio__group">
            <input id="canceled_true" type="radio" wire:model.live="canceled" value="1" @can('isSeller') disabled @endcan @if($order->deactivated_at) checked @endif>
            <label for="canceled_true">{{__('Ja')}}</label>
            <input id="canceled_false" type="radio" wire:model.live="canceled" value="0" @can('isSeller') disabled @endcan @if(!$order->deactivated_at) checked @endif>
            <label for="canceled_false">{{__('Nee')}}</label>
        </div>
        @error('canceled')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
        @enderror
    </div>

    <div class="field field-alt">
        <label for="canceldate">{{ __('Annuleringsdatum') }}</label>
        {{-- <input id="" type="text" wire:model="canceldate" name="canceldate" @if($canceled == 1) value="{{$order->deactivated_at}}" @endif value=""> --}}
        <input id="canceldate" type="text" wire:model="canceldate" name="canceldate" @can('isSeller') disabled @endcan @if($canceled) value="{{$order->deactivated_at}}" @endif>
        @error('canceldate')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
        @enderror
    </div>
</div>