@section('title', 'Admin | Our Team')
@extends('Backend.layouts.index')
@section('main_content')


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmember">
        Add Team Member
    </button>


    <!-- Modal -->

    @include('Backend.dasboard.team.teamModel')

    <div class="card mt-4">
        <div class="card-datatable table-responsive">
            <table class="dt-team table border-top" id="subscriberTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Degnition</th>
                        <th>Detail</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('extraJs')
    <script src="{{ asset('assets/backend/js/custom/team/team.js') }}"></script>
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('detail');
    </script>
@endsection
