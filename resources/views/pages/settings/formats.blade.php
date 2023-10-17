@extends('layouts.app')


@section('content')
    <form class="formContainer-formats" action="{{route('formats.create')}}" method="post">
        @csrf
        <div class="formBlock-formats">
            <input type="text" class="@error('format_name') is-invalid @enderror" value="{{ old('format_name') }}" name="format_name" placeholder="Vul formaatnaam in..." id="">
            @if($errors->has('format_name'))
                <p class="error-message">{{$errors->first('format_name')}}</p>
            @endif

            <input type="text" class="@error('format_size') is-invalid @enderror" value="{{ old('format_size') }}" name="format_size" placeholder="Vul formaatgrootte in..." id="">
            @if($errors->has('format_size'))
                <p class="error-message">{{$errors->first('format_size')}}</p>
            @endif

            <input type="text" class="@error('format_measurement') is-invalid @enderror" value="{{ old('format_measurement') }}" name="format_measurement" placeholder="Vul afmeting in..." id="">
            @if($errors->has('format_measurement'))
                <p class="error-message">{{$errors->first('format_measurement')}}</p>
            @endif

            <input type="text" class="@error('format_price') is-invalid @enderror" value="{{ old('format_price') }}" name="format_price" placeholder="Vul prijs in..." id="">
            @if($errors->has('format_price'))
                <p class="error-message">{{$errors->first('format_price')}}</p>
            @endif            
            <button type="submit">Toevoegen</button>
        </div>
    </form>
@endsection