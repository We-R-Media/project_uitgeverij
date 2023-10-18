@extends('layouts.app')


@section('content')
    <form class="formContainer" action="{{route('formats.create')}}" method="post">
        @csrf
        <div class="formBlock">
            <input type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Vul formaatnaam in..." id="">
            @if($errors->has('name'))
                <p class="error-message">{{$errors->first('name')}}</p>
            @endif

            <input type="text" class="@error('size') is-invalid @enderror" value="{{ old('size') }}" name="size" placeholder="Vul formaatgrootte in..." id="">
            @if($errors->has('size'))
                <p class="error-message">{{$errors->first('size')}}</p>
            @endif

            <input type="text" class="@error('measurement') is-invalid @enderror" value="{{ old('measurement') }}" name="measurement" placeholder="Vul afmeting in..." id="">
            @if($errors->has('measurement'))
                <p class="error-message">{{$errors->first('measurement')}}</p>
            @endif

            <input type="text" class="@error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" placeholder="Vul prijs in..." id="">
            @if($errors->has('price'))
                <p class="error-message">{{$errors->first('price')}}</p>
            @endif            
            <button type="submit">Toevoegen</button>
        </div>
    </form>
@endsection