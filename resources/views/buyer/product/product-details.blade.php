@extends('layouts.app')
@section('content')
<main class="main">
    <div class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
    </div>
    <div class="single-product-container">
        <div class="single-product-wrapper">
            <div class="product-images">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            @foreach($product->itemImages as $image)
                                <li data-thumb="{{ asset('item-images/' . $image->image_name) }}">
                                    <img src="{{ asset('item-images/' . $image->image_name) }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Right: Product Details -->
            <div class="product-right-details" style="gap: 3.5em;">
                <div class="product-header">
                    @if($product->user->settings && $product->user->settings->profile)
                    <img src="{{ asset('sellers-profiles/' . $product->user->settings->profile) }}" alt="Profile Image"
                        class="profile-img">
                    @else
                    <img src="{{asset('default.jfif')}}" alt="Profile Image" class="profile-img">
                    @endif
                    <span class="seller-name">{{$product->user->name}}</span>
                </div>
                <div class="d-flex justify-between align-center">
                    <h2>{{$product->name}}</h2>
                    <i class="fa-regular fa-heart"></i>
                </div>

                <div>
                    <div>Size: <span>{{$product->size}}</span></div>
                </div>

                <div class="product-pricing">
                    @if($product->item_type == 'for_rent')
                        <p><strong>Rent Price Per Day : {{$product->rental_price}}$</strong></p>
                    @else    
                        <p class="retail">Sale Price : {{$product->sale_price}}$</p>
                    @endif    
                </div>

                <div class="product-actions">
                    @if($product->item_type == 'for_rent')
                        <button class="rent-btn" onclick="openPopup('rent')">Rent</button>
                    @else
                        <button class="buy-now-btn" onclick="openPopup('buy')">Buy Now</button>
                    @endif    
                    <button class="rent-btn">Add To Cart</button>
                </div>
            </div>
        </div>

        <div class="product-section2">
            @foreach($product->itemImages as $image)
                <div class="box"><img src="{{ asset('item-images/' . $image->image_name) }}" style="width: 100%;"></div>
            @endforeach    
        </div>
        <div class="product-right-details special-bottom">
            <div class="product-header">
                <span class="seller-name">Information</span>
            </div>

            <div class="product-sizes">
                <div>Size: <span>{{$product->size}}</span></div>
            </div>
        </div>
    </div>
    <section class="trending-container" style="background:#ddd;">
        <h2 class="trending-title" style="text-align:left;padding-left:4rem;font-size:1rem;">You may also like</h2>
        <div class="product-slider" id="uniqueProductSlider">
            @foreach($products as $product)
                <div class="product-item">
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
        <div class="slider-controls">
            <button class="slider-btn" onclick="scrollSlider(-1)">&#10094;</button>
            <button class="slider-btn" onclick="scrollSlider(1)">&#10095;</button>
        </div>
    </section>
</main>

@endsection
@push('scripts')
<script>
$('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 6
});
</script>
<script>
const months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July',
    'August', 'September', 'October', 'November', 'December'
];

let currentDate = new Date();
let leaseDays = 1;
const calendarGrid = document.getElementById('calendarGrid');
const currentMonth = document.getElementById('currentMonth');

// Generate the calendar
function generateCalendar(year, month) {
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    calendarGrid.innerHTML = '';

    // Empty days for the first row
    for (let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement('button');
        emptyCell.disabled = true;
        calendarGrid.appendChild(emptyCell);
    }

    // Days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayButton = document.createElement('button');
        dayButton.textContent = day;
        dayButton.addEventListener('click', () => selectDate(dayButton, day, daysInMonth));
        calendarGrid.appendChild(dayButton);
    }
}

// Select a date and highlight the range according to lease term
function selectDate(button, startDay, totalDays) {
    document.querySelectorAll('.calendar-grid button').forEach(btn => btn.classList.remove('range'));
    button.classList.add('range');

    for (let i = 1; i < leaseDays; i++) {
        const nextDay = startDay + i;
        const dayIndex = [...calendarGrid.children].indexOf(button);
        const nextIndex = dayIndex + i;

        if (nextDay <= totalDays && nextIndex < calendarGrid.children.length) {
            const nextButton = calendarGrid.children[nextIndex];
            if (nextButton && !nextButton.disabled) {
                nextButton.classList.add('range');
            }
        }
    }
}

// Move to the next month
function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    updateCalendar();
}

// Move to the previous month
function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
}

// Update the calendar display
function updateCalendar() {
    const month = currentDate.getMonth();
    const year = currentDate.getFullYear();
    currentMonth.textContent = `${months[month]} ${year}`;
    generateCalendar(year, month);
}

// Lease term selection
document.querySelectorAll('.lease-term button').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.lease-term button').forEach(btn => btn.classList.remove(
            'active'));
        button.classList.add('active');
        leaseDays = parseInt(button.getAttribute('data-days'));
    });
});

// Handle apply button click
function applyRent() {
    const zipCode = document.getElementById('zip').value;
    const leaseTerm = document.querySelector('.lease-term button.active').textContent;
    const selectedDate = document.querySelector('.calendar-grid button.range')?.textContent || 'No date selected';
    const size = document.getElementById('size').value;

    alert(`ZIP Code: ${zipCode}\nLease Term: ${leaseTerm}\nSelected Date: ${selectedDate}\nSize: ${size}`);
}

// Initialize the calendar
updateCalendar();
</script>
@endpush