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
                        Carousel Item List
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <a title="Create" href="{{ route('slider_item.create') }}"
                            id="Modal__show" class="float-end btn btn-primary ">Create
                            Carousel Item</a>
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
                                            <th>Item Name</th>

                                            <th>Item Photo</th>

                                            <th>Item Description</th>

                                            <th>P Service Name</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sliders as $key=>$slider)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $slider->item_title }}</td>

                                                <td><img class="img-fluid img-thumbnail"
                                                    src="{{ asset('uploads/images/carousel/'.$slider->item_image) }}"
                                                    alt="{{ $slider->item_title }}" srcset=""></td>
                                                <td>{{ $slider->item_content }}</td>

                                                <td></td>

                                                <td>
                                                    <a href="#">details</a>
                                                    <a href="{{ route('slider_item.edit', $slider->id) }}"
                                                         >update</a>
                                                    <a type="button" class="delete-item"
                                                        action-url="{{ route('slider_item.delete', $slider->id) }}">Delete
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


    <script>
        $(function() {

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
        })
    </script>

@endsection
