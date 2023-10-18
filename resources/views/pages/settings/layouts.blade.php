@extends('layouts.app')

@section('content')

<form class="formContainer" action="{{route('layouts.create')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="formBlock">
        {{-- <input type="text" name="layout_name" placeholder="Vul layout naam in..." id=""> --}}
        <input type="text" class="@error('layout_name') is-invalid @enderror" value="{{ old('layout_name') }}" name="layout_name" placeholder="Vul layout naam in..." id="">
        @if($errors->has('layout_name'))
            <p class="error-message">{{$errors->first('layout_name')}}</p>
        @endif
        <input type="text" class="@error('city_name') is-invalid @enderror" value="{{ old('city_name') }}" name="city_name" placeholder="Vul plaatsnaam naam in..." id="">
        @if($errors->has('city_name'))
            <p class="error-message">{{$errors->first('city_name')}}</p>
        @endif

        <input type="file" class="@error('logo') is-invalid @enderror" value="{{ old('logo') }}" name="logo" id="">
        @if($errors->has('logo'))
            <p class="error-message">{{$errors->first('logo')}}</p>
        @endif
        <button type="submit">Toevoegen</button>
    </div>
</form>

<div class="tableContainer">
    <table class="layoutsTable">
        @foreach($layouts as $layout)
            <tr>
                <td class="tableData">
                    {{$layout->layout_name}}
                </td>
                <td class="tableData">
                    {{$layout->city_name}}
                </td>
                <td class="tableData">
                    <img src="{{asset('images/' . $layout->logo)}}" alt="">
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection