@extends('layouts.app')
@section('content')

    <main class="main">
        <!-- Banner Section -->
        <section class="banner">
            <div class="banner-content">
                <h1>Rent or Own Iconic outfits from your favorite celebrities</h1>
                <button class="cta-btn rounded-btn">Drip Me Out</button>
            </div>
            <div class="banner-image">
                <!-- <img src="your-image.jpg" alt="Celebrity Outfit" /> -->
            </div>
        </section>

        <!-- images Section -->
        <section class="image-section">
            <div class="container">
                <div class="image-card">
                    <img src="https://via.placeholder.com/400x300" alt="Image 1">
                    <div class="overlay2">
                        <div class="overlay-content">
                            <h2>Title 1</h2>
                            <p>Description for Image 1</p>
                        </div>
                    </div>
                </div>

                <div class="image-card">
                    <img src="https://via.placeholder.com/400x300" alt="Image 2">
                    <div class="overlay2">
                        <div class="overlay-content">
                            <h2>Title 2</h2>
                            <p>Description for Image 2</p>
                        </div>
                    </div>
                </div>

                <div class="image-card">
                    <img src="https://via.placeholder.com/400x300" alt="Image 3">
                    <div class="overlay2">
                        <div class="overlay-content">
                            <h2>Title 3</h2>
                            <p>Description for Image 3</p>
                        </div>
                    </div>
                </div>

                <div class="image-card">
                    <img src="https://via.placeholder.com/400x300" alt="Image 4">
                    <div class="overlay2">
                        <div class="overlay-content">
                            <h2>Title 4</h2>
                            <p>Description for Image 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team pepole image-box banner-->
        <section class="image-box-banner">
            <div class="image-box-container">
                <div class="image-box">
                    <img src="https://via.placeholder.com/100" alt="Person 1">
                    <p>Name 1</p>
                </div>
                <div class="image-box">
                    <img src="https://via.placeholder.com/100" alt="Person 2">
                    <p>Name 2</p>
                </div>
                <div class="image-box">
                    <img src="https://via.placeholder.com/100" alt="Person 3">
                    <p>Name 3</p>
                </div>
                <div class="image-box">
                    <img src="https://via.placeholder.com/100" alt="Person 4">
                    <p>Name 4</p>
                </div>
                <div class="image-box">
                    <img src="https://via.placeholder.com/100" alt="Person 5">
                    <p>Name 5</p>
                </div>
                <div class="image-box">
                    <img src="https://via.placeholder.com/100" alt="Person 6">
                    <p>Name 6</p>
                </div>
            </div>
        </section>

        <section class="reserve-banner-section">
            <div class="banner-container">
                <div class="reserve-content">
                    <h1>Exclusive Celebrity Apparel & Accessories At Your Fingertips</h1>
                    <p>The goal is to create a influencer-to-peer fashion marketplace called Emulate. This platform
                        bridges the gap between fans and their favorite celebrities by allowing fans to rent or buy
                        iconic clothing and items used by celebrities at significant moments in time.</p>
                    <a href="#">RESERVE NOW</a>
                </div>
            </div>
        </section>

        <section class="trending-container">
            <h2 class="trending-title">Trending Pieces</h2>
            <div class="product-slider" id="uniqueProductSlider">
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 1" class="product-image">
                    <p class="product-name">Product 1</p>
                    <p class="product-price">$50.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                    <p class="product-name">Product 2</p>
                    <p class="product-price">$65.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 3" class="product-image">
                    <p class="product-name">Product 3</p>
                    <p class="product-price">$80.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 4" class="product-image">
                    <p class="product-name">Product 4</p>
                    <p class="product-price">$45.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 3" class="product-image">
                    <p class="product-name">Product 3</p>
                    <p class="product-price">$80.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 4" class="product-image">
                    <p class="product-name">Product 4</p>
                    <p class="product-price">$45.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 3" class="product-image">
                    <p class="product-name">Product 3</p>
                    <p class="product-price">$80.00</p>
                </div>
                <div class="product-item">
                    <img src="https://via.placeholder.com/200" alt="Product 4" class="product-image">
                    <p class="product-name">Product 4</p>
                    <p class="product-price">$45.00</p>
                </div>
            </div>
            <div class="slider-controls">
                <button class="slider-btn" onclick="scrollSlider(-1)">&#10094;</button>
                <button class="slider-btn" onclick="scrollSlider(1)">&#10095;</button>
            </div>
        </section>

        <section class="faq-banner">
            <div class="faq-container">
                <h2 class="faq-title">FAQs</h2>

                <div class="faq-item" onclick="toggleFaq(this)">
                    <h4>How are items protected?</h4>
                    <p>Items are protected with insurance and safety measures during transportation.</p>
                </div>

                <div class="faq-item" onclick="toggleFaq(this)">
                    <h4>What if my rental doesn't fit?</h4>
                    <p>If your rental doesn't fit, you can request a size change or refund within 24 hours.</p>
                </div>

                <div class="faq-item" onclick="toggleFaq(this)">
                    <h4>What is the cleaning policy?</h4>
                    <p>We professionally clean every item before it's rented out to maintain high hygiene standards.</p>
                </div>

                <div class="faq-item" onclick="toggleFaq(this)">
                    <h4>How does same-day delivery work?</h4>
                    <p>Same-day delivery is available in select cities for orders placed before noon.</p>
                </div>

                <div class="faq-item" onclick="toggleFaq(this)">
                    <h4>What if I return my rental late?</h4>
                    <p>Late returns are subject to a late fee, which is outlined in your rental agreement.</p>
                </div>

            </div>
        </section>

    </main>
@endsection



