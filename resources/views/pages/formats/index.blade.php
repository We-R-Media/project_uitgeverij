@extends('layouts.app')

@section('seo_title', $pageTitleSection)


@section('content')

<div class="page__wrapper formats">
    <form action="{{ route('formats.store', $project->id) }}" method="post">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3 class="formats__title">{{__('Formaat creëren')}}</h3>

                <div class="field field-alt">
                    <label for="format_title">{{__('Titel')}}</label>
                    <input type="text" name="format_title" id="">
                    @error('format_title')
                        <span class="form__message" role="alert" >
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="size">{{__('Grootte')}}</label>
                    <input type="text" name="size" id="">
                    @error('size')
                        <span class="form__message" role="alert" >
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="measurement">{{__('Afmeting')}}</label>
                    <input type="text" name="measurement" id="">
                    @error('measurement')
                        <span class="form__message" role="alert" >
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="ratio">{{__('Verhouding')}}</label>
                    <input type="text" name="ratio" id="">
                    @error('ratio')
                        <span class="form__message" role="alert" >
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="price">{{__('Prijs')}}</label>
                    <input type="text" name="price" id="">
                    @error('price')
                        <span class="form__message" role="alert" >
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="tax">{{__('BTW')}}</label>
                    <div class="dropdown">
                        <select name="tax" id="">
                            <option value="">{{$project->tax->zero}} %</option>
                            <option value="">{{$project->tax->low}} %</option>
                            <option value="">{{$project->tax->high}} %</option>
                        </select>
                    </div>
                </div>

             <button type="submit" class="button button--action formats__submit">{{__('Toevoegen')}}</button>
            </fieldset>
        </div>
    </form>
    <fieldset class="fields base">
        <h3 class="formats__title">{{__('Formaat overzicht')}}</h3>
        <ul class="items__view">
           <div class="items__head">
              <div class="item item__head">
                 <div class="item__content">
                    <div>{{__('Titel')}}</div>
                 </div>
                 <div class="item__summary">
                    <div>{{__('Pagina')}}</div>
                    <div>{{__('Afmetingen')}}</div>
                    <div>{{__('Verhouding')}}</div>
                    <div>{{__('Prijs')}}</div>
                 </div>
              </div>
           </div>
           @if($formats->count() > 0)
              @foreach ($formats as $format )
              <li class="item {{ $format->trashed() ? 'item--thrashed' : 'item--default' }}">
                 <div class="item__content">
                    <div class="field">
                        {{$format->format_title}}
                    </div>
                 </div>
                 <div class="item__summary">
                    <div class="field">
                        {{$format->size}}
                    </div>
                    <div class="field">
                        {{$format->measurement}}
                    </div>
                    <div class="field">
                        {{$format->ratio}}
                    </div>
                    <div class="field">
                        {{@money($format->price)}}
                    </div>
                 </div>
                 <div class="item__actions">
                    <div class="actions__button">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                        </div>
                        <div class="actions__group">
                            @if ($format->trashed() )
                                <a href="{{ route('formats.restore', $format->id) }}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                                @endif
                            <a href="{{ route('formats.edit', $format->id) }}">{{__('Bewerken')}}</a>
                            <a href="{{ route('formats.destroy', [$format->id, $format->project_id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                        </div>
                    </div>
                </div>
              </li>
              @endforeach
           @endif
        </ul>
     </fieldset>

     {{ $formats->links() }}

</div>

@endsection