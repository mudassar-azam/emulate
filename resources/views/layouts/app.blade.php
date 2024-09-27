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

    <link rel="stylesheet" href="{{asset('assets/css/orderDetail.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>


</head>

<body>
@include('partial.header')

@yield('content')

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
                ticks: { beginAtZero: true }
            }
        }
    });
</script>

<div class="overlay" id="overlay"></div>

<script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
