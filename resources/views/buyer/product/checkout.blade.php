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

                <button class="place-order-btn">PLACE ORDER</button>

                <p class="order-terms">
                    By confirming this purchase, I understand this is final sale and accept
                    the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
                </p>
            </form>
        </div>

        <!-- Right Section: Your Rentals -->
        <div class="rentals-section">
            <h2>Your rentals</h2>
            <div class="rental-items-container">
                <div class="rental-item">
                    <div class="rental-details">
                        <img src="{{asset('default.jfif')}}" alt="Product Image">
                        <div class="rental-description">
                            <p>Item for Max Duggal</p>
                            <p>Bubble Cocktail Minidress</p>
                            <p>Size 2</p>
                        </div>
                    </div>
                    <div class="rental-action">
                        <p class="rental-price">$65.00</p>
                        <span class="remove-item">🗑️</span>
                    </div>
                </div>

                <div class="rental-item">
                    <div class="rental-details">
                        <img src="{{asset('default.jfif')}}" alt="Product Image">
                        <div class="rental-description">
                            <p>Item for Max Duggal</p>
                            <p>Bubble Cocktail Minidress</p>
                            <p>Size 0</p>
                        </div>
                    </div>
                    <div class="rental-action">
                        <p class="rental-price">FREE</p>
                        <span class="remove-item">🗑️</span>
                    </div>
                </div>
                
                <div class="rental-item">
                    <div class="rental-details">
                        <img src="{{asset('default.jfif')}}" alt="Product Image">
                        <div class="rental-description">
                            <p>Item for Max Duggal</p>
                            <p>Bubble Cocktail Minidress</p>
                            <p>Size 0</p>
                        </div>
                    </div>
                    <div class="rental-action">
                        <p class="rental-price">FREE</p>
                        <span class="remove-item">🗑️</span>
                    </div>
                </div>
            </div>

            <div class="promo-code">
                <input type="text" placeholder="Promo Code">
                <button class="apply-btn">APPLY</button>
            </div>

            <div class="pricing-summary">
                <p>Subtotal: <span>$65.00</span></p>
                <p>Rental Coverage: <span>$5.00</span></p>
                <p>Shipping: <span>$9.95</span></p>
                <p>Tax: <span>$0.88</span></p>
                <hr>
                <p class="total-price">Total: <span>$80.83</span></p>
            </div>
        </div>
    </div>

</main>
@endsection
@push('scripts')

@endpush