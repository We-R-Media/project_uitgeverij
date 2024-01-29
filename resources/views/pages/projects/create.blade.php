@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{route('projects.store')}}" method="post">
            @csrf
            @method('post')
            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Algemeen') }}</h3>
                        <div class="field">
                            <label class="field__label" for="seller">{{ __('Verkoper') }}</label>
                            <div class="dropdown">
                                <select title="seller" name="seller" id="seller">
                                    @foreach($users as $seller)
                                        <option value="{{$seller->id}}"> {{$seller->first_name}} {{$seller->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label" for="name">{{ __('Projectcode') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="format">{{ __('Formaat') }}</label>
                            <input name="paper_format" type="text" value="{{ old('paper_format') }}">
                            @error('format')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="release_name">{{ __('Naam uitgave') }}</label>
                            <input type="text" name="release_name" value="{{ old('release_name') }}">
                            @error('release_name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="edition_name">{{ __('Editie') }}</label>
                        <input type="text" name="edition_name" value="{{ old('edition_name') }}">
                            @error('edition_name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="print_edition">{{ __('Oplage') }}</label>
                        <input type="text" name="print_edition" value="{{ old('print_edition') }}">
                            @error('print_edition')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="section__block">
                        <h3>{{ __('Financieel') }}</h3>
                        <div class="field">
                            <label class="field__label" for="layout">{{ __('Layout') }}</label>
                            <div class="dropdown">
                                <select title="layout" name="layout" id="layout">
                                    @foreach($layouts as $layout)
                                        <option value="{{$layout->id}}"> {{$layout->layout_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label" for="layout">{{ __('BTW') }}</label>
                            <div class="dropdown">
                                <select title="taxes" name="taxes" id="taxes">
                                    @if($taxes->isEmpty())
                                        <option value="nvt" disabled selected>{{ __('Niet beschikbaar ...') }}</option>
                                    @else
                                        @foreach($taxes as $tax)
                                            <option value="{{$tax->id}}">{{$tax->country}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="field__label" for="ledger">{{ __('Grootboek') }}</label>
                            <input type="text" name="ledger" value="{{ old('ledger') }}">
                            @error('ledger')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="journal">{{ __('Dagboek') }}</label>
                            <input type="text" name="journal" value="{{ old('journal') }}">
                            @error('journal')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="department">{{ __('Kostenplaats') }}</label>
                            <input type="text" name="department" value="{{ old('department') }}">
                            @error('department')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="year">{{ __('Jaar') }}</label>
                            <input type="text" name="year" value="{{ old('year') }}">
                            @error('year')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="revenue_goals">{{ __('Omzetdoelstelling') }}</label>
                            <input type="text" name="revenue_goals" value="{{ old('revenue_goals') }}">
                            @error('revenue_goals')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Paginagegevens') }}</h3>

                        <div class="field">
                            <label class="field__label">{{__("Aantal pagina's")}}</label>

                            <div class="field__row">
                                <div class="field field--column">
                                    <label class="field__label" for="pages_redaction">{{ __('Redactie') }}</label>
                                    <input id="pages_redaction" type="number" name="pages_redaction" value="{{ old('pages_redaction') }}">
                                    @error('pages_redaction')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="pages_adverts">{{ __('Advertenties') }}</label>
                                    <input id="pages_adverts" type="number" name="pages_adverts" value="{{ old('pages_adverts') }}">
                                    @error('pages_adverts')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label">Cover</label>

                            <div class="field__row">
                                <div class="field field--column">
                                    <label class="field__label" for="paper_type_cover">{{ __('Papier cover') }}</label>
                                    <input type="text" name="paper_type_cover" value="{{ old('paper_type_cover') }}">
                                    @error('paper_type_cover')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="color_cover">{{ __('Kleurgebruik cover') }}</label>
                                    <input type="text" name="color_cover" value="{{ old('color_cover') }}">
                                    @error('color_cover')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label">{{__('Binnenwerk')}}</label>

                            <div class="field__row">
                                <div class="field field--column">
                                    <label class="field__label" for="paper_type_interior">{{ __('Papier binnenkant') }}</label>
                                    <input type="text" name="paper_type_interior" value="{{ old('paper_type_interior') }}">
                                    @error('paper_type_interior')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="color_interior">{{ __('Kleurgebruik binnenkant') }}</label>
                                    <input type="text" name="color_interior" value="{{ old('color_interior') }}">
                                    @error('color_interior')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section__block">
                        <h3>{{ __('Vormgeving / drukker') }}</h3>
                        <div class="field">
                            <label class="field__label" for="designer">{{ __('Vormgever') }}</label>
                            <input type="text" name="designer" value="{{ old('designer') }}">
                            @error('designer')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="printer">{{ __('Drukker') }}</label>
                            <input type="text" name="printer" value="{{ old('printer') }}">
                            @error('printer')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="client">{{ __('Opdrachtgever') }}</label>
                            <input type="text" name="client" value="{{ old('client') }}">
                            @error('client')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="distribution">{{ __('Verspreider') }}</label>
                            <input type="text" name="distribution" value="{{ old('distribution') }}">
                            @error('distribution')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Opmerkingen') }}</h3>
                        <div class="field field--column">
                            <textarea cols="30" rows="10" name="comments" placeholder="Vul opmerkingen in...">{{ old('comments') }}</textarea>
                            @error('comments')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="form__actions">
                <div class="buttons">
                    <button type="submit" class="button button--big button--primary">
                        {{ __('Toevoegen') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
