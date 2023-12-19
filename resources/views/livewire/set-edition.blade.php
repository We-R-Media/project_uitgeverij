<fieldset class="fields base" form="edition__form">
    @csrf
    @method('post')
    <a class="edition__button" wire:click="displayProjects">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="#F7A637" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
    </a>

    <div class="field field-alt">
        @if ($projectVisible)
        <div class="dropdown">
            <select wire:model="selectedProjectId" class="select2" name="project_id"
                wire:change="updateSelectedProjectId">
                @foreach ($projectCollection as $project)
                <option value="{{ $project->id }}">{{ $project->name }} {{ $project->edition_name }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>

    @if ($currentProject ?? false)
    <div class="field field-alt">
        <label for="format">{{__('Formaat')}}</label>
        <div class="dropdown">
            <select wire:model="selectedFormatId" name="format_id" form="edition__form" class="select2"
                wire:change="updateSelectedFormatId">
                @foreach ($currentProject->formats as $format)
                <option value="{{ $format->id }}">{{ $format->size }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="field field-alt">
        <label for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" value="{{ @money($formatPrice, 'EUR') }}" name="base_price" id="" readonly>
    </div>

    <div class="field field-alt">
        <label for="discount">{{__('Korting')}}</label>
        <input type="text" wire:model.live="discount" name="discount" id="">
    </div>

    <div class="field field-alt">
        <label for="price_with_discount">{{__('Bedrag met korting')}}</label>
        <input type="text" value="{{ @money($price_with_discount, 'EUR') }}" name="price_with_discount"
            id="" readonly>
    </div>

    @else
    {{-- <p>{{ __('Geen formaten gevonden.') }}</p> --}}
    @endif
    <button class="button button--action" type="submit" form="edition__form">{{ __('Toevoegen') }}</button>
</fieldset>