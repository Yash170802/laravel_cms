@section('title', 'Admin | Category')
@extends('Backend.layouts.index')
@section('main_content')


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory">
    Category Add
</button>


<!-- Modal -->

@include('Backend.dasboard.product.category.categoryModel')

<div class="card mt-4">
    <div class="card-datatable table-responsive">
        <table class="dt-category table border-top" id="categoryTable">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@section('extraJs')
<!-- testimonial.js -->
<script src="{{ asset('assets/backend/js/custom/product/category.js') }}"></script>
@endsection
