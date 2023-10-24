@extends('layouts.app')

@section('content')

<form class="formContainer" action="{{ route('reminders.create') }}" method="post">
    <div class="formBlock">
        @csrf
        @method('post')
    
        <label for="">Periode tussen 1e en 2e herrinnering:</label>
        <input type="number" placeholder="Aantal dagen..." name="period_first" id="">
    
        <label for="">Periode tussen 2e en 3e herrinnering:</label>
        <input type="number" placeholder="Aantal dagen..." name="period_second" id="">

        <label for="">Periode tussen aanmaning en incasso:</label>
        <input type="number" placeholder="Aantal dagen..." name="period_third" id="">

        <label for="">Administratiekosten herrinnering:</label>
        <input type="number" placeholder="Vul kosten in..." name="administration_cost_first" id="">

        <label for="">Administratiekosten aanmaning:</label>
        <input type="number" placeholder="Vul kosten in..." name="administration_cost_second" id="">

        <select name="contact" id="">
            @foreach ($contacts as $contact)
                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
            @endforeach
        </select>
        
            

        <button type="submit">Bijwerken</button>
    </div>
</form>

@endsection