@extends('layouts.app')
@section('content')
<main class="main">
    <div id="alert-success" class="alert alert-success" style="display: none;"></div>
    <style>
    .back-btn {
        cursor: pointer;
    }

    .heart-icon {
        border-radius: 50%;
        padding: 5px;
    }
    </style>

    <div class="back-btn" onclick="goBack()">
        <i class="fa-solid fa-arrow-left"></i>
    </div>
    <div class="single-product-container">
        <div class="single-product-wrapper">
            <div class="product-images">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            @foreach($item->itemImages as $image)
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
                    @if($item->user->settings && $item->user->settings->profile)
                    <img src="{{ asset('sellers-profiles/' . $item->user->settings->profile) }}" alt="Profile Image"
                        class="profile-img">
                    @else
                    <img src="{{asset('default.jfif')}}" class="profile-img">
                    @endif
                    <span class="seller-name">{{$item->user->name}}</span>
                </div>
                <div class="d-flex justify-between align-center">
                    <h2>{{$item->name}}</h2>
                    @php
                    use Illuminate\Support\Facades\Auth;
                    use App\Models\Buyer\Wishlist;

                    $user = Auth::user();
                    $isInWishlist = false;

                    if ($user) {
                    $isInWishlist = Wishlist::where('user_id', $user->id)->where('name', $item->name)->exists();
                    }
                    @endphp
                    @auth
                    @if ($isInWishlist)
                    <button type="button" class="cart-btn">
                        <i class="fa-solid fa-heart heart-icon" style="color:black;"></i>
                    </button>
                    @else
                    <form id="addToWishlist" action="{{ route('add.wishlist') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <button type="submit" class="cart-btn">
                            <i class="fa-regular fa-heart" style="color:black;"></i>
                        </button>
                    </form>
                    @endif
                    @endauth
                </div>

                <div>
                    <div>Size: <span>{{$item->size}}</span></div>
                </div>

                <div class="product-pricing">
                    @if($item->item_type == 'for_rent')
                    <p><strong>Rent Price Per Day : {{$item->rental_price}}$</strong></p>
                    @else
                    <p class="retail">Sale Price : {{$item->sale_price}}$</p>
                    @endif
                </div>
                @auth
                <div class="product-actions">
                    @if($item->item_type == 'for_rent')
                    @if($item->available_to_rent == 1)
                    <button class="rent-btn" onclick="openPopup('rent')">Rent</button>
                    @else
                    <button class="rent-btn">Not Available For Rent</button>
                    @endif
                    @else
                    @if($item->available_to_buy == 1)
                    <button class="buy-now-btn" onclick="openPopup('buy')">Buy Now</button>
                    @else
                    <button class="buy-now-btn">Not Available To Buy</button>
                    @endif
                    @endif
                    @if($item->available_to_rent == 1 && $item->available_to_buy == 1)
                    <form action="{{route('cart.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="ptoduct_id" value="{{$item->id}}">
                        <button id="add-to-cart" data-product-id="{{ $item->id }}" style="width: 100%;"
                            class="rent-btn">Add To Cart</button>
                    </form>
                    @endif
                </div>
                @else
                <button class="buy-now-btn" onclick="openPopup('signin')">Login ! To Rent Or Buy Item</button>
                @endauth
            </div>
        </div>
        <style>
        .lSSlideOuter .lSPager.lSGallery img {
            height: 5em !important;
        }
        </style>
        <div class="product-section2">
            @foreach($item->itemImages as $image)
            <div class="box"><img src="{{ asset('item-images/' . $image->image_name) }}"
                    style="width: 100%;height: 100%;"></div>
            @endforeach
        </div>
        <div class="product-right-details special-bottom">
            <div class="product-header">
                <span class="seller-name">Information</span>
            </div>

            <div class="product-sizes">
                <div>Size: <span>{{$item->size}}</span></div>
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

<!-- Rent popup -->
<div id="rent-popup" class="popup">
    <div class="container">
        <div class="d-flex justify-between"
            style="margin-bottom:40px;border-bottom:1px solid lightgray;padding:0.8rem 1rem;">
            <h2>Rent Item</h2>
            <a href="#">Need help?</a>
        </div>
        <div class="sub-container">

            <label for="zip">Delivery ZIP Code</label>
            <input type="text" class="zip" name="zip" placeholder="Enter ZIP Code">

            <label for="lease-term">Lease Term</label>
            <div class="lease-term">
                <button class="active" data-days="1">1 Day</button>
                <button data-days="2">2 Day</button>
                <button data-days="3">3 Day</button>
                <button data-days="4">4 Day</button>
                <button data-days="5">5 Day</button>
            </div>

            <label for="date">Date</label>
            <div class="calendar-header">
                <div class="calendar-navigation">
                    <button onclick="prevMonth()"><i class="fa-solid fa-chevron-left"></i></button>
                    <span id="currentMonth">September 2024</span>
                    <button onclick="nextMonth()"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
            <!-- Day names row -->
            <div id="dayNames" class="calendar-day-names">
                <div>S</div>
                <div>M</div>
                <div>T</div>
                <div>W</div>
                <div>T</div>
                <div>F</div>
                <div>S</div>
            </div>
            <div class="calendar-grid" id="calendarGrid">
                <!-- Calendar days will be dynamically generated -->
            </div>

            <label for="size">Size</label>
            <select class="size" name="size">
                <option disabled>select size</option>
                <option value="{{$product->size}}">{{$product->size}}</option>
            </select>

            <button class="apply-btn" onclick="applyRent()">APPLY</button>
        </div>
    </div>
