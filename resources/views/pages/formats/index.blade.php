@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="content--splitted">
            <div class="content--big">
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
                        <div class="item--action">
                            {{-- Spacer for actions --}}
                        </div>
                    </div>

                    @forelse ($formats as $format)
                        <div class="items__row row--data {{ $format->trashed() ? 'item--thrashed' : 'item--default' }}">
                            <div class="item--cell">
                                <label class="cell__label">{{__('Naam')}}</label>
                                {{$format->format_title}}
                            </div>
                            <div class="item--cell">
                                <label class="cell__label">{{__('Formaat')}}</label>
                                {{$format->size}}
                            </div>
                            <div class="item--cell">
                                <label class="cell__label">{{__('Afmetingen')}}</label>
                                {{$format->measurement}}
                            </div>
                            <div class="item--cell">
                                <label class="cell__label">{{__('Ratio')}}</label>
                                {{$format->ratio}}
                            </div>
                            <div class="item--cell">
                                <label class="cell__label">{{__('Basisprijs')}}</label>
                                {{money($format->price)}}
                            </div>
                            <div class="item--cell">
                                <label class="cell__label">{{__('BTW')}}</label>
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
                            <div class="item--actions">
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
                        <div class="items__row row--data">
                            <p>{{__('Geen formaten gevonden')}}</p>
                        </div>
                    @endforelse
                </div>
                {{ $formats->links() }}
            </div>
            <div class="content--default">
                <form action="{{ route('formats.store', $project->id) }}" method="post">
                    @csrf
                    @method('post')

                    <div class="form__wrapper">
                        <fieldset class="form__section">
                            <div class="section__block">
                                <h3 class="formats__title">{{__('Formaat creëren')}}</h3>

                                <x-form.input type="text" name="format_title" label="Titel" />
                                <x-form.input type="text" name="size" label="Grootte" />
                                <x-form.input type="text" name="measurement" label="Afmeting" />
                                <x-form.input type="text" name="ratio" label="Verhouding" />
                                <x-form.input type="text" name="price" label="Prijs" />

                                {{-- <div class="field">
                                    <label class="field__label" for="tax">{{__('BTW')}}</label>
                                    <div class="dropdown">
                                        <select name="tax">
                                            <option value="{{$project->tax->zero}}">{{$project->tax->zero}} %</option>
                                            <option value="{{$project->tax->low}}">{{$project->tax->low}} %</option>
                                            <option value="{{$project->tax->high}}" selected>{{$project->tax->high}} %</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <button type="submit" class="button button__solid--primary formats__submit">{{__('Toevoegen')}}</button>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
