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
                            <label class="field__label" for="edition_amount">{{ __('Oplage') }}</label>
                           <input type="text" name="edition_amount" value="{{ $project->edition_amount }}" @can('isSeller') readonly @endcan>
                            @error('edition_amount')
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
                            <label class="field__label" for="cost_place">{{ __('Kostenplaats') }}</label>
                            <input type="text" name="cost_place" value="{{$project->cost_place}}" @can('isSeller') readonly @endcan>
                            @error('cost_place')
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
                            <input type="text" name="revenue_goals" @if(!empty($project->revenue_goals))value="{{money($project->revenue_goals)}}" @endif @can('isSeller') readonly @endcan>
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

                        <div class="field row--gap">
                            <label class="field__label">{{__("Aantal pagina's")}}</label>

                            <div class="field__row">
                                <x-form.input type="text" name="pages_redaction" label="Redactie" :value="$project->pages_redaction" column="true" /> {{-- @can('isSeller') readonly @endcan --}}
                                <x-form.input type="text" name="pages_adverts" label="Advertenties" :value="$project->pages_adverts" column="true" /> {{-- @can('isSeller') readonly @endcan --}}
                            </div>
                        </div>
                        <div class="field row--gap">
                            <label class="field__label">Cover</label>

                            <div class="field__row">
                                <x-form.input type="text" name="paper_type_cover" label="Papier cover" :value="$project->paper_type_cover" column="true" /> {{-- @can('isSeller') readonly @endcan --}}
                                <x-form.input type="text" name="color_cover" label="Kleurgebruik cover" :value="$project->color_cover" column="true" /> {{-- @can('isSeller') readonly @endcan --}}
                            </div>
                        </div>
                        <div class="field row--gap">
                            <label class="field__label">{{__('Binnenwerk')}}</label>

                            <div class="field__row">
                                <x-form.input type="text" name="paper_type_interior" label="Papier binnenkant" :value="$project->paper_type_interior" column="true" /> {{-- @can('isSeller') readonly @endcan --}}
                                <x-form.input type="text" name="color_interior" label="Kleurgebruik binnenkant" :value="$project->color_interior" column="true" />
                            </div>
                        </div>
                    </div>
                    <div class="section__block">
                        <h3>{{ __('Vormgeving / drukker') }}</h3>

                        <x-form.input type="text" name="designer" label="Vormgever" :value="$project->designer" /> {{-- @can('isSeller') readonly @endcan --}}
                        <x-form.input type="text" name="printer" label="Drukker" :value="$project->printer" /> {{-- @can('isSeller') readonly @endcan --}}
                        <x-form.input type="text" name="client" label="Opdrachtgever" :value="$project->client" /> {{-- @can('isSeller') readonly @endcan --}}
                        <x-form.input type="text" name="distribution" label="Verspreider" :value="$project->distribution" /> {{-- @can('isSeller') readonly @endcan --}}
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
            @cannot('isSeller')
                <x-form.submit />
            @endcannot
        </form>
    </div>

@endsection
