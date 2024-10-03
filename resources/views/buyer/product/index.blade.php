@extends('layouts.app')
@section('content')
<main class="main">
    <div class="product-container">
        <!-- Sidebar for menu -->
        <div class="filter-sidebar" id="filterSidebar">
            <div class="sidebar">
                <div class="titlebar">
                    <h3>Filters</h3>
                    <span class="clear-all" id="clear-all">Clear All</span>
                    <span class="close-btn" id="filter-close-btn">x</span>
                </div>

                <div class="filter-category">
                    <h4 class="toggle-icon">Category
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;"> {{$category->name}}</h5>
                                <input type="checkbox" class="filter-input category" data-filter-name="Category"
                                    data-filter-value="{{$category->id}}" />
                                <span></span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-category">
                    <h4 class="toggle-icon">Seller
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        @foreach($sellers as $seller)
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;">{{$seller->name}}</h5>
                                <input type="checkbox" class="filter-input seller" data-filter-name="Seller"
                                    data-filter-value="{{$seller->id}}" />
                                <span></span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-category">
                    <h4 class="toggle-icon">Item Type
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;">For Rent</h5>
                                <input type="checkbox" class="filter-input item-type" data-filter-name="Item Type"
                                    data-filter-value="for_rent" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;">For Sale</h5>
                                <input type="checkbox" class="filter-input item-type" data-filter-name="Item Type"
                                    data-filter-value="for_sale" />
                                <span></span>
                            </label>
                        </li>
                    </ul>
                </div>

                <div class="filter-category">
                    <h4 class="toggle-icon">Price
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        <li>
                            <label>
                            <h5 style="flex: 1; margin-left: 0.2em;">$0 - $50</h5>
                                <input type="checkbox" class="filter-input price" data-filter-name="Price"
                                    data-filter-value="0-50" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;">$51 - $100</h5>
                                <input type="checkbox" class="filter-input price" data-filter-name="Price"
                                    data-filter-value="51-100" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;">$101 - $200</h5>
                                <input type="checkbox" class="filter-input price" data-filter-name="Price"
                                    data-filter-value="101-200" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <h5 style="flex: 1; margin-left: 0.2em;">$201+</h5>
                                <input type="checkbox" class="filter-input price" data-filter-name="Price"
                                    data-filter-value="201+" />
                                <span></span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-cards-container" id="productCards">
            <div class="filter-bar">
                <button class="open-filterbar"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
                <div class="search-input">
                    <input type="text" id="customSearchInput" class="search-bar" placeholder="Search..">


                </div>
                <div class="result-count">
                    162 results
                </div>

            </div>
            <div class="selected-filters" id="selectedFilters"></div>
            <div class="product-cards" id="productCards">
                <div class="product-flex" id="uniqueProductflex">
                    @foreach($products as $product)
                    <div class="product-item" data-category-id="{{$product->category_id}}" data-seller-id="{{$product->user_id}}" data-item-type="{{$product->item_type}}" data-sale-price="{{$product->sale_price}}" data-rental-price="{{$product->rental_price}}" style="width: 18em;height: 15em;">
                        @php
                        $firstImage = $product->itemImages->first();
                        @endphp

                        @if($firstImage)
                        <a href="{{route('product.details' , $product->id)}}"><img style="height: 86%;width: 100%;"
                                src="{{ asset('item-images/' . $firstImage->image_name) }}" class="product-image"></a>
                        @else
                        <a href="{{route('product.details' , $product->id)}}"><img src="{{asset('default.jfif')}}"
                                class="product-image"></a>
                        @endif
                        <a href="{{route('product.details' , $product->id)}}">
                            <p class="product-name">{{$product->name}}</p>
                        </a>
                        @if($product->item_type == 'for_rental')
                        <a href="{{route('product.details' , $product->id)}}">
                            <p class="product-price">{{$product->rental_price}}$</p>
                        </a>
                        @else
                        <a href="{{route('product.details' , $product->id)}}">
                            <p class="product-price">{{$product->sale_price}}$</p>
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</main>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterInputs = document.querySelectorAll('.filter-input');
        const products = document.querySelectorAll('.product-item');

        filterInputs.forEach(input => {
            input.addEventListener('change', () => {
                filterProducts();
            });
        });

        function filterProducts() {
            const selectedCategories = Array.from(document.querySelectorAll('.filter-input.category:checked')).map(input => input.getAttribute('data-filter-value'));
            const selectedSellers = Array.from(document.querySelectorAll('.filter-input.seller:checked')).map(input => input.getAttribute('data-filter-value'));
            const selectedItemTypes = Array.from(document.querySelectorAll('.filter-input.item-type:checked')).map(input => input.getAttribute('data-filter-value'));
            const selectedPriceRanges = Array.from(document.querySelectorAll('.filter-input.price:checked')).map(input => input.getAttribute('data-filter-value'));

            products.forEach(product => {
                const categoryId = product.getAttribute('data-category-id');
                const sellerId = product.getAttribute('data-seller-id');
                const itemType = product.getAttribute('data-item-type');
                const salePrice = parseFloat(product.getAttribute('data-sale-price'));
                const rentalPrice = parseFloat(product.getAttribute('data-rental-price'));

                const priceCondition = selectedPriceRanges.length ? checkPrice(salePrice, rentalPrice, selectedPriceRanges) : true;

                const isVisible = (
                    (selectedCategories.length === 0 || selectedCategories.includes(categoryId)) &&
                    (selectedSellers.length === 0 || selectedSellers.includes(sellerId)) &&
                    (selectedItemTypes.length === 0 || selectedItemTypes.includes(itemType)) &&
                    priceCondition
                );

                product.style.display = isVisible ? 'block' : 'none';
            });
        }

        function checkPrice(salePrice, rentalPrice, selectedPriceRanges) {
            for (const range of selectedPriceRanges) {
                const [min, max] = range.split('-').map(value => value.includes('+') ? Number(value.replace('+', '')) : parseFloat(value));
                const price = salePrice || rentalPrice;

                if (min <= price && (max === undefined || price <= max)) {
                    return true;
                }
            }
            return false;
        }
    });
</script>
@endpush