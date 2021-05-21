@extends('layout')

@section('content')
<div class="col-md-12 col-lg-7 pl-lg-5 w-md-100   part  float-lg-left  ">
    <h2 class="">Password Generator</h2>
    <p class="p-3">Praesent nunc tellus, bibendum et eleifend sit amet, tristique quis augue. Mauris a iaculis lacus. Vivamus tempor
        arcu semper tempor sodales. Vivamus sem tellus, semper in tempor sed, euismod id odio. Duis nec justo
        pellentesque, ultrices lectus non, eleifend massa. Morbi vitae lobortis turpis. Aenean sit amet lacus elit.</p>
    <div class="text-center">
        <a href="/get" type="button" class="btn btn-primary text-center p-2">Stwórz mocne hasło</a>
    </div>
</div>
<div class="col-md-12 col-lg-5 w-md-100  d-inline-block float-lg-left part text-center">
    <img src="/img/lock.png" class="main-img" >
</div>
@endsection
