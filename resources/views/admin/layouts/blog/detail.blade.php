@extends('admin.app')
@section('title', 'Add Portfolio')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('styles')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
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
                                <div class="card-header ">
                                    <div class="d-flex justify-content-between">

                                        <h3 class="box-title ">Blog Details</h3>

                                        <div>
                                            <a href="{{ route('blog.list') }}" class="btn btn-primary"><i
                                                    class="fa-solid fa-left-long mx-2"></i>Back</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box box-primary">

                                                    <div class="d-flex flex-column">
                                                        <h5>Title: {{ $blogPost->post_title }}</h5>
                                                        <div>
                                                            <img id="display_image" class="my-3" width="auto"
                                                                height="250px"
                                                                src="{{ asset('uploads/images/blog/' . $blogPost->post_banner) }}"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <h5>blog Description:</h5>
                                                            <p>{{ $blogPost->post_desc }}</p>
                                                        </div>
                                                    </div>
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
    <!-- rich text editor -->

    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('richtexteditor/plugins/all_plugins.js') }}"></script>



    <!-- bootbox.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>



    <script>
        $(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            var editor1 = new RichTextEditor("#inp_editor1");
            var editor1 = new RichTextEditor("#inp_editor2");

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


            //Initialize Select2 Elements
            // $('.select2bs4').select2({
            //     theme: 'bootstrap4'
            // })
        })



        // Function to display image preview
    </script>

@endsection
