@extends('admin.app')
@section('title', 'Add Portfolio')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">

                            <div class="card">
                                <div class="card-header d-flex">
                                    <h3 class="box-title col-md-6">Create Service Feature</h3>
                                    <div class="col-md-3"></div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box box-primary">
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <p><strong>Opps Something went wrong</strong></p>
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <form id="createForm" action="{{ route('service.update', $service) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="service_name">Service Title</label>
                                                                    <input type="text" id="service_name"
                                                                        name="service_name"
                                                                        value="{{ $service->service_name }}"
                                                                        class="form-control">
                                                                </div>
                                                                <!-- Add other fields in the left column -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="imageUpload">Choose an image</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="imageUpload" name="service_logo"
                                                                        accept="image/*">
                                                                    <img id="display_image" class="mt-3" width="auto"
                                                                        height="250px"
                                                                        src="{{ asset('uploads/images/service/' . $service->service_logo) }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Service
                                                                        Description</label>
                                                                    <textarea class="form-control" id="description" name="service_desc" rows="3">{{ $service->service_desc }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea2">Service
                                                                        Process</label>
                                                                    <textarea class="form-control" id="process" name="service_process" rows="3"> {{ $service->service_process }} </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea3">Service
                                                                        Benefits</label>
                                                                    <textarea class="form-control" id="benefits" name="service_benefits" rows="3">{{ $service->service_benefits }}</textarea>
                                                                </div>
                                                                <!-- Add other fields in the right column -->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="service_name">Service Duration</label>
                                                                    <input type="text" id="service_duration"
                                                                        name="service_duration"
                                                                        value="{{ $service->service_duration }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Choose Technologies</label>
                                                                <select class="select2bs4" multiple="multiple"
                                                                    name="technologies[]" data-placeholder="Select a State"
                                                                    style="width: 100%;">
                                                                    @foreach ($technologies as $technology)
                                                                        <option value="{{ $technology->id }}"
                                                                            @if (in_array($technology->id, $selectedTechnologyIds)) selected @endif>
                                                                            {{ $technology->technology_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="service_name">Meta Title</label>
                                                                    <input type="text" id="service_name"
                                                                        name="meta_title" value="{{ $service->meta_title }}" class="form-control">
                                                                </div>
                                                                <!-- Add other fields in the left column of the second row -->
                                                            </div>

                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label for="service_name">Meta Tag</label>
                                                                    <input type="text" id="service_name"
                                                                        name="meta_tag" value="{{ $service->meta_tag }}" class="form-control">
                                                                </div>
                                                                <!-- Add other fields in the right column of the second row -->
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea3">Meta
                                                                        Description</label>
                                                                    <textarea class="form-control" id="meta_desc" name="meta_desc" rows="3">{{ $service->meta_desc }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="status" class="d-block">Status</label>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input" value="1"
                                                                            id="status" @if ($service->status===1)
                                                                                checked
                                                                            @endif name="status">
                                                                        <label class="custom-control-label"
                                                                            for="status"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="submit"
                                                                    class="btn btn-success me-3 px-3 btn-block">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </section>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </section>

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>



    <!-- bootbox.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>



    <script>
        $(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            var editor1 = new RichTextEditor("#process");
            var editor1 = new RichTextEditor("#description");
            var editor1 = new RichTextEditor("#benefits");
            var editor1 = new RichTextEditor("#meta_desc");

            //image preview

            $(document).on("change", "#imageUpload", function(e) {
                e.preventDefault();

                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#display_image").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);

                }
            });

        })
    </script>
@endsection
