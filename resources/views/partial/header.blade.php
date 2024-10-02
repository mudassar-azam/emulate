<!-- Header Section -->
<header class="header">
    <div class="left-header">
        <div class="menu-btn">
            <svg class="hb" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" stroke="#eee" stroke-width=".6"
                 fill="rgba(0,0,0,0)" stroke-linecap="round" style="cursor: pointer">
                <path d="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7">
                    <animate dur="0.2s" attributeName="d"
                             values="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7;M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7" fill="freeze"
                             begin="start.begin"/>
                    <animate dur="0.2s" attributeName="d"
                             values="M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7;M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7" fill="freeze"
                             begin="reverse.begin"/>
                </path>
                <rect width="10" height="10" stroke="none">
                    <animate dur="2s" id="reverse" attributeName="width" begin="click"/>
                </rect>
                <rect width="10" height="10" stroke="none">
                    <animate dur="0.001s" id="start" attributeName="width" values="10;0" fill="freeze"
                             begin="click"/>
                    <animate dur="0.001s" attributeName="width" values="0;10" fill="freeze" begin="reverse.begin"/>
                </rect>
            </svg>
        </div>
        <div class="logo"><a href="/">Emulate</a></div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{route('products.index')}}">Products</a></li>
                <li><a href="#">Celebrities</a></li>
                <li><a href="#">Rental</a></li>
                <li><a href="#">Purchase</a></li>
                <li><a href="#">About Us</a></li>
                <li><i class="fa-solid fa-magnifying-glass"></i></li>
            </ul>
        </nav>
    </div>
    <div class="header-buttons">
        <button class="cart-btn"><i class="fa-regular fa-heart"></i></button>
        <button class="cart-btn" id="cartButton"><i class="fa-solid fa-bag-shopping"></i></button>

              @if(Auth::check())
                <!-- Show Logout Button if authenticated -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="sign-in-btn rounded-btn">Logout</button>
                    </form>
            @else
                <!-- Show Sign In Button if not authenticated -->
                    <button class="sign-in-btn rounded-btn" onclick="openPopup('signin')">Sign In</button>
            @endif
        <!-- <div class="profile-container-unique">
            <img src="https://via.placeholder.com/50" alt="Profile Image" class="profile-image-unique"
                onclick="toggleDropdownUnique()">
            <h4>Name</h4>
            <div class="dropdown-unique" id="dropdown-unique">
                <div class="dropdown-header-unique">
                    <img src="https://via.placeholder.com/40" alt="Profile Image">
                    <p>Name</p>
                    <p>email@gmail.com</p>
                </div>
                <a href="#">Order History</a>
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#">Sign Out</a>
            </div>
        </div> -->
    </div>
</header>

<!-- Sign In Popup -->
<div id="signin-popup" class="popup">
    <div class="popup-content">
        <div class="popup-title">
            <h3>Sign In</h3>

            <div class="signin-link">
                    <span>Don't have an account? <button onclick="closePopup('signin'); openPopup('signup');">Sign
                            Up</button></span>
            </div>
        </div>
        <div class="popup-form-container">
            <form class="popup-form"  method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">{{ __('Email Address') }}</label>
                <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                <label for="password">{{ __('Password') }}</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <button type="submit">SIGN IN</button>
            </form>
            <p class="login-statment">
                By logging in, you are agreeing to the Terms of Service and confirm that you have read the
                Privacy Policy.
            </p>

            <div class="or-divider">or</div>

            <div class="google-btn">
                <svg viewBox="0 0 48 48">
                    <title>Google Logo</title>
                    <clipPath id="g">
                        <path
                            d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                    </clipPath>
                    <g class="colors" clip-path="url(#g)">
                        <path fill="#FBBC05" d="M0 37V11l17 13z"/>
                        <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                        <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                        <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                    </g>
                </svg>
                Continue with Google
            </div>
        </div>
    </div>
</div>

