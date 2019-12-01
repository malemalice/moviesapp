@extends('layouts.frontend')

{{-- Page Title --}}
@section('page-title')

{{-- Page Subtitle --}}
@section('page-subtitle', '')

{{-- Breadcrumbs --}}
@section('breadcrumbs')

@endsection

@section('content')
    <div class="container">
            <table class="table table-bordered" id="myTable">
               <thead>
                  <tr>
                     <th>Movies</th>
                     <th>Lending Date</th>
                     <th>Returned Date Plan</th>
                     <th>Returned Date Actual</th>
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
           ajax: "{{ URL::to('/lending/data') }}",
           columns: [
                    { data: 'movies', name: 'movies' },
                    { data: 'date_lending', name: 'date_lending' },
                    { data: 'date_returned', name: 'date_returned' },
                    { data: 'action', name: 'action' },
                 ]
        });
    } );
    </script>
@endpush

@include('frontend.lending.form')
