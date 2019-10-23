@extends('layouts.nav_bar')
@section('title' , 'Home')
@section('style')
    <link rel="stylesheet" href="{{asset('/css/home.css')}}">
@endsection
@section('body')   
    <div class="options">
        <div class="option" id="option_1" onmouseover="hover('option_1')" onmouseout="out('option_1')" onclick=go_to("{{url('/my_system')}}")>
            Your System
        </div>
        <div class="option" id="option_2" onmouseover="hover('option_2')" onmouseout="out('option_2')" onclick=go_to("{{url('/sales')}}")>
            Sales
        </div>
        <br>
        <div class="option" id="option_3" onmouseover="hover('option_3')" onmouseout="out('option_3')" onclick=go_to("{{url('/edit_system')}}")>
            Edit Your System
        </div>
        <div class="option" id="option_4" onmouseover="hover('option_4')" onmouseout="out('option_4')" onclick=go_to("{{url('/create_system')}}")>
            Create System
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/home.js')}}"></script>
@endsection