<!-- Sign Up Popup -->
<div id="sellerSignup-popup" class="popup">
    <div class="popup-content">
        <div class="popup-title">
            <h3>Seller Sign Up</h3>
        </div>
        <div class="popup-form-container">
            <form class="popup-form" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="role" value="seller">
                <label for="email">{{ __('Email Address') }}</label>
                <input   type="email" id="email" class="@error('email') is-invalid @enderror" name="email"
                         value="{{ $email ?? old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password">{{ __('Password') }}</label>
                <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"
                       required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="name">Username</label>
                <input type="text" id="name" class="@error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <button type="submit">SIGN UP</button>
            </form>

            <div class="or-divider">or</div>

            <div class="google-btn">
                <svg viewBox="0 0 48 48">
                    <title>Google Logo2</title>
                    <clipPath id="g2">
                        <path
                            d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                    </clipPath>
                    <g class="colors" clip-path="url(#g2)">
                        <path fill="#FBBC05" d="M0 37V11l17 13z"/>
                        <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                        <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                        <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                    </g>
                </svg>
                Continue with Google
            </div>
        </div>
    </div>
</div>


<!-- Sign Up Popup -->
<div id="signup-popup" class="popup">
    <div class="popup-content">
        <div class="popup-title">
            <h3>Sign Up</h3>

            <div class="signin-link">
                    <span>Don't have an account? <button onclick="closePopup('signup'); openPopup('signin');">Sign
                            In</button></span>
            </div>
        </div>
        <div class="popup-form-container">
            <form class="popup-form" method="POST" action="{{ route('register') }}">
                @csrf
                <label for="email">{{ __('Email Address') }}</label>
                <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password">{{ __('Password') }}</label>
                <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"
                       required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="name">Username</label>
                <input type="text" id="name" class="@error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <button type="submit">SIGN UP</button>
            </form>

            <div class="or-divider">or</div>

            <div class="google-btn">
                <svg viewBox="0 0 48 48">
                    <title>Google Logo2</title>
                    <clipPath id="g2">
                        <path
                            d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                    </clipPath>
                    <g class="colors" clip-path="url(#g2)">
                        <path fill="#FBBC05" d="M0 37V11l17 13z"/>
                        <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                        <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                        <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                    </g>
                </svg>
                Continue with Google
            </div>
        </div>
    </div>
</div>

<!-- Sidebar for Cart -->
<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <button id="closeSidebar" class="close-btn">←</button>
        <span>Shopping Cart</span>
    </div>

    <!-- Placeholder block with specific styles -->
    <div class="cart-placeholder">
        <div class="d-flex justify-between align-center">
            <h5>3 DAY RENTAL</h5>
            <p>Thu 8/29 - Sun 8/31 in 10014</p>
        </div>
    </div>

    <!-- Cart items (use a loop to generate dynamically if required) -->
    <div class="cart-items">
        <!-- Example Product 1 -->
        <div class="cart-item">
            <img src="path/to/product-image.jpg" alt="Product Image">
            <div class="product-details">
                <h4>leena for Mac Duggal</h4>
                <div class="pricing">
                    <p>Bubble Cocktail Minidress</p>
                    <p>Retail $498.00</p>
                    <p><b>Rent for $65.00</b></p>
                </div>
                <p>Size: M</p>
            </div>
        </div>
        <hr>
        <!-- Add more products dynamically here -->
    </div>

    <!-- Subtotal and Tax -->
    <div class="cart-summary">
        <div class="subtotal">
            <p>Subtotal</p>
            <p>$100</p>
        </div>
        <hr>
        <div class="tax">
            <!-- <p>Tax</p>
            <p>$10</p> -->
            <small>Taxes, shipping, discounts etc to be entered at checkout</small>
        </div>
    </div>

    <!-- Checkout Button -->
    <button class="checkout-btn" onclick="window.location.href='{{ route('buyer.checkout') }}'">Checkout</button>

</div>

<!-- Sidebar for menu -->
<div class="menu-sidebar" id="menuSidebar">
    <div class="logo">Emulate</div>
    <nav>
        <ul class="nav-links">
            <li><a href="#">Celebrities</a></li>
            <li><a href="#">Rental</a></li>
            <li><a href="#">Purchase</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>
</div>

