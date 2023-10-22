@extends('admin.app')
@section('title', 'Add Portfolio')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

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
                                                        action="{{ route('service.feature.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="box-body">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="feature_title">Feature Title</label>
                                                                    <input type="text" id="feature_title"
                                                                        name="feature_title" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Feature
                                                                        Description</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="feature_desc" rows="3"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Services</label>
                                                                    <select name="service_id" class="form-control" id="service">
                                                                        @foreach ($services as  $service)
                                                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
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
