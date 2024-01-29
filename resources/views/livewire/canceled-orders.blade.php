<div>
    <div class="field">
        <label class="field__label" for="canceled">{{ __('Geannuleerd') }}</label>
        <div class="field--multiple">
            <div class="radio__group">
                <input id="canceled_true" type="radio" wire:model.live="canceled" value="1"
                    @if($order->deactivated_at) checked @endif
                    @if($order->notification_sent_at && !$order->seller_approved_at)
                        @can('isSeller') disabled @endcan
                    @endif
                >
                <label class="field__label" for="canceled_true">{{__('Ja')}}</label>
                <input id="canceled_false" type="radio" wire:model.live="canceled" value="0"
                    @if(!$order->deactivated_at) checked @endif
                    @if($order->notification_sent_at && !$order->seller_approved_at)
                        @can('isSeller') disabled @endcan
                    @endif
                >
                <label class="field__label" for="canceled_false">{{__('Nee')}}</label>
            </div>
            @error('canceled')
                <span class="form__message" role="alert">
                    <small>{{ $message }}</small>
                </span>
            @enderror

            @if($canceled)
                <input class="input--clean" id="canceldate" type="text" wire:model="canceldate" name="canceldate"
                    @if($canceled) value="{{$order->deactivated_at}}" @endif
                        @if($order->notification_sent_at && !$order->seller_approved_at)
                        @can('isSeller') disabled @endcan
                    @endif
                >
                @error('canceldate')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror

            @endif
        </div>
    </div>
</div>
