@extends('layouts.app')

<<<<<<< HEAD
@section('title',  $pageTitle)

@livewire('page-title', [ 'pageTitle' => $pageTitleSection ])

@if( $subpages )
    @livewire('subpages', ['subpages' => $subpages])
@endif

@section('content')



=======
@section('content')

>>>>>>> 174130dae9481e3a7e6987b0600df1c4e7b0d92a
    {{-- Validatie/Erorhandling wordt gedaan in ProjectRequest.php --}}
    <div class="sub__pages">
        <a class="detailsButton" href="{{ route('projects.details') }}">{{ __('Overzicht') }}</a>
    </div>
    <div class="form__box">
    <form class="formContainer" action="{{route('projects.create')}}" method="post">
        @csrf
        @method('post')
<<<<<<< HEAD

        <div class="formBlock">
            <input type="text" class="@error('format') is-invalid @enderror" value="{{ old('format') }}" name="format" placeholder="Vul formaat in..." id="">
            @if($errors->has('format'))
                <p class="error-message">{{$errors->first('format')}}</p>
            @endif
=======
>>>>>>> 174130dae9481e3a7e6987b0600df1c4e7b0d92a

        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Algemeen') }}</h3>
                <div class="field field-alt">
                    <label for="project_code">{{ __('Projectcode') }}</label>
                    <input id="" type="text" name="project_code" value="{{ old('project_code') }}">
                    @error('project_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                     @enderror
                </div>

<<<<<<< HEAD
            <select title="taxes" name="taxes" id="taxes">
                @if($taxes->isEmpty())
                    <option value="nvt" disabled selected>Niet beschikbaar...</option>
                @else
                @foreach($taxes as $tax)
                    <option value="{{$tax->id}}">{{$tax->country}}</option>
                @endforeach
                @endif
            </select>

            <input type="text" class="@error('designer') is-invalid @enderror" value="{{ old('designer') }}" name="designer" placeholder="Vul vormgever in..." id="">
            @if($errors->has('designer'))
                <p class="error-message">{{$errors->first('designer')}}</p>
            @endif
=======
                <div class="field field-alt">
                    <label for="format">{{ __('Formaat') }}</label>
                   <input id="" type="text" name="format" value="{{ old('format') }}">
                    @error('format')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
>>>>>>> 174130dae9481e3a7e6987b0600df1c4e7b0d92a

                <div class="field field-alt">
                    <label for="release_name">{{ __('Uitgave') }}</label>
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
                    <label>Aantal pagina's</label>
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

<<<<<<< HEAD
            <input type="text" class="@error('release_name') is-invalid @enderror" value="{{ old('release_name') }}" name="release_name" placeholder="Vul naam uitgave in..." id="">
            @if($errors->has('release_name'))
                <p class="error-message">{{$errors->first('release_name')}}</p>
            @endif

            <input type="text" class="@error('edition_name') is-invalid @enderror" value="{{ old('edition_name') }}" name="edition_name" placeholder="Vul editie in..." id="">
            @if($errors->has('edition_name'))
                <p class="error-message">{{$errors->first('edition_name')}}</p>
            @endif

            <input type="text" class="@error('print_edition') is-invalid @enderror" value="{{ old('print_edition') }}" name="print_edition" placeholder="Vul oplage in..." id="">
            @if($errors->has('print_edition'))
                <p class="error-message">{{$errors->first('print_edition')}}</p>
            @endif

            <input type="text" class="@error('paper_type_cover') is-invalid @enderror" value="{{ old('paper_type_cover') }}" name="paper_type_cover" placeholder="Vul papier type cover in..." id="">
            @if($errors->has('paper_type_cover'))
                <p class="error-message">{{$errors->first('paper_type_cover')}}</p>
            @endif

            <input type="text" class="@error('paper_type_interior') is-invalid @enderror" value="{{ old('paper_type_interior') }}" name="paper_type_interior" placeholder="Vul papier type interior in..." id="">
            @if($errors->has('paper_type_interior'))
                <p class="error-message">{{$errors->first('paper_type_interior')}}</p>
            @endif

            <input type="text" class="@error('color_cover') is-invalid @enderror" value="{{ old('color_cover') }}" name="color_cover" placeholder="Vul kleur cover in..." id="">
            @if($errors->has('color_cover'))
                <p class="error-message">{{$errors->first('color_cover')}}</p>
            @endif

            <input type="text" class="@error('color_interior') is-invalid @enderror" value="{{ old('color_interior') }}" name="color_interior" placeholder="Vul kleur interieur in..." id="">
            @if($errors->has('color_interior'))
                <p class="error-message">{{$errors->first('color_interior')}}</p>
            @endif

                <input type="number"class="@error('pages_redaction') is-invalid @enderror" value="{{ old('pages_redaction') }}" name="pages_redaction" id="pages_redaction" placeholder="Pagina's redactie...">
                @if($errors->has('pages_redaction'))
                <p class="error-message">{{$errors->first('pages_redaction')}}</p>
                @endif

                <input type="number"class="@error('pages_adverts') is-invalid @enderror" value="{{ old('pages_adverts') }}" name="pages_adverts" id="pages_adverts" placeholder="Pagina's redactie...">
                @if($errors->has('pages_adverts'))
                <p class="error-message">{{$errors->first('pages_adverts')}}</p>
                @endif
=======
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
>>>>>>> 174130dae9481e3a7e6987b0600df1c4e7b0d92a
                <p name="total_pages" id="sum">Totaal aantal pagina's:</p>
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
                    <label>Binnenwerk</label>
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
                
                {{--
                    <div class="field field-alt">
                    <label for="layout">{{ __('Layout') }}</label>
                    <div class="dropdown">
                        <select title="layout" name="layout" id="layout">
                            @if($layouts->isEmpty())
                                <option value="nvt" disabled selected>{{ __('Niet beschikbaar ...') }}</option>
                            @else
                            @foreach($layouts as $layout)
                                <option value="{{$layout->id}}">{{$layout->layout_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                --}}

                <div class="field field-alt">
                    <label for="taxes">{{ __('BTW') }}</label>
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
                    <label for="department">{{ __('Kostenplaats') }}</label>
                    <input id="" type="text" name="department" value="{{ old('department') }}">
                    @error('department')
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

            <fieldset class="field notes">
                <label for="comments">{{ __('Opmerkingen') }}</label>
                <textarea id="" cols="30" rows="10" name="comments" value="{{ old('comments') }}" placeholder="Vul opmerkingen in..."></textarea>
                @error('comments')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
            </fieldset>
        </div>

<<<<<<< HEAD
        <div class="formBlock">
            <input type="number" class="@error('ledger') is-invalid @enderror" value="{{ old('ledger') }}" name="ledger" placeholder="Vul grootboek in..." id="">
            @if($errors->has('ledger'))
                <p class="error-message">{{$errors->first('ledger')}}</p>
            @endif

            <input type="number" class="@error('journal') is-invalid @enderror" value="{{ old('journal') }}" name="journal" placeholder="Vul dagboek in..." id="">
            @if($errors->has('journal'))
                <p class="error-message">{{$errors->first('journal')}}</p>
            @endif

            <input type="number" class="@error('department') is-invalid @enderror" value="{{ old('department') }}" name="department" placeholder="Vul kostenplaats in..." id="">
            @if($errors->has('department'))
                <p class="error-message">{{$errors->first('department')}}</p>
            @endif

            <input type="date" class="@error('year') is-invalid @enderror" value="{{ old('year') }}" name="year" id="">
            @if($errors->has('year'))
                <p class="error-message">{{$errors->first('department')}}</p>
            @endif

            <input type="number" class="@error('revenue_goals') is-invalid @enderror" value="{{ old('revenue_goals') }}" name="revenue_goals" placeholder="Vul omzet doelst. in..." id="">
            @if($errors->has('revenue_goals'))
                <p class="error-message">{{$errors->first('revenue_goals')}}</p>
            @endif

            <textarea class="@error('comments') is-invalid @enderror" value="{{ old('comments') }}" name="comments"  cols="30" rows="10" placeholder="Vul opmerkingen in..." id=""></textarea>
            @if($errors->has('comments'))
                <p class="error-message">{{$errors->first('comments')}}</p>
            @endif

            <button type="submit">Toevoegen</button>
=======
        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">
                    {{ __('Toevoegen') }}
                </button>
            </div>
>>>>>>> 174130dae9481e3a7e6987b0600df1c4e7b0d92a
        </div>
    </form>


@endsection
