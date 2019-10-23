@extends('layouts.nav_bar')
@section('title' , 'Sales')
@section('style')
    <link rel="stylesheet" href="{{asset('/css/sales.css')}}">
@endsection
@section('body')
    <div class="options">
        <div class="option" id="option_1" onmouseover="hover('option_1')" onmouseout="out('option_1')">Sales For Today </div>
        <div class="option" id="option_2" onmouseover="hover('option_2')" onmouseout="out('option_2')" onclick="show_option('day')">Sales For Last Days</div>
        <div class="option" id="option_3" onmouseover="hover('option_3')" onmouseout="out('option_3')">Sales For This Month</div>
        <div class="option" id="option_4" onmouseover="hover('option_4')" onmouseout="out('option_4')" onclick="show_option('month')">Sales For Last Months</div>
        <div class="option" id="option_5" onmouseover="hover('option_5')" onmouseout="out('option_5')">Sales For This Year</div>
        <div class="option" id="option_6" onmouseover="hover('option_6')" onmouseout="out('option_6')" onclick="show_option('year')">Sales For last Years</div>
    </div>
    <div id="sub-options">
    </div>
    <div id="result">
        Result
    </div>
   
        <?php 
            if(isset($seller_names) == true)
            {
                echo '<div class="sp_sales">';
                echo '<div class="sub_title">Get Sales for sellers</div>';
                echo '<select class="seller_names" id="seller_name">';
                echo $seller_names;
                echo '</select><br>';
                echo '<input type="button" class="btn" id="sales_for_sellers" value="Get Sales">';
                echo '</div>';
            }
        ?>
    
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/home.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/sales_1.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/sales_2.js')}}"></script>
@endsection