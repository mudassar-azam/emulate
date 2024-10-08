<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Emulate - Fashion Banner</title>
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/product.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/singleProduct.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}" />
    <link rel="stylesheet" href="./assets/css/myprofile.css" />

    <link rel="stylesheet" href="{{asset('assets/css/orderDetail.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'>
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</head>

<body>
    @include('partial.header')

    @yield('content')
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var ctx = document.getElementById('radar_chart').getContext('2d');
    var radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Traffic Sources',
                data: [500, 1000, 750, 600, 800, 700, 900],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: '#000000',
                pointBackgroundColor: '#000000'
            }]
        },
        options: {
            scale: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <div class="overlay" id="overlay"></div>

    <script src="{{asset('assets/js/script.js')}}"></script>



    <!-- for wishlist  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myForm = document.getElementById('addToWishlist');
            var errorAlert = document.getElementById('alert-danger');
            var errorList = document.getElementById('error-list');
            var successAlert = document.getElementById('alert-success');
            var wishlistPopupContainer = document.querySelector('#wishlist-popup .popup-form');

            // Fetch and display wishlist items when the page loads
            fetch('/wishlist-items', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        data.items.forEach(item => appendWishlistItem(item));
                    }
                })
                .catch(error => console.error('Error fetching wishlist items:', error));

            // Handle form submission (adding item)
            myForm.addEventListener('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(myForm);

                fetch(myForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            successAlert.textContent = data.message;
                            successAlert.style.display = 'block';
                            appendWishlistItem(data.item);

                            setTimeout(function() {
                                successAlert.style.display = 'none';
                            }, 2000);
                        } else {

                            toastr.error('Product already in wishlist.', 'Error', {
                                positionClass: 'toast-top-right',
                                timeOut: 3000
                            });
                        }
                    })
                    .catch(error => console.error('Error adding wishlist item:', error));
            });

            // Append new wishlist item
            function appendWishlistItem(item) {
                var newItem = document.createElement('div');
                newItem.style.display = 'flex';
                newItem.style.alignItems = 'center';
                newItem.style.justifyContent = 'center';
                newItem.style.gap = '15rem';
                newItem.style.margin = '2em 3em';

                var itemContent = `
                    <div style="display:flex;align-items: center;justify-content: center;height: 13%; gap:10px;" >
                        <div>
                            <img style="height: 60px;width: 100px;" src="/item-images/${item.image}">
                        </div>
                        <div>
                            <span>${item.name}</span>
                        </div>
                    </div>
                    <div>
                        <button class="remove-btn" data-item-id="${item.id}">Remove</button>
                    </div>
                `;
                newItem.innerHTML = itemContent;

                // Add the new item to the wishlist popup container
                wishlistPopupContainer.appendChild(newItem);

                // Attach remove functionality to the newly created remove button
                var removeButton = newItem.querySelector('.remove-btn');
                removeButton.addEventListener('click', function() {
                    removeWishlistItem(item.id, newItem);
                });
            }

            // Handle item removal
            function removeWishlistItem(itemId, itemElement) {
                fetch('/remove-wishlist-item', {
                        method: 'POST',
                        body: JSON.stringify({
                            id: itemId
                        }),
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the item from the DOM
                            itemElement.remove();
                        } else {
                            alert('Error removing item');
                        }
                    })
                    .catch(error => console.error('Error removing wishlist item:', error));
            }

            // Handle form validation errors
            function handleErrors(errors) {
                errorList.innerHTML = '';
                if (errors.length > 0) {
                    var li = document.createElement('li');
                    li.textContent = errors[0].message;
                    errorList.appendChild(li);
                    errorAlert.style.display = 'block';
                    successAlert.style.display = 'none';

                    var firstErrorField;
                    errors.forEach(function(error, index) {
                        var errorField = myForm.querySelector(`[name="${error.field}"]`);
                        if (errorField) {
                            errorField.style.border = '1px solid red';
                            if (index === 0) {
                                firstErrorField = errorField;
                            }
                        }
                    });

                    if (firstErrorField) {
                        firstErrorField.focus();
                    }

                    setTimeout(function() {
                        errorAlert.style.display = 'none';
                    }, 3000);
                }
            }
        });
    </script>

</body>

</html>