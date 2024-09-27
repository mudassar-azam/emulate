@extends('layouts.app')
@section('content')

<main class="main">
    <div class="d-flex" style="padding-top:1rem;">
        <div class="back-btn">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <h1 style="flex:1;text-align:center;">Dashboard</h1>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;gap:20px">
        <!-- Donut Chart -->
        <div id="donut_chart" style="width: 400px; height: 300px;"></div>

        <!-- Line Chart -->
        <div id="line_chart" style="width: 500px; height: 300px;"></div>

        <!-- Bar Chart -->
        <div id="bar_chart" style="width: 500px; height: 300px;"></div>

        <!-- Radar Chart - You will need to integrate another library like Chart.js or D3.js for this -->
        <div>
            <canvas id="radar_chart" style="width: 500px; height: 300px;"></canvas>
        </div>
    </div>


</main>
 @endsection



