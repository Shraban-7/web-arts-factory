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

                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <a title="Create" href="{{ route('blog.post.create') }}" id="Modal__show"
                            class="float-end btn btn-primary ">Create
                            Blog</a>
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
                                <h3 class="card-title">Blog Post Table</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-5">
                                <table class="table table-hover text-nowrap" id="Table_ID">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Post Title</th>
                                            <th>Post Banner</th>
                                            <th>Post Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $key=>$post)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $post->post_title }}</td>

                                                <td><img style="width: 225px; height:150px;" class="img-fluid img-thumbnail"
                                                        src="{{ asset('uploads/images/blog/' . $post->post_banner) }}"
                                                        alt="{{ $post->post_title }}" srcset=""></td>

                                                <td>
                                                    @php
                                                        $content = stripslashes($post->post_desc);

                                                        if (strlen($content) > 50) {
                                                            $content = substr($content, 0, 40) . '...';
                                                        }

                                                        echo $content;
                                                    @endphp


                                                </td>
                                                <td>

                                                    <a class="btn btn-warning" href="{{ route('blog.show',$post->id) }}"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-primary" href="{{ route('blog.edit', $post->id) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a type="button" class="delete-item btn btn-danger"
                                                        action-url="{{ route('blog.delete', $post->id) }}"><i
                                                            class="fa-solid fa-trash-can"></i></a>
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
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {

            $('#Table_ID').DataTable();

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
