@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<ul>
    @foreach ($orders as $order)
        <li>
            <a href="{{ route('orders.edit', $order->id) }}" class="">
                {{ $order->id }}
            </a>

        </li>
    @endforeach
</ul>

{{ $orders->links() }}

@endsection
