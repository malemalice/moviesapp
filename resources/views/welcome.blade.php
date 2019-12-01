@extends('layouts.frontend')

{{-- Page Title --}}
@section('page-title')

{{-- Page Subtitle --}}
@section('page-subtitle', '')

{{-- Breadcrumbs --}}
@section('breadcrumbs')

@endsection

@section('content')
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0">Our Movies Collections</h1>
            <h2 class="masthead-subheading mb-0">Will Rock Your Socks Off</h2>
            <a href={{URL::to('/movies')}} class="btn btn-primary btn-xl rounded-pill mt-5">Check Out</a>
        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
</header>
@endsection

@section('footer-extras')
<style>
    .content-wrapper {
        position: relative;
        overflow: hidden;
        padding-top: calc(7rem + 72px);
        padding-bottom: 7rem;
        background: linear-gradient(0deg, #ff6a00 0, #ee0979 100%);
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: scroll;
        background-size: cover;
    }

    .content-wrapper .bg-circle {
        z-index: 0;
        position: absolute;
        border-radius: 100%;
        background: linear-gradient(0deg, #ee0979 0, #ff6a00 100%);
    }

    .content-wrapper .bg-circle-1 {
        height: 90rem;
        width: 90rem;
        bottom: -55rem;
        left: -55rem;
    }

    .content-wrapper .bg-circle-2 {
        height: 50rem;
        width: 50rem;
        top: -25rem;
        right: -25rem;
    }

    .content-wrapper .bg-circle-3 {
        height: 20rem;
        width: 20rem;
        bottom: -10rem;
        right: 5%;
    }

    .mb-0 {
        color: white;
    }

    h1 {
        font-weight: 800 !important;
        font-size: 6rem;
    }

    h2 {
        font-weight: 800 !important;
        font-size: 4rem;
    }

    .btn-primary {
        background-color: #ee0979;
        border-color: #ee0979;
    }

    .btn-xl {
        text-transform: uppercase;
        padding: 1.5rem 3rem;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: .1rem;
    }

    .rounded-pill {
        border-radius: 5rem;
    }

    .mt-5 {
        margin-top: 3rem !important;
    }
</style>
@endsection
