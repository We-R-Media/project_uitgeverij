@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        @cannot('isSeller')
            <div class="header__bar">
                <div class="bar__buttons">
                    <a href="{{ route('projects.duplicate', $project->id) }}" class="button button--secondary">{{__('Dupliceren')}}</a>
                </div>
            </div>
        @endcannot

        <form action="{{route('projects.update', $project->id)}}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Algemeen') }}</h3>

                        <div class="field">
                            <label class="field__label">{{ __('Verkoper') }}</label>
                            <input type="text" value="{{$project->user->first_name}} {{$project->user->last_name}}" readonly>
                        </div>
                        <div class="field">
                            <label class="field__label" for="name">{{ __('Projectcode') }}</label>
                            <input type="text" name="name" value="{{ $project->name }}" @can('isSeller') readonly @endcan>
                            @error('name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                             @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="release_name">{{ __('Naam uitgave') }}</label>
                           <input type="text" name="release_name" value="{{ $project->release_name }}" @can('isSeller') readonly @endcan>
                            @error('release_name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="edition_name">{{ __('Editie') }}</label>
                           <input type="text" name="edition_name" value="{{ $project->edition_name }}" @can('isSeller') readonly @endcan>
                            @error('edition_name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="format">{{ __('Formaat') }}</label>
                           <input type="text" name="format" value="{{ $project->paper_format }}" @can('isSeller') readonly @endcan>
                            @error('format')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="print_edition">{{ __('Oplage') }}</label>
                           <input type="text" name="print_edition" value="{{ $project->print_edition }}" @can('isSeller') readonly @endcan>
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
                                <select title="layout" name="layout" id="layout" @can('isSeller') disabled @endcan>
                                    @if(empty($layouts))
                                        <option value="" disabled selected>{{ __('Niet beschikbaar ...') }}</option>
                                    @else
                                        @foreach($layouts as $layout)
                                            <option value="{{$layout->id}}">{{$layout->layout_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label" for="tax">{{ __('BTW') }}</label>
                            <div class="dropdown">
                                <select title="taxes" name="taxes" id="taxes" @can('isSeller') disabled @endcan>
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
                            <input type="text" name="ledger" value="{{$project->ledger}}" @can('isSeller') readonly @endcan>
                            @error('ledger')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="journal">{{ __('Dagboek') }}</label>
                            <input type="text" name="journal" value="{{$project->journal}}" @can('isSeller') readonly @endcan>
                            @error('journal')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="department">{{ __('Kostenplaats') }}</label>
                            <input type="text" name="department" value="{{$project->department}}" @can('isSeller') readonly @endcan>
                            @error('department')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="year">{{ __('Jaar') }}</label>
                            <input type="text" name="year" value="{{$project->year}}" @can('isSeller') readonly @endcan>
                            @error('year')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="revenue_goals">{{ __('Omzetdoelstelling') }}</label>
                            <input type="text" name="revenue_goals" value="{{money($project->revenue_goals)}}" @can('isSeller') readonly @endcan>
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
                                    <input id="pages_redaction" type="number" name="pages_redaction" value="{{ old('pages_redaction', $project->pages_redaction) }}" @can('isSeller') readonly @endcan>
                                    @error('pages_redaction')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="pages_adverts">{{ __('Advertenties') }}</label>
                                    <input id="pages_adverts" type="number" name="pages_adverts" value="{{ old('pages_adverts', $project->pages_adverts) }}" @can('isSeller') readonly @endcan>
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
                                    <input type="text" name="paper_type_cover" value="{{ old('paper_type_cover', $project->paper_type_cover) }}" @can('isSeller') readonly @endcan>
                                    @error('paper_type_cover')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="color_cover">{{ __('Kleurgebruik cover') }}</label>
                                    <input type="text" name="color_cover" value="{{ old('color_cover', $project->color_cover) }}" @can('isSeller') readonly @endcan>
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
                                    <input type="text" name="paper_type_interior" value="{{ old('paper_type_interior', $project->paper_type_interior) }}">
                                    @error('paper_type_interior')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="color_interior">{{ __('Kleurgebruik binnenkant') }}</label>
                                    <input type="text" name="color_interior" value="{{ old('paper_type_interior', $project->color_interior) }}">
                                    @error('color_interior')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="field">
                            <label>{{__('Binnenwerk')}}</label>
                            <div class="field__row">
                                <div class="field field--column">
                                    <label class="field__label" for="paper_type_interior">{{ __('Papier binnenkant') }}</label>
                                    <input type="text" name="paper_type_interior" value="{{$project->paper_type_interior}}" @can('isSeller') readonly @endcan>
                                    @error('paper_type_interior')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field field--column">
                                    <label class="field__label" for="color_interior">{{ __('Kleurgebruik binnenkant') }}</label>
                                    <input type="text" name="color_interior" value="{{$project->color_interior}}" @can('isSeller') readonly @endcan>
                                    @error('color_interior')
                                        <span class="form__message" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="section__block">
                        <h3>{{ __('Vormgeving / drukker') }}</h3>

                        <div class="field">
                            <label class="field__label" for="designer">{{ __('Vormgever') }}</label>
                            <input type="text" name="designer" value="{{$project->designer}}" @can('isSeller') readonly @endcan>
                            @error('designer')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="printer">{{ __('Drukker') }}</label>
                            <input type="text" name="printer" value="{{$project->printer}}" @can('isSeller') readonly @endcan>
                            @error('printer')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="client">{{ __('Opdrachtgever') }}</label>
                            <input type="text" name="client" value="{{$project->client}}" @can('isSeller') readonly @endcan>
                            @error('client')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="distribution">{{ __('Verspreider') }}</label>
                            <input type="text" name="distribution" value="{{$project->distribution}}" @can('isSeller') readonly @endcan>
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

                        <div class="field">
                            <label class="field__label">{{__('Actief')}}</label>

                            <div class="radio__group">
                                <input id="deactivated_true" type="radio" name="active" value="1" @if(!$project->deactivated_at) checked @endif @can('isSeller') disabled @endcan>
                                <label class="field__label" for="deactivated_true">{{__('Ja')}}</label>

                                <input id="deactivated_false" type="radio" name="active" value="0" @if($project->deactivated_at) checked @endif @can('isSeller') disabled @endcan>
                                <label class="field__label" for="deactivated_false">{{__('Nee')}}</label>
                            </div>
                        </div>
                        <div class="field field--column">
                            <label class="field__label" for="designer">{{ __('Opmerkingen') }}</label>
                            <textarea cols="30" rows="10" name="comments" placeholder="Vul opmerkingen in..." @can('isSeller') readonly @endcan>{{ old('comments', $project->comments) }}</textarea>
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
                    @cannot('isSeller')
                        <button type="submit" class="button button--big button--primary">
                            {{ __('Opslaan') }}
                        </button>
                    @endcannot
                </div>
            </div>
        </form>
    </div>

@endsection
