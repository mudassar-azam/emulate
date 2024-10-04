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
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img
                                    src="https://i.imgur.com/KZpuufK.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/GwiUmQA.jpg"> <img
                                    src="https://i.imgur.com/GwiUmQA.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/DhKkTrG.jpg"> <img
                                    src="https://i.imgur.com/DhKkTrG.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/kYWqL7k.jpg"> <img
                                    src="https://i.imgur.com/kYWqL7k.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/c9uUysL.jpg"> <img
                                    src="https://i.imgur.com/c9uUysL.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img
                                    src="https://i.imgur.com/KZpuufK.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/GwiUmQA.jpg"> <img
                                    src="https://i.imgur.com/GwiUmQA.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/DhKkTrG.jpg"> <img
                                    src="https://i.imgur.com/DhKkTrG.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/kYWqL7k.jpg"> <img
                                    src="https://i.imgur.com/kYWqL7k.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/c9uUysL.jpg"> <img
                                    src="https://i.imgur.com/c9uUysL.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img
                                    src="https://i.imgur.com/KZpuufK.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/GwiUmQA.jpg"> <img
                                    src="https://i.imgur.com/GwiUmQA.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/DhKkTrG.jpg"> <img
                                    src="https://i.imgur.com/DhKkTrG.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/kYWqL7k.jpg"> <img
                                    src="https://i.imgur.com/kYWqL7k.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/c9uUysL.jpg"> <img
                                    src="https://i.imgur.com/c9uUysL.jpg" /> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Right: Product Details -->
            <div class="product-right-details">
                <div class="product-header">
                    <img src="https://via.placeholder.com/50" alt="Seller Profile Picture" class="profile-pic">
                    <span class="seller-name">@Name</span>
                </div>
                <div class="d-flex justify-between align-center">
                    <h2>Jean Shorts With Front Pockets</h2>
                    <!-- <i class="fa fa-heart"></i> -->
                    <i class="fa-regular fa-heart"></i>
                </div>

                <p class="product-description">
                    This off-white blazer by Eudon Choi Collective features short sleeves and a fresh linen fabric,
                    giving it a
                    unique and modern twist. Pair this blazer with trousers for a chic office look.
                </p>

                <div class="product-sizes">
                    <div>Size: <span>S</span></div>
                    <div>Size: <span>S</span></div>
                    <div>Size: <span>S</span></div>
                </div>

                <div class="product-pricing">
                    <p><strong>Rent: $18</strong></p>
                    <p class="retail">Retail: $128</p>
                </div>

                <div class="product-actions">
                    <button class="buy-now-btn" onclick="openPopup('buy')">BUY NOW</button>
                    <button class="rent-btn" onclick="openPopup('rent')">RENT</button>
                </div>
            </div>
        </div>

        <div class="product-section2">
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
        </div>
        <div class="product-right-details special-bottom">
            <div class="product-header">
                <!-- <img src="https://via.placeholder.com/50" alt="Seller Profile Picture" class="profile-pic"> -->
                <span class="seller-name">Information</span>
            </div>

            <p class="product-description">
                This off-white blazer by Eudon Choi Collective features short sleeves and a fresh linen fabric, giving
                it a
                unique and modern twist. Pair this blazer with trousers for a chic office look.
            </p>

            <div class="product-sizes">
                <div>Size: <span>S</span></div>
                <div>Size: <span>S</span></div>
                <div>Size: <span>S</span></div>
            </div>
        </div>
    </div>
    <section class="trending-container" style="background:#ddd;">
        <h2 class="trending-title" style="text-align:left;padding-left:4rem;font-size:1rem;">You may also like</h2>
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
                document.querySelectorAll('.lease-term button').forEach(btn => btn.classList.remove('active'));
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