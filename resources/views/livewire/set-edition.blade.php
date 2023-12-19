<fieldset class="edition-fields">
    <h3>{{__('Edities')}}</h3>

    <a class="button button--action" wire:click="displayProjects">
        {{__('Nieuwe regel')}}
    </a>

    <div class="edition-field">
        @if ($projectVisible)
        <label for="project">{{__('Project')}}</label>
        <div class="dropdown">
            <select wire:model="selectedProjectId" name="project_id" class="select2"
                wire:change="updateSelectedProjectId">
                @foreach ($projectCollection as $project)
                <option value="{{ $project->id }}">{{ $project->name }} {{ $project->edition_name }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>

    @if ($currentProject ?? false)
    <div class="edition-field">
        <label for="format">{{__('Formaat')}}</label>
        <div class="dropdown">
            <select wire:model="selectedFormatId" name="format_id" class="select2"
                wire:change="updateSelectedFormatId">
                @foreach ($currentProject->formats as $format)
                <option value="{{ $format->id }}">{{ $format->size }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="edition-field">
        <label for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" value="{{ @money($formatPrice, 'EUR') }}" name="base_price" id="" readonly>
    </div>

    <div class="edition-field">
        <label for="discount">{{__('Korting')}}</label>
        <input type="text" wire:model.live="discount" name="discount" id="">
    </div>

    <div class="edition-field">
        <label for="price_with_discount">{{__('Bedrag met korting')}}</label>
        <input type="text" value="{{ @money($price_with_discount, 'EUR') }}" name="price_with_discount"
            id="" readonly>
    </div>

    <div class="edition-field">
        <button class="button button--action" type="submit">{{ __('Toevoegen') }}</button>
    </div>
    @endif
</fieldset>
