@section('title', 'Admin | Subscriber')
@extends('Backend.layouts.index')
@section('main_content')


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsubscriber">
        Subscriber Add
    </button>


    <!-- Modal -->

    @include('Backend.dasboard.subscriber.subscriberModel')

    <div class="card mt-4">
        <div class="card-datatable table-responsive">
            <table class="dt-subscriber table border-top" id="subscriberTable">
                <thead>
                    <tr>
                        {{-- <th>Id</th> --}}
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('extraJs')
    <script src="{{ asset('assets/backend/js/custom/subscriber/subscriber.js') }}"></script>
@endsection
