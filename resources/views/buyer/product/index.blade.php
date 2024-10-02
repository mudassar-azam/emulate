@extends('layouts.app')
@section('content')
<main class="main">
    <div class="product-container">
        <!-- Sidebar for menu -->
        <div class="filter-sidebar" id="filterSidebar">
            <div class="sidebar">
                <div class="titlebar">
                    <h3>Filters</h3>
                    <span class="clear-all">Clear All</span>
                    <span class="close-btn" id="filter-close-btn">x</span>
                </div>
                <!-- Celebrity Filter -->
                <div class="filter-category">
                    <h4 class="toggle-icon">Celebrity
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        <li>
                            <label>
                                Celebrity 1
                                <input type="radio" name="celebrity" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Celebrity 2
                                <input type="radio" name="celebrity" />
                                <span></span>
                            </label>
                        </li>
                    </ul>
                </div>

                <!-- Category Filter -->
                <div class="filter-category active">
                    <h4 class="toggle-icon">Category
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        <li>
                            <label>
                                Accessories
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Activewear
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Bags & Handbags
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Blazers
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Costumes
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Dresses
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Jackets
                                <input type="radio" name="category" />
                                <span></span>
                            </label>
                        </li>
                    </ul>
                </div>

                <!-- Rent or Buy It Filter -->
                <div class="filter-category">
                    <h4 class="toggle-icon">Rent It or Buy It
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        <li>
                            <label>
                                Rent
                                <input type="radio" name="rent" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                Buy
                                <input type="radio" name="rent" />
                                <span></span>
                            </label>
                        </li>
                    </ul>
                </div>

                <!-- Price Filter -->
                <div class="filter-category">
                    <h4 class="toggle-icon">Price
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </h4>
                    <ul>
                        <li>
                            <label>
                                $0 - $50
                                <input type="radio" name="price" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                $51 - $100
                                <input type="radio" name="price" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                $101 - $200
                                <input type="radio" name="price" />
                                <span></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                $201+
                                <input type="radio" name="price" />
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
            <div class="selected-filters">
                <button class="filter-tag">Activewear <span class="remove-filter">x</span></button>
                <button class="filter-tag">Blazers <span class="remove-filter">x</span></button>
                <button class="filter-tag">Costumes <span class="remove-filter">x</span></button>
            </div>
            <div class="product-cards" id="productCards">
                <div class="product-flex" id="uniqueProductflex">
                    @foreach($products as $product)
                        <div class="product-item">
                            @php
                                $firstImage = $product->itemImages->first();
                            @endphp

                            @if($firstImage)
                                <a href="{{route('product.details' , $product->id)}}"><img style="height: 86%;width: 100%;"
                                src="{{ asset('item-images/' . $firstImage->image_name) }}" class="product-image"></a>
                            @else
                                <a href="{{route('product.details' , $product->id)}}"><img src="{{asset('default.jfif')}}" class="product-image"></a>
                            @endif
                                <a href="{{route('product.details' , $product->id)}}"><p class="product-name">{{$product->name}}</p></a>
                            @if($product->item_type == 'for_rental')
                                <a href="{{route('product.details' , $product->id)}}"><p class="product-price">{{$product->rental_price}}$</p></a>
                            @else
                               <a href="{{route('product.details' , $product->id)}}"> <p class="product-price">{{$product->sale_price}}$</p></a>
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

@endpush