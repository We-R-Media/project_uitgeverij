@extends('layouts.app')


@section('content')

    <form class="formContainer" action="{{route('formats.create')}}" method="post">
        @csrf
        <div class="formBlock">

            <input type="text" class="@error('size') is-invalid @enderror" value="{{ old('size') }}" name="size" placeholder="Vul formaatgrootte in..." id="">
            @if($errors->has('size'))
                <p class="error-message">{{$errors->first('size')}}</p>
            @endif

            <input type="text" class="@error('measurement') is-invalid @enderror" value="{{ old('measurement') }}" name="measurement" placeholder="Vul afmeting in..." id="">
            @if($errors->has('measurement'))
                <p class="error-message">{{$errors->first('measurement')}}</p>
            @endif

            <input type="number" class="@error('ratio') is-invalid @enderror" value="{{ old('ratio') }}" name="ratio" placeholder="Vul verhouding in..." id="">
            @if($errors->has('ratio'))
                <p class="error-message">{{$errors->first('ratio')}}</p>
            @endif

            <input type="text" class="@error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" placeholder="Vul prijs in..." id="">
            @if($errors->has('price'))
                <p class="error-message">{{$errors->first('price')}}</p>
            @endif            
            <button type="submit">Toevoegen</button>
        </div>
    </form>
@endsection