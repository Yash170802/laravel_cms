@section('title', 'Admin | SubCategory')
@extends('Backend.layouts.index')
@section('main_content')


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsubcategory">
    SubCategory Add
</button>



<?php
    // echo '<pre>';
    // print_r($category_id);
    // die;
?>
<div class="card mt-4">
    <div class="card-datatable table-responsive">
        <table class="dt-blogsubcategory table border-top" id="blogsubcategoryTable">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>SubCategory Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
<!-- Modal -->

@include('Backend.dasboard.blog.subcategory.subcategoryModel')
@endsection
@section('extraJs')
<!-- testimonial.js -->
{{-- <script src="{{ asset('assets/backend/js/custom/subcategory.js') }}"></script> --}}
<script src="{{ asset('assets/backend/js/custom/blog/subcategory.js') }}"></script>
@endsection
