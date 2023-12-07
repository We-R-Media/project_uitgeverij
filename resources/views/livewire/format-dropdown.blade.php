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

    @if ($currentProject)
        <div class="field field-alt">
            <label for="format">{{__('Formaat')}}</label>
            <div class="dropdown">
                <select wire:model.change="selectedFormat" name="format_id" id="">
                    @foreach ($currentProject->formats as $formats)
                    <option value="{{$formats->id}}">{{ $formats->size }}</option>   
                    @endforeach
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

