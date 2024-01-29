<div>
    <div class="section__block">
        @if(!$order->notification_sent_at && !$order->seller_approved_at)
            <div class="button__box buttons--right">
                <a class="button button__solid--primary" wire:click.prevent="displayProjects">{{__('Editie toevoegen')}}</a>
            </div>

            @if ($projectVisible)
                <div class="form__popup {{ $projectVisible ? 'popup--open' : '' }}">
                    <div class="popup__inner">
                        <span class="popup__close" wire:click.prevent="displayProjects"></span>

                        <h3 class="field__label" for="project">{{__('Regel toevoegen')}}</h3>

                        <div class="field">
                            <label class="field__label" for="format">{{__('Project')}}</label>
                            <div class="dropdown">
                                <select wire:model="selectedProjectId" name="project_id" wire:change="updateSelectedProjectId">
                                    @foreach ($projectCollection as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }} {{ $project->edition_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if ($currentProject ?? false)
                            <div class="field">
                                <label class="field__label" for="format">{{__('Formaat')}}</label>
                                <div class="dropdown">
                                    <select wire:model="selectedFormatId" name="format_id" wire:change="updateSelectedFormatId">
                                        @foreach ($currentProject->formats as $format)
                                            <option value="{{ $format->id }}">{{ $format->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if($formatPrice)
                                <div class="field">
                                    <label class="field__label" for="base_price">{{__('Basisbedrag')}}</label>
                                    <input type="text" value="{{ money($formatPrice, 'EUR') }}" name="base_price" readonly>
                                </div>
                            @endif
                            <div class="field">
                                <label class="field__label" for="discount">{{__('Korting')}}</label>
                                <input type="text" wire:model.live.debounce.500ms="discount" name="discount">
                            </div>
                            <div class="field">
                                <label class="field__label" for="price_with_discount">{{__('Bedrag met korting')}}</label>
                                <input type="text" value="{{ money($price_with_discount, 'EUR') }}" name="price_with_discount" readonly>
                            </div>
                            <div class="field">
                                <button type="submit" name="submitType" value="orderlines" class="button button__solid--primary">{{ __('Toevoegen') }}</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>
</fieldset>
