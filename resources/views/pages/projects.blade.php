@extends('layouts.app')


@section('content')

 

    {{-- Validatie/Erorhandling wordt gedaan in ProjectRequest.php --}}

    <form class="formContainer" action="{{route('projects.create')}}" method="post">
        @csrf

        <input type="text" name="project_code" placeholder="Vul projectcode in..." id="">
        <input type="text" name="format" placeholder="Vul formaat in..." id="">
        <input type="text" name="layout" placeholder="Vul layout in..." id="">
        <input type="number" name="designer" placeholder="Vul vormgever in..." id="">
        <input type="number" name="printer" placeholder="Vul drukker in..." id="">
        <input type="number" name="client" placeholder="Vul opdrachtgever in..." id="">
        <input type="number" name="distribution" placeholder="Vul verspreidbureau in..." id="">
        

        {{-- Zorgen dat database btw_country veld oppakt --}}
            <select name="btw_country" id="">
                @foreach($btw_group as $country)
                    <option value="{{$country->btw_country}}">{{$country->btw_country}}</option>
                @endforeach
            </select>
        <input type="number" name="btw_country" placeholder="Vul BTW id in..." id="">

        
        

        <input type="text" class="@error('release_name') is-invalid @enderror" value="{{ old('release_name') }}" name="release_name" placeholder="Vul in naam uitgave in..." id="">
        @if($errors->has('release_name'))
            <p class="error-message">{{$errors->first('release_name')}}</p>
        @endif 
        
        <input type="text" class="@error('edition_name') is-invalid @enderror" value="{{ old('edition_name') }}" name="edition_name" placeholder="Vul editie in..." id="">
        @if($errors->has('edition_name'))
            <p class="error-message">{{$errors->first('edition_name')}}</p>
        @endif

       

        <input type="text" name="print_edition" placeholder="Vul oplage in..." id="">


        {{-- Kijken hoe naar livewire components bijgewerkt kan worden --}}

        <div class="pageCalculate">
            <input type="number" name="pages_redaction" id="pagina_redactie" placeholder="Pagina's redactie...">
            <input type="number" name="pages_adverts" id="pagina_advertentie" placeholder="Pagina's advertentie...">
            <p id="sum">Totaal aantal pagina's:</p>
        </div>


        <input type="text" name="paper_type_cover" placeholder="Papier cover..." id="">
        <input type="text" name="paper_type_interior" placeholder="Papier binnenwerk..." id="">
        <input type="text" name="color_cover" placeholder="Kleurgebruik cover..." id="">
        <input type="text" name="color_interior" placeholder="Kleurgebruik binnenwerk..." id="">
        <input type="number" name="ledger" placeholder="Vul grootboek in..." id="">
        <input type="number" name="journal" placeholder="Vul dagboek in..." id="">
        <input type="number" name="department" placeholder="Vul afdeling in..." id="">
        <input type="date" name="year" id="">
        <input type="number" name="revenue_goals" placeholder="Vul kostenplaats in..." id="">
        <textarea name="comments" id="" placeholder="Vul opmerkingen in..." cols="30" rows="10"></textarea>
        
        <button type="submit">Toevoegen</button>

    </form>
    {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li class="text-red-500">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif --}}
@endsection