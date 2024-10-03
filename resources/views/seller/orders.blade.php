@extends('layouts.app')
@section('content')
<main class="main">
    <div class="d-flex" style="padding-top:1rem;">
        <div class="back-btn">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <h1 style="flex:1;text-align:center;">Order</h1>
    </div>
    <div class="order-page">
        <!-- Order items list -->
        <div class="order-items">
            @foreach($orders as $order)
            <div class="order-item">
                <div class="order-details">
                    @php
                    $firstImage = $order->product->itemImages->first();
                    @endphp

                    @if($firstImage)
                    <img src="{{ asset('item-images/' . $firstImage->image_name) }}">
                    @else
                    <img src="{{asset('default.jfif')}}" alt="Product Image">
                    @endif
                    <div class="order-description">
                        <p class="item-name">{{$order->product->name}}</p>
                        <p class="item-description">Size: {{$order->product->size}}</p>
                    </div>
                </div>
                <div class="order-status">
                    @if($order->type == 'rent')
                        @php
                            preg_match('/\d+/', $order->lease_term, $matches);
                            $lease_days = (int) $matches[0];
                            $calculated_price = $lease_days * $order->product->sale_price;
                        @endphp
                         <p class="price">${{ number_format($calculated_price, 2) }}</p>
                    @else
                        <p class="price">${{ $order->product->sale_price }}</p>
                    @endif
                    <select class="status-select">
                        <option>IN TRANSIT</option>
                        <option>WAIT</option>
                    </select>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</main>
@endsection
@push('scripts')

@endpush