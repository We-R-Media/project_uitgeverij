<div class="section__block">
    <div class="field">
        <label class="field__label">{{__('Afwijkend factuuradres')}}</label>
        <div class="radio__group">
            <input type="radio" wire:model="alt_invoice" name="alt_invoice" value="1" id="alt_invoice_true" @if($advertiser->blacklisted_at) checked @endif>
            <label class="field__label" for="alt_invoice_true" wire:click.prevent="toggleForm">{{__('Ja')}}</label>
    
            <input type="radio" wire:model="alt_invoice" name="alt_invoice" value="0" id="alt_invoice_false" @if($advertiser->blacklisted_at) checked @endif>
            <label class="field__label" for="alt_invoice_false" wire:click.prevent="toggleForm">{{__('Nee')}}</label>                            
        </div>
    </div>     
    @if ($showForm)
        <form wire:submit.prevent="submitForm">
            <x-form.input model="alt_name" type="text" name="alt_name" :value="$advertiser->alt_name" label="Bedrijfsnaam" />
            <x-form.input model="alt_po_box" type="text" name="alt_po_box" :value="$advertiser->alt_po_box" label="Postadres" />
            <x-form.input model="alt_postal_code" type="text" name="alt_postal_code" :value="$advertiser->alt_postal_code" label="Postcode" />
            <x-form.input model="alt_city" type="text" name="alt_city" :value="$advertiser->alt_city" label="Woonplaats" />
            <x-form.input model="alt_province" type="text" name="alt_province" :value="$advertiser->alt_province" label="Provincie" />
            <x-form.input model="alt_email" type="email" name="alt_email" :value="$advertiser->alt_email" label="E-mailadres" />
            <button>{{__('Opslaan')}}</button>
        </form>
    @endif
</div>