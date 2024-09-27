@extends('layouts.app')
@section('content')
<main class="main">
    <!-- <div class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
    </div> -->

    <div class="profile-section">
        <div class="profile-header">
            <div class="d-flex align-center">
                <img src="https://via.placeholder.com/100" alt="Profile Image" class="profile-img">
                <h1>@Name</h1>
            </div>
            <div class="d-flex" style="gap:10px;">
                <button class="subscribe-btn">ORDER</button>
                <button class="subscribe-btn">DASHBOARD</button>
                <button class="subscribe-btn" onclick="openPopup('setting')">SETTING</button>
            </div>
        </div>
        <div class="profile-info">
            <div class="profile-details" style="width:100%;">
                <div class="d-flex justify-between">
                    <p>This off-white blazer by Eudon Choi Collective features short sleeves and a fresh linen fabric,
                        giving it a unique and modern twist. Pair this blazer with trousers for a chic office look.</p>
                    <div class="subscriber-count">
                        <h2>226</h2>
                        <p>Subscribers</p>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="tabs">
            <button class="tab active">ITEMS FOR RENT OR PURCHASE</button>
            <button class="tab">POST</button>
        </div>

        <div class="tab1-content active">
            <div class="search-section">
                <input type="text" placeholder="Search">
                <div class="d-flex" style="gap:10px;">
                    <p>36 results</p>
                    <button class="add-new-item" onclick="openPopup('addnewitem')">ADD NEW ITEMS</button>
                </div>
            </div>
            <div class="product-cards-container" style="width:100%;overflow:unset;">
                <div class="product-cards" id="productCards">
                    <div class="product-flex" id="uniqueProductflex">
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 1" class="product-image">
                            <p class="product-name">Arcina Ori</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <!-- Add more product items as needed -->
                    </div>
                </div>
            </div>
        </div>
        <div class="tab2-content">
            <div class="search-section">
                <input type="text" placeholder="Search">
                <div class="d-flex" style="gap:10px;">
                    <p>36 results</p>
                    <button class="add-new-item" onclick="openPopup('addnewpost')">ADD NEW POST</button>
                </div>
            </div>
            <div class="product-cards-container" style="width:100%;overflow:unset;">
                <div class="product-cards" id="productCards">
                    <div class="product-flex" id="uniqueProductflex">
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 1" class="product-image">
                            <p class="product-name">Arcina Ori</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <div class="product-item">
                            <img src="https://via.placeholder.com/200" alt="Product 2" class="product-image">
                            <p class="product-name">Miu Miu Wander wicker</p>
                            <p class="product-price">Rent: $68</p>
                        </div>
                        <!-- Add more product items as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab1-content, .tab2-content');

    // Function to switch between tabs
    function switchTab(event) {
        // Remove active class from all tabs and hide all content
        tabButtons.forEach(button => button.classList.remove('active'));
        tabContents.forEach(content => content.style.display = 'none');
        tabContents.forEach(content => content.style.opacity = 0);

        // Add active class to the clicked tab
        event.target.classList.add('active');

        // Show the corresponding content
        if (event.target.textContent.includes('ITEMS FOR RENT OR PURCHASE')) {
            document.querySelector('.tab1-content').style.display = 'block';
            document.querySelector('.tab1-content').style.opacity = 1;
        } else if (event.target.textContent.includes('POST')) {
            document.querySelector('.tab2-content').style.display = 'block';
            document.querySelector('.tab2-content').style.opacity = 1;
        }
    }

    // Attach event listeners to all tab buttons
    tabButtons.forEach(button => button.addEventListener('click', switchTab));

    // Initialize by showing the first tab content
    tabButtons[0].classList.add('active');
    tabContents[0].style.display = 'block';
    tabContents[0].style.opacity = 1;
});
</script>
@endpush