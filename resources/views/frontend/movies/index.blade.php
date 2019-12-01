@extends('layouts.frontend')

{{-- Page Title --}}
@section('page-title')

{{-- Page Subtitle --}}
@section('page-subtitle', '')

{{-- Breadcrumbs --}}
@section('breadcrumbs')

@endsection

@section('content')
    Hi, Movies
    <div class="container">
            <table class="table table-bordered" id="myTable">
               <thead>
                  <tr>
                     <th>Movies</th>
                     <th>Genre</th>
                     <th>Release Date</th>
                     <th>Status</th>
                     <th>#</th>
                  </tr>
               </thead>
            </table>
         </div>
    @yield('modal-form')
@endsection

@push('footer-scripts')
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ URL::to('/movies/data') }}",
           columns: [
                    { data: 'name', name: 'name' },
                    { data: 'genre', name: 'genre' },
                    { data: 'date_released', name: 'date_released' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' },
                 ]
        });
    } );
    </script>
@endpush

@include('frontend.movies.form')
