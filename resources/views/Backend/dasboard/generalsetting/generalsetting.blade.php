@section('title', 'Admin | General Setting')
@extends('Backend.layouts.index')
@section('main_content')

    <div class="col-xl-12">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Global Settings /</span> General Setting
        </h4>
        <div class="nav-align-left mb-4">
            <ul class="nav nav-pills me-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-home" aria-controls="navs-pills-left-home" aria-selected="true">
                        Logo
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-profile" aria-controls="navs-pills-left-profile"
                        aria-selected="false">
                        Favicon
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-messages" aria-controls="navs-pills-left-messages"
                        aria-selected="false">
                        Top Bar
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-messages" aria-controls="navs-pills-left-messages"
                        aria-selected="false">
                        Email
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-messages" aria-controls="navs-pills-left-messages"
                        aria-selected="false">
                        Color
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-left-home" role="tabpanel">
                    <form id="formlogo" method="POST" action="{{ route('admin.setting_insert') }}"
                        onsubmit="return false">
                        @csrf
                        <div class="form-group">
                            <div class="col-12 header_logo ">
                                <label class="form-label" for="file">Company Logo</label>
                                <img src="{{ url('logo/Image/' . $logo) }}" name="file" class="navbar-brand" />
                            </div>
                            <label class="form-label" for="file">Update Logo</label>
                            <input class="form-control" type="file" id="logo_img" name="logo_img" value=""
                                onchange="loadImg(event)">
                            <input class="form-control" type="hidden" id="img_name" name="img_name" value="">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Log</button>
                    </form>
                </div>
                {{-- Favicon Image --}}
                <div class="tab-pane fade" id="navs-pills-left-profile" role="tabpanel">
                    {{-- <form id="formfavicon" method="POST" action="{{ route('admin.favicon_insert') }}"
                        onsubmit="return false">
                        @csrf
                        <div class="form-group">
                            <div class="col-12 header_logo ">
                                <label class="form-label" for="file">Favicon Logo</label>
                                <img src="" name="file" class="navbar-brand" />
                            </div>
                            <label class="form-label" for="file">Update Logo</label>
                            <input class="form-control" type="file" id="favicon_img" name="favicon_img" value=""
                                onchange="loadfavicon(event)">
                            <input class="form-control" type="hidden" id="favicon_name" name="favicon_name" value="">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Log</button>
                    </form> --}}
{{-- ........................................................................................................... --}}
                </div>
                {{-- Top Bar --}}
                <div class="tab-pane fade" id="navs-pills-left-messages" role="tabpanel">
                    <form id="formGenralSettings" method="POST" action="{{ route('admin.setting_insert') }}"
                        onsubmit="return false">
                        <div class="form-group col-xl-6 ">
                            <label class="form-label" for="client_name">Top Bar Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Please Enter email Name" /><br>
                            <label class="form-label" for="client_name">Top Bar Phone Number</label>
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Please Enter email Name" />
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraJs')
    <!-- testimonial.js -->
    <script src="{{ asset('assets/backend/js/custom/setting/generalsetting.js') }}"></script>
    <script src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>
    {{-- <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script> --}}
@endsection
