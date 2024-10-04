@extends('layouts.app')
@section('content')
<main class="main">
    <div class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
    </div>

    <div class="checkout-container">
        <!-- Left Section: Ship To -->
        <div class="ship-to-section">
            <h2>Ship to</h2>
            <form class="ship-to-form">
                <div class="form-row">
                    <input type="text" placeholder="First Name">
                    <input type="text" placeholder="Last Name">
                </div>
                <input type="text" placeholder="Address">
                <input type="text" placeholder="Apt/Unit/Suite(Optional)">
                <div class="form-row">
                    <input type="text" placeholder="City">
                    <input type="text" placeholder="State">
                </div>
                <div class="form-row">
                    <input type="text" placeholder="ZIP Code">
                    <input type="text" placeholder="Mobile Number">
                </div>

                <h2>Payment</h2>
                <input type="text" placeholder="Credit card number">
                <div class="form-row">
                    <input type="text" placeholder="Exp. (MM/YY)">
                    <input type="text" placeholder="Security code">
                </div>

                @if($orders->count() > 0)
                    <button class="place-order-btn">PLACE ORDER</button>
                @endif

                <p class="order-terms">
                    By confirming this purchase, I understand this is final sale and accept
                    the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
                </p>
            </form>
        </div>

        @php
            $total = 0; 
        @endphp

        <!-- Right Section: Your Rentals -->
        <div class="rentals-section">
            <h2>Your Items</h2>
            <div class="rental-items-container">
                @foreach($orders as $order)
                    <div class="rental-item">
                        <div class="rental-details">
                            @php
                                $firstImage = $order->product->itemImages->first();
                            @endphp

                            @if($firstImage)
                            <img src="{{ asset('item-images/' . $firstImage->image_name) }}">
                            @else
                            <img src="{{asset('default.jfif')}}" alt="Product Image">
                            @endif

                            <div class="rental-description">
                                <p>{{$order->product->name}}</p>
                                <p>{{$order->product->size}}</p>
                            </div>
                        </div>
                        <div class="rental-action">
                            @if($order->type == 'rent')
                                @php
                                    preg_match('/\d+/', $order->lease_term, $matches);
                                    $lease_days = (int) $matches[0];
                                    $calculated_price = $lease_days * $order->product->sale_price;
                                    $total += $calculated_price;
                                @endphp
                                    <p class="rental-price">${{ number_format($calculated_price, 2) }}</p>
                            @else
                                    @php
                                        $total += $order->product->sale_price;
                                    @endphp
                                    <p class="rental-price">${{ $order->product->sale_price }}</p>
                            @endif


                            <span data-id="{{ $order->id }}"  class="remove-item delete-order">🗑️</span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($orders->count() > 0)
                <div class="promo-code">
                    <input type="text" placeholder="Promo Code">
                    <button class="apply-btn">APPLY</button>
                </div>
            @endif

            <div class="pricing-summary">
                <p>Subtotal: <span>${{$total}}</span></p>
                <p>Shipping: <span>$0</span></p>
                <p>Tax: <span>$0</span></p>
                <hr>
                <p class="total-price">Total: <span>${{$total}}</span></p>
            </div>
        </div>
    </div>

</main>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.delete-order').click(function() {
            var orderId = $(this).data('id');
            if (confirm('Are you sure you want to delete this order?')) {
                $.ajax({
                    url: '/destroyOrder/' + orderId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Order deleted successfully');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endpush