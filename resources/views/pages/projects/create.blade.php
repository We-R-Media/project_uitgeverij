@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
    <form class="formContainer" action="{{route('projects.store')}}" method="post">
        @csrf
        @method('post')

        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Algemeen') }}</h3>

                <div class="field field-alt">
                    <label for="seller">{{ __('Verkoper') }}</label>
                    <div class="dropdown">
                        <select class="select2" title="seller" name="seller" id="seller">
                            @foreach($users as $seller)
                                <option value="{{$seller->id}}"> {{$seller->first_name}} {{$seller->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="field field-alt">
                    <label for="name">{{ __('Projectcode') }}</label>
                    <input id="" type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                     @enderror
                </div>

                {{-- @if($projects->count() > 0)
                <div class="field field-alt">
                    <label>{{__('Dupliceren')}}</label>
                    <div class="dropdown">
                        <select name="existing_projects" id="" class="select2">
                            @foreach ($projects as $project )
                                <option value="{{ $project->id }}">{{ $project->name }} {{$project->edition_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('projects.duplicate', $project->id) }}" class="button button--action">{{__('Dupliceren')}}</a>
                </div>
                @endif --}}



                <div class="field field-alt">
                    <label for="format">{{ __('Formaat') }}</label>
                    <input id="format" type="text" name="paper_format">
                    @error('format')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                

                <div class="field field-alt">
                    <label for="release_name">{{ __('Naam uitgave') }}</label>
                   <input id="" type="text" name="release_name" value="{{ old('release_name') }}">
                    @error('release_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="edition_name">{{ __('Editie') }}</label>
                   <input id="" type="text" name="edition_name" value="{{ old('edition_name') }}">
                    @error('edition_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="print_edition">{{ __('Oplage') }}</label>
                   <input id="" type="text" name="print_edition" value="{{ old('print_edition') }}">
                    @error('print_edition')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

            </fieldset>

            <fieldset class="fields page-details">
                <h3>{{ __('Paginagegevens') }}</h3>
                <div class="form__row-alt">
                    <label>{{__("Aantal pagina's")}}</label>
                    <div class="field__row">
                        <div class="form__row">
                            <div class="field">
                                <label for="pages_redaction">{{ __('Redactie') }}</label>
                                <input id="pages_redaction" type="number" name="pages_redaction" value="{{ old('pages_redaction') }}">
                                @error('pages_redaction')
                                    <span class="form__message" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="pages_adverts">{{ __('Advertenties') }}</label>
                                <input id="pages_adverts" type="number" name="pages_adverts" value="{{ old('pages_adverts') }}">
                                @error('pages_adverts')
                                    <span class="form__message" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__row-alt">
                    <label>Cover</label>
                    <div class="field__row">
                        <div class="form__row">
                            <div class="field">
                                <label for="paper_type_cover">{{ __('Papier cover') }}</label>
                                <input id="" type="text" name="paper_type_cover" value="{{ old('paper_type_cover') }}">
                                @error('paper_type_cover')
                                    <span class="form__message" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="color_cover">{{ __('Kleurgebruik cover') }}</label>
                                <input id="" type="text" name="color_cover" value="{{ old('color_cover') }}">
                                @error('color_cover')
                                    <span class="form__message" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__row-alt">
                    <label>{{__('Binnenwerk')}}</label>
                    <div class="field__row">
                        <div class="form__row">
                            <div class="field">
                                <label for="paper_type_interior">{{ __('Papier binnenkant') }}</label>
                                <input id="" type="text" name="paper_type_interior" value="{{ old('paper_type_interior') }}">
                                @error('paper_type_interior')
                                    <span class="form__message" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="color_interior">{{ __('Kleurgebruik binnenkant') }}</label>
                                <input id="" type="text" name="color_interior" value="{{ old('color_interior') }}">
                                @error('color_interior')
                                    <span class="form__message" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="fields designer'">
                <h3>{{ __('Vormgeving / drukker') }}</h3>

                <div class="field field-alt">
                    <label for="designer">{{ __('Vormgever') }}</label>
                    <input id="" type="text" name="designer" value="{{ old('designer') }}">
                    @error('designer')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="printer">{{ __('Drukker') }}</label>
                    <input id="" type="text" name="printer" value="{{ old('printer') }}">
                    @error('printer')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="client">{{ __('Opdrachtgever') }}</label>
                    <input id="" type="text" name="client" value="{{ old('client') }}">
                    @error('client')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="distribution">{{ __('Verspreider') }}</label>
                    <input id="" type="text" name="distribution" value="{{ old('distribution') }}">
                    @error('distribution')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

            </fieldset>

            <fieldset class="fields financial'">
                <h3>{{ __('Financieel') }}</h3>


                <div class="field field-alt">
                    <label for="layout">{{ __('Layout') }}</label>
                    <div class="dropdown">
                        <select class="select2" title="layout" name="layout" id="layout">
                            @foreach($layouts as $layout)
                                <option value="{{$layout->id}}"> {{$layout->layout_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="field field-alt">
                    <label for="layout">{{ __('BTW') }}</label>
                    <div class="dropdown">
                        <select class="select2" title="taxes" name="taxes" id="taxes">
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

                <div class="field field-alt">
                    <label for="ledger">{{ __('Grootboek') }}</label>
                    <input id="" type="text" name="ledger" value="{{ old('ledger') }}">
                    @error('ledger')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="journal">{{ __('Dagboek') }}</label>
                    <input id="" type="text" name="journal" value="{{ old('journal') }}">
                    @error('journal')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="cost_place">{{ __('Kostenplaats') }}</label>
                    <input id="" type="text" name="cost_place" value="{{ old('cost_place') }}">
                    @error('cost_place')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="year">{{ __('Jaar') }}</label>
                    <input id="" type="text" name="year" value="{{ old('year') }}">
                    @error('year')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="revenue_goals">{{ __('Omzetdoelstelling') }}</label>
                    <input id="" type="text" name="revenue_goals" value="{{ old('revenue_goals') }}">
                    @error('revenue_goals')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

            </fieldset>

            <fieldset class="field notes full-width">
                <label for="comments">{{ __('Opmerkingen') }}</label>
                <textarea id="" cols="30" rows="10" name="comments" placeholder="Vul opmerkingen in...">{{ old('comments') }}</textarea>
                @error('comments')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
            </fieldset>
        </div>

        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">
                    {{ __('Toevoegen') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