<!-- Rent popup -->
<div id="rent-popup" class="popup">
    <div class="container">
        <div class="d-flex justify-between"
             style="margin-bottom:40px;border-bottom:1px solid lightgray;padding:0.8rem 1rem;">
            <h2>Buy</h2>
            <a href="#">Need help?</a>
        </div>
        <div class="sub-container">

            <label for="zip">Delivery ZIP Code</label>
            <input type="text" id="zip" name="zip" placeholder="Enter ZIP Code">

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
            <select id="size" name="size">
                <option value="IT44">IT 44 / US 8</option>
                <option value="IT46">IT 46 / US 9</option>
                <option value="IT48">IT 48 / US 10</option>
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
            <h2>Buy</h2>
            <a href="#">Need help?</a>
        </div>
        <div class="sub-container">
            <label for="zip">Delivery ZIP Code</label>
            <input type="text" id="zip" name="zip" placeholder="Enter ZIP Code">

            <label for="size">Size</label>
            <select id="size" name="size">
                <option value="IT44">IT 44 / US 8</option>
                <option value="IT46">IT 46 / US 9</option>
                <option value="IT48">IT 48 / US 10</option>
            </select>

            <label for="size">Fre Backup Size</label>
            <select id="size" name="size">
                <option value="IT44">IT 44 / US 8</option>
                <option value="IT46">IT 46 / US 9</option>
                <option value="IT48">IT 48 / US 10</option>
            </select>

            <button class="apply-btn" onclick="applyRent()">APPLY</button>
        </div>
    </div>
</div>




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load the Visualization API and the corechart and bar packages.
    google.charts.load('current', {packages: ['corechart', 'bar']});

    // Draw the Donut chart (Active now)
    google.charts.setOnLoadCallback(drawDonutChart);

    function drawDonutChart() {
        var data = google.visualization.arrayToDataTable([
            ['Status', 'Count'],
            ['Active', 316],
            ['Inactive', 1000]
        ]);

        var options = {
            pieHole: 0.5,
            colors: ['#000000', '#d3d3d3'],
            legend: 'none',
            pieSliceText: 'none',
            pieStartAngle: 100,
            chartArea: {width: '100%', height: '80%'},
            backgroundColor: '#f5f5f5',
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_chart'));
        chart.draw(data, options);
    }

    // Draw the Line chart (Total Customers)
    google.charts.setOnLoadCallback(drawLineChart);

    function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Customers'],
            ['Jan', 1000],
            ['Feb', 1170],
            ['Mar', 660],
            ['Apr', 1030],
            ['May', 1230],
            ['Jun', 1460],
            ['Jul', 1690],
            ['Aug', 1860]
        ]);

        var options = {
            colors: ['#000000'],
            backgroundColor: '#f5f5f5',
            legend: 'none',
            chartArea: {width: '80%', height: '80%'},
            hAxis: {title: 'Month'},
            vAxis: {title: 'Customers'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
        chart.draw(data, options);
    }

    // Draw the Stacked Bar chart (How do you acquire users?)
    google.charts.setOnLoadCallback(drawBarChart);

    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ['Source', 'Direct', 'Referral', 'Social'],
            ['Mon', 1000, 400, 200],
            ['Tue', 1170, 460, 250],
            ['Wed', 660, 1120, 300],
            ['Thu', 1030, 540, 350],
            ['Fri', 900, 550, 400]
        ]);

        var options = {
            isStacked: true,
            backgroundColor: '#f5f5f5',
            colors: ['#000000', '#777777', '#d3d3d3'],
            legend: 'none',
            chartArea: {width: '80%', height: '80%'}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
        chart.draw(data, options);
    }
</script>
<script>

    function checkURLParams() {
        const params = new URLSearchParams(window.location.search);
        const email = params.get('email');
        const modal = params.get('modal');

        if (email && modal === 'true') {
            // Optionally set the email value in the signup form if needed
            document.getElementById('email').value = email; // Set the email input value
            openPopup('sellerSignup'); // Open the signup popup
        }
    }

    document.addEventListener('DOMContentLoaded', checkURLParams);
</script>