</div>

<!-- Buy popup -->
<div id="buy-popup" class="popup">
    <div class="container">
        <div class="d-flex justify-between"
            style="margin-bottom:40px;border-bottom:1px solid lightgray;padding:0.8rem 1rem;">
            <h2>Buy Now</h2>
            <a href="#">Need help?</a>
        </div>
        <div class="sub-container">
            <form id="buyNowForm" action="{{route('buyer.order.now')}}" method="post">
                @csrf
                <label for="zip">Delivery ZIP Code</label>
                <input type="text" id="zip" name="zip" placeholder="Enter ZIP Code">

                <label for="size">Size</label>
                <select id="size" name="size">
                    <option disabled>select size</option>
                    <option value="{{$item->size}}">{{$item->size}}</option>
                </select>

                <input type="hidden" name="product_id" value="{{$item->id}}">

                <button type="submit" class="apply-btn">Order</button>
            </form>
        </div>
    </div>
</div>



@endsection
@push('scripts')

<!-- to go back on previous page  -->
<script>
function goBack() {
    window.history.back();
}
</script>



<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
<script>
$('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 6
});
</script>

<!-- to generate calendar -->
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

function applyRent() {
    const zipCode = document.querySelector('.zip').value;
    const leaseTerm = document.querySelector('.lease-term button.active').textContent;
    const selectedButton = document.querySelector('.calendar-grid button.range');
    const size = document.querySelector('.size').value;

    if (!zipCode) {
        alert('Please enter a ZIP Code.');
        return;
    }

    if (!selectedButton) {
        alert('Please select a date.');
        return;
    }


    if (!size) {
        alert('Please select a size.');
        return;
    }

    const selectedDate = parseInt(selectedButton.textContent);
    const month = currentDate.getMonth() + 1;
    const year = currentDate.getFullYear();

    let startDate = `${selectedDate}/${month}/${year}`;
    let endDate = startDate;

    if (leaseDays > 1) {
        let endDay = selectedDate + (leaseDays - 1);

        const daysInMonth = new Date(year, currentDate.getMonth() + 1, 0).getDate();
        if (endDay > daysInMonth) {
            const nextMonth = (currentDate.getMonth() + 2) % 12 || 12;
            const nextYear = nextMonth === 1 ? year + 1 : year;
            endDay = endDay - daysInMonth;
            endDate = `${endDay}/${nextMonth}/${nextYear}`;
        } else {
            endDate = `${endDay}/${month}/${year}`;
        }
    }

    const data = {
        zip_code: zipCode,
        lease_term: leaseTerm,
        start_date: startDate,
        end_date: endDate,
        product_id: {
            {
                $item - > id
            }
        },
    };


    axios.post('/orders', data)
        .then(response => {
            toastr.success('Your order has confirmed ,Proceed to checkout', 'Success', {
                positionClass: 'toast-top-right',
                timeOut: 3000
            });
            setTimeout(function() {
                location.reload();
            }, 1000);
        })
        .catch(error => {
            console.error('There was an error!', error);
            alert('Failed to submit the order.');
        });
}

updateCalendar();
</script>

<!-- for buy now  -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var myForm = document.getElementById('buyNowForm');
    var errorAlert = document.getElementById('alert-danger');
    var errorList = document.getElementById('error-list');
    var successAlert = document.getElementById('alert-success');
    myForm.addEventListener('submit', function(event) {
        event.preventDefault();
        var formElements = myForm.querySelectorAll('input, select, textarea');
        formElements.forEach(function(element) {
            element.style.border = '';
            if (element.type === 'file') {
                element.classList.remove('file-not-valid');
            }
        });
        var formData = new FormData(myForm);
        fetch(myForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success('Thanks for placing your order. Proceed to checkout',
                        'Success', {
                            positionClass: 'toast-top-right',
                            timeOut: 3000
                        });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error('Already Sold', 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
</script>



@endpush