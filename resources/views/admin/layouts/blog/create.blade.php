@extends('admin.app')
@section('title', 'Add Portfolio')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('styles')
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
                                    <h3 class="box-title col-md-6">Create Blog Post</h3>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"><a href="{{ route('blog.list') }}" class="btn btn-primary"><i class="fa-solid fa-left-long mx-2"></i>Back</a></div>
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
                                                    <form role="form" method="POST"
                                                        action="{{ route('blog.post.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="box-body">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="feature_title">Post Title</label>
                                                                    <input type="text" id="feature_title"
                                                                        name="post_title" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="imageUpload">Choose an image</label>
                                                                    <input type="file" class="form-control-file" id="imageUpload" name="post_banner" accept="image/*">
                                                                    <img id="display_image" class="mt-3" width="auto" height="250px" src="" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Post
                                                                        Description</label>
                                                                    <textarea class="form-control"  id="inp_editor1" name="post_desc" rows="3"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Categories</label>
                                                                    <select name="post_category_id" class="form-control" id="service">
                                                                        <option value="">Choose Category</option>
                                                                        @foreach ($categories as  $category)
                                                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="feature_title">Meta Title</label>
                                                                    <input type="text" id="feature_title"
                                                                        name="meta_title" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="feature_title">Meta Tag</label>
                                                                    <input type="text" id="feature_title"
                                                                        name="meta_tag" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="feature_title">Meta Description</label>
                                                                    <textarea class="form-control"  id="inp_editor2" name="meta_desc" rows="3"></textarea>
                                                                </div>

                                                                <div class="button-container">
                                                                    <button type="submit" class="btn btn-primary block" style="width: 100%;">Create Post</button>
                                                                </div>

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
<!-- rich text editor -->





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
