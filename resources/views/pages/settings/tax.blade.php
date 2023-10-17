@extends('layouts.app')

@section('content')
    <form class="formContainer-tax" action="{{route('tax.create')}}" method="post" class="formContainer-tax">
        @csrf
        @method('post')
        <div class="formBlock-tax">
            @if(isset($tax_array))
            <select title="taxcountry" class="@error('country') is-invalid @enderror" name="country" id="taxOptions" class="taxOptions">
                @foreach($tax_array as $tax)
                    <option name="countryoption" value="{{$tax}}">{{$tax}}</option>                    
                @endforeach
            </select>
            @if ($errors->has('country'))
                <p class="error-message">{{$errors->first('country')}}</p>                
            @endif
            @endif
            <input type="number" class="@error('zero') is-invalid @enderror" value="{{ old('zero') }}" name="zero" placeholder="BTW 0..." id="">
            @if($errors->has('zero'))
                <p class="error-message">{{$errors->first('zero')}}</p>
            @endif
            <input type="number" class="@error('low') is-invalid @enderror" value="{{ old('low') }}" name="low" placeholder="BTW laag..." id="">
            @if($errors->has('low'))
                <p class="error-message">{{$errors->first('low')}}</p>
            @endif
            <input type="number" class="@error('high') is-invalid @enderror" value="{{ old('high') }}" name="high" placeholder="BTW hoog..." id="">
            @if($errors->has('high'))
                <p class="error-message">{{$errors->first('high')}}</p>
            @endif
            <button type="submit">Toevoegen</button>
        </div>
    </form>
@endsection