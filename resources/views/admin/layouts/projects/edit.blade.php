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

                                                    <!-- /.box-header -->
                                                    <!-- form start -->
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
                                                    <form role="form" method="POST"
                                                        action="{{ route('service.project.update',$project->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="box-body">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="feature_title">Project Title</label>
                                                                    <input type="text" id="feature_title"
                                                                        name="project_title" class="form-control" value="{{ $project->project_title }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="imageUpload">Choose an image</label>
                                                                    <input type="file" class="form-control-file" id="imageUpload" name="project_banner" accept="image/*">
                                                                    <img id="display_image" class="mt-3" width="auto" height="250px" src="{{ asset('uploads/images/projects/'.$project->project_banner) }}" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Project
                                                                        Description</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="project_desc" rows="3">{{ $project->project_desc }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="feature_title">Project URL</label>
                                                                    <input type="text" id="feature_title"
                                                                        name="project_url" class="form-control" value="{{ $project->project_url }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Services</label>
                                                                    <select name="project_service_id" class="form-control" id="service">
                                                                        @foreach ($services as  $service)
                                                                            <option @if ($project->project_service_id ==$service->id)
                                                                                selected
                                                                            @endif value="{{ $service->id }}">{{ $service->service_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>

                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->



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
