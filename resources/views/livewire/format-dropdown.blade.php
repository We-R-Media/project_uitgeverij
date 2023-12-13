<div class="fields base">
    <div class="field field-alt">
        <label for="project">{{__('Project')}}</label>
        <div class="dropdown">
            <select name="project_id" wire:model.change="selectedValue" id="">
                @foreach ($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($currentProject && !$currentProject->formats->isEmpty())
    <div class="field field-alt">
        <label for="format">{{__('Formaat')}}</label>
        <div class="dropdown">
            <select wire:model.change="selectedFormat" name="format_id" id="">
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



    @if ($currentFormat)
        <div class="field field-alt">
            <label for="price">{{__('Basisbedrag')}}</label>
            <input name="base_price" type="text" value={{@money($currentFormat->price)}} readonly>
        </div>
    @endif
</div>

