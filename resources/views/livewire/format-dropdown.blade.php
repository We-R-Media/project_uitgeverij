<div class="form__section">
    <div class="field">
        <label class="field__label" for="project">{{__('Project')}}</label>
        <div class="dropdown">
            <select name="project_id" wire:model.change="selectedValue">
                @foreach ($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($currentProject && !$currentProject->formats->isEmpty())
    <div class="field">
        <label class="field__label" for="format">{{__('Formaat')}}</label>
        <div class="dropdown">
            <select wire:model.change="selectedFormat" name="format_id">
                @if ($currentProject->formats->isEmpty())
                    <option value="nvt" disabled selected>{{__('Niet beschikbaar...')}}</option>
                @else
                    @foreach ($currentProject->formats as $format)
                        <option value="{{ $format->id }}">{{ $format->size }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    @endif

    <div class="field">
        <label class="field__label" for="tax">{{__('BTW')}}</label>
        <div class="radio__group">
            <input type="radio" id="tax_true">
            <label class="field__label" for="tax_true">{{__('Ja')}}</label>
            <input type="radio" id="tax_false">
            <label class="field__label" for="tax_true">{{__('Nee')}}</label>
        </div>
    </div>



    @if ($currentFormat)
        <div class="field">
            <label class="field__label" for="price">{{__('Basisbedrag')}}</label>
            <input name="base_price" type="text" value={{@money($currentFormat->price)}} readonly>
        </div>
    @endif
</div>

