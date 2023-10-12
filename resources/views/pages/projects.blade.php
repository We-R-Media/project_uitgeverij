@extends('layouts.app')


@section('content')

 

    {{-- Validatie/Erorhandling wordt gedaan in ProjectRequest.php --}}

    <form class="formContainer-projects" action="{{route('projects.create')}}" method="post">
        @csrf
        
        {{-- <div class="formBlock-projects">
            <input type="text" name="format" placeholder="Vul formaat in..." id="">
            <input type="text" name="layout" placeholder="Vul layout in..." id="">
            <input type="number" name="designer" placeholder="Vul vormgever in..." id="">
            <input type="number" name="printer" placeholder="Vul drukker in..." id="">
            <input type="number" name="client" placeholder="Vul opdrachtgever in..." id="">
            <input type="number" name="distribution" placeholder="Vul verspreidbureau in..." id="">
        </div> --}}

        <div class="formBlock-projects">
            <input type="text" class="@error('project_code') is-invalid @enderror" value="{{ old('project_code') }}" name="project_code" placeholder="Vul projectcode in..." id="">
            @if($errors->has('project_code'))
                <p class="error-message">{{$errors->first('release_name')}}</p>
            @endif

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
        </div>

        <div class="formBlock-projects">
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
                <p id="sum">Totaal aantal pagina's:</p>
        </div>

        <div class="formBlock-projects">
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
        </div>

        <div class="formBlock-projects">
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
        </div>
    </form>
@endsection