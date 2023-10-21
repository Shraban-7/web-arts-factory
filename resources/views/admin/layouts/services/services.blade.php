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
                        <a title="Create" href="{{ route('service.create') }}" formActionUrl="{{ route('service.store') }}"
                            id="Modal__show" class="float-end btn btn-primary ">Create
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
                                                    <a href="{{ route('service.edit', $service->id) }}"
                                                        service-id="{{ $service->id }}" id="Modal__show">update</a>
                                                    <a type="button" class="delete-item"
                                                        action-url="{{ route('service.delete', $service->id) }}">Delete
                                                        Item</a>
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



            // modal part

            let dialog = ''
            let formUrl = ''
            $(document).on('click', '#Modal__show', function(e) {
                e.preventDefault();
                let ModalUrl = $(this).attr('href');
                const modalTitle = $(this).attr('title');
                const fromUrl = $(this).attr('formUrl');
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


            // from store

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


            // form update

            $(document).on('submit', '#editForm', function(e) {
                e.preventDefault();
                let formData = new FormData($('#editForm')[0])
                // let service_id = $(this).attr('service-id'); // Get the action attribute of the form
                $.ajax({
                    type: "POST",
                    url: "{{ route('service.update', ['service'=>$service]) }}", // Use the form's action URL
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        $('.table__content').load(location.href + ' .table__content');
                        dialog.modal('hide');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error occurred:');
                        console.log(textStatus, errorThrown);
                        // Handle error as needed, e.g., display an error message to the user
                        alert('Error occurred during the request. Please try again.');
                    }
                });
            });



            // Delete

            $('a.delete-item').click(function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var actionUrl = $(this).attr('action-url');
                var clickedRow = $(this).closest('tr'); // Capture the reference to the table row

                $.ajax({
                    type: 'GET',
                    url: actionUrl,
                    success: function(data) {
                        // Handle success, e.g., remove the deleted item from the DOM
                        clickedRow.remove(); // Remove the table row
                    },
                    error: function(data) {
                        // Handle errors, e.g., show an error message
                        console.error(data);
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
