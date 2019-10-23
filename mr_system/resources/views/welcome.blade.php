@extends('layouts.nav_bar')
@section('title' , 'Mr System')
@section('style') 
    <link rel="stylesheet" href="{{asset('/css/welcome.css')}}">
@endsection
@section('body')
    <div class="title">Welcom To Mr System</div>
    <div class="first_section">
        
        <div class="txt">Mr system is free online system<br>
        Will help you to organize you work<br>
        will help you to store your work<br>
        will help you to calculates the sales by<br>
        daies<br>
        months<br>
        years
        </div>

    </div>
    <div class="secand_section">
        <div class="txt">if you have shop place and want a smart system<br>
        this your home from now 
        </div>
        <div class="txt">in Mr System <br>
        you can select what you want in your system<br>
        you do not need download the system you will work online<br>
        your data safety </div> 
    </div>
    <div class="first_section">
        <div class="txt">Steps To Create System</div>
        <li class="txt steps">First click on Create system button</li>
        <br><br></br>
        <a class="sp_link" href="{{url('/create_system')}}" target="blank">==> Create System</a>
        <li class="txt steps">and select what you want in your system</li>
        <li class="txt steps">then click on button create system in create page</li>
        <li class="txt steps">you will be direct to another page <br>
        in this page you will enter some data about your system like <br>
        products that you will sell it<br>
        types of products <br>
        seller names in your system</li>
        <li class="txt steps">finally click on save button</li>

        <li class="txt steps">congratulation you have a completed system</li>
        <li class="txt steps">your work from now will be in this page</li>
        <br><br><br>
        <a class="sp_link" href="{{url('/my_system')}}" target="blank">==> My System</a>
    </div> 
    
    
    
@endsection
