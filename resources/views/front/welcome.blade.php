@extends('layouts.app')
@section('content')
<div class="banner px-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 mt-5">
                <h1 class="text-primary banner-heading">Manage</h1>
                <h1 class="text-danger banner-heading">Insurance Claims</h1>
                <h1 class="text-dark banner-subheading">Digitally.</h1>
            </div>
            <div class="col-sm-6 mt-5">
                <img class="img-fluid" src="{{ asset('assets/images/home1.png') }}" alt="banner">
            </div>
        </div>
    </div>
</div>
<div class="section-two py-4">
    <img
      class="section-two-bg"
      src="{{ asset('assets/images/logos/logo_sm.png') }}"
      alt=""
    >   
  </div>
@endsection