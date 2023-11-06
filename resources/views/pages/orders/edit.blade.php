@extends('layouts.app')

@section('title',  $pageTitleSection)

@section('content')


    <form  class="formContainer" action="{{route('orders.create')}}" method="post">
        <div class="formBlock">
            <h3>Bevestigingsadres</h3>

            <input type="text" class="@error ('advertiser') is-invalid @enderror" value="{{ old('advertiser') }}" name="advertiser" placeholder="Vul klantnummer in..." id="">
                @if($errors->has('advertiser'))
                    <p class="error-message">{{$errors->first('advertiser')}}</p>
                @endif
            <input type="text" class="@error ('company') is-invalid @enderror" value="{{ old('company') }}" name="company" placeholder="Vul bedrijfsnaam in..." id="">
                @if($errors->has('company'))
                    <p class="error-message">{{$errors->first('company')}}</p>
                @endif

            <input type="text" class="@error ('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact" placeholder="Vul contact in..." id="">
                @if($errors->has('contact'))
                    <p class="error-message">{{$errors->first('contact')}}</p>
                @endif

            <input type="text" class="@error ('po_box') is-invalid @enderror" value="{{ old('po_box') }}" name="po_box" placeholder="Vul postadres in..." id="">
                @if($errors->has('po_box'))
                    <p class="error-message">{{$errors->first('po_box')}}</p>
                @endif

            <input type="text" class="@error ('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" name="postal_code" placeholder="Vul postcode in..." id="">
                @if($errors->has('postal_code'))
                    <p class="error-message">{{$errors->first('postal_code')}}</p>
                @endif

            <input type="text" class="@error ('city') is-invalid @enderror" value="{{ old('city') }}" name="city" placeholder="Vul plaats in..." id="">
                @if($errors->has('city'))
                    <p class="error-message">{{$errors->first('city')}}</p>
                @endif


            <input type="text" class="@error ('province') is-invalid @enderror" value="{{ old('province') }}" name="province" placeholder="Vul provincie in..." id="">
                @if($errors->has('province'))
                    <p class="error-message">{{$errors->first('province')}}</p>
                @endif

            <input type="text" class="@error ('country') is-invalid @enderror" value="{{ old('country') }}" name="country" placeholder="Vul land in..." id="">
                @if($errors->has('country'))
                    <p class="error-message">{{$errors->first('country')}}</p>
                @endif

            <input type="email" class="@error ('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Vul email in..." id="">
                @if($errors->has('email'))
                    <p class="error-message">{{$errors->first('email')}}</p>
                @endif
        </div>
    {{--
        <div class="formBlock">
            <h3>Afwijkend factuuradres</h3>
            <input type="text" name="advertiser" placeholder="Vul klantnummer in..." id="">
            <input type="text" name="company" placeholder="Vul bedrijfsnaam in..." id="">
            <input type="text" name="contact" placeholder="Vul contact in..." id="">
            <input type="text" name="mailbox" placeholder="Vul postadres in..." id="">
            <input type="text" name="postal_code" placeholder="Vul postcode in..." id="">
            <input type="text" name="province" placeholder="Vul provincie in..." id="">
            <input type="text" name="country" placeholder="Vul land in..." id="">
            <input type="email" name="email" placeholder="Vul email in..." id="">
        </div> --}}

    </form>

    <a href="{{route('pdf.generate')}}">Genereer PDF</a>

@endsection
