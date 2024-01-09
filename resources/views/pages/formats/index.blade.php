@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper formats">
        <form action="{{ route('formats.store', $project->id) }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <h3 class="formats__title">{{__('Formaat creëren')}}</h3>

                    <div class="field">
                        <label class="field__label" for="format_title">{{__('Titel')}}</label>
                        <input type="text" name="format_title">
                        @error('format_title')
                            <span class="form__message" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="size">{{__('Grootte')}}</label>
                        <input type="text" name="size">
                        @error('size')
                            <span class="form__message" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="measurement">{{__('Afmeting')}}</label>
                        <input type="text" name="measurement">
                        @error('measurement')
                            <span class="form__message" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="ratio">{{__('Verhouding')}}</label>
                        <input type="text" name="ratio">
                        @error('ratio')
                            <span class="form__message" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="price">{{__('Prijs')}}</label>
                        <input type="text" name="price">
                        @error('price')
                            <span class="form__message" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="tax">{{__('BTW')}}</label>
                        <div class="dropdown">
                            <select name="tax">
                                <option value="{{$project->tax->zero}}">{{$project->tax->zero}} %</option>
                                <option value="{{$project->tax->low}}">{{$project->tax->low}} %</option>
                                <option value="{{$project->tax->high}}" selected>{{$project->tax->high}} %</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="button button--action formats__submit">{{__('Toevoegen')}}</button>
                </fieldset>
            </div>
        </form>

        <div class="items__table">
            <h3 class="formats__title">{{__('Formaat overzicht')}}</h3>

            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Titel')}}
                </div>
                <div class="item--cell">
                    {{__('Pagina')}}
                </div>
                <div class="item--cell">
                    {{__('Afmetingen')}}
                </div>
                <div class="item--cell">
                    {{__('Verhouding')}}
                </div>
                <div class="item--cell">
                    {{__('Prijs')}}
                </div>
                <div class="item--cell">
                    {{__('BTW')}}
                </div>
            </div>

            @forelse ($formats as $format)
                <div class="item__row row--data {{ $format->trashed() ? 'item--thrashed' : 'item--default' }}">
                    <div class="item--cell">
                        {{$format->format_title}}
                    </div>
                    <div class="item--cell">
                        {{$format->size}}
                    </div>
                    <div class="item--cell">
                        {{$format->measurement}}
                    </div>
                    <div class="item--cell">
                        {{$format->ratio}}
                    <div class="item--cell">
                        {{@money($format->price)}}
                    </div>
                    <div class="item--cell">
                        @if ($format->zero)
                            {{ $format->tax->zero }}%
                        @elseif ($format->low)
                            {{ $format->tax->low }}%
                        @elseif ($format->high)
                            {{ $format->tax->high }}%
                        @else
                            Unknown Tax Type
                        @endif
                    </div>
                    <div class="item__actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512">
                                    <path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" /></svg>
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
                </div>
            @empty
                <div class="item__row">
                    <p>{{__('Geen formaten gevonden')}}</p>
                </div>
            @endforelse
        </div>
        {{ $formats->links() }}
    </div>
@endsection
