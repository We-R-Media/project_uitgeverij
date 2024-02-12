<div>
    {{-- <a href="{{ route('orderlines.complaint', ['orderline_id' => $orderline->id]) }}}" class="btn">{{__('Klacht')}}</a> --}}
    @if ($displayComplaint)
        <form action="{{ route('complaints.store', ['order_id' => $order->id, 'orderline_id' => $orderline->id]) }}" method="post">
            @method('post')
            @csrf
            <div class="form__popup {{ $displayComplaint ? 'popup--open' : '' }}">
            <div class="popup__inner">
                <span class="popup__close" wire:click.prevent="displayComplaint"></span>
                    <div class="section__block">
                        <x-form.input model="type" type="text" label="Soort" name="type"/>
                        <x-form.textarea model="description" cols="10" rows="30" label="Omschrijving" placeholder="Vul omschrijving in..." name="description"/>
                    </div>
                    <button type="submit" class="button button--primary">{{__('Klacht indienen')}}</button>
            </div>
        </div>
        </form>
    @endif
</div>