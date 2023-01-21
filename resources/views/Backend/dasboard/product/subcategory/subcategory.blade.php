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
        <table class="dt-subcategory table border-top" id="subcategoryTable">
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

@include('Backend.dasboard.product.subcategory.subcategoryModel')
@endsection
@section('extraJs')
<!-- testimonial.js -->
<script src="{{ asset('assets/backend/js/custom/product/subcategory.js') }}"></script>
@endsection
