@extends('admin.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- /.col -->
                    <div class="col-md-4">
                        Service List
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <a title="Create" href="{{ route('service.create') }}" id="Modal__show"
                            class="float-end btn btn-primary ">Create
                            Student</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>S Name</th>
                                            <th>S Banner</th>
                                            <th>S Description</th>
                                            <th>S Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($services as $key=>$service)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $service->service_name }}</td>
                                                <td>
                                                    <img class="img-fluid img-thumbnail"
                                                        src="{{ asset('uploads/images/service/' . $service->service_logo) }}"
                                                        alt="{{ $service->service_name }}" srcset="">
                                                </td>
                                                <td>{{ $service->service_desc }}</td>
                                                <td>{{ $service->status }}</td>
                                                <td>
                                                    <a href="#">details</a>
                                                    <a href="{{ route('service.edit',$service->id) }}" id="Modal__show">update</a>
                                                    <a href="#">delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No item listed</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.row -->


            <!-- /.row -->

            <!-- Main row -->

            <!-- /.row -->
    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
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
            function initializeSelect2InsideModal() {
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });
            }

            // function previewImage(input) {
            //     var preview = document.getElementById('imagePreview');
            //     var file = input.files[0];
            //     var reader = new FileReader();

            //     reader.onload = function(e) {
            //         preview.src = e.target.result;
            //         preview.style.display = 'block';
            //     };

            //     if (file) {
            //         reader.readAsDataURL(file);
            //     }
            // }

            // // Add an event listener to the file input to trigger the preview
            // var imageUpload = document.getElementById('imageUpload');
            // imageUpload.addEventListener('change', function() {
            //     previewImage(this);
            // });

            // modal part

            let dialog = ''
            $(document).on('click', '#Modal__show', function(e) {
                e.preventDefault();
                let ModalUrl = $(this).attr('href');
                const modalTitle = $(this).attr('title');
                alert(ModalUrl);
                console.log(ModalUrl);

                $.ajax({
                    type: "get",
                    url: ModalUrl,
                    success: function(response) {
                        dialog = bootbox.dialog({
                            title: 'Service ' + modalTitle,
                            message: "<div class='modal__content'> </div>",
                            size: 'large',

                        });
                        $('.modal__content').html(response);
                        initializeSelect2InsideModal();


                    }
                });


            });

            $(document).on('submit', '#createForm', function(e) {
                e.preventDefault();
                let formData = new FormData($('#createForm')[0])
                $.ajax({
                    type: "POST",
                    url: "{{ route('service.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        $('.table__content').load(location.href + ' .table__content');
                        dialog.modal('hide');
                    }
                });
            });

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
