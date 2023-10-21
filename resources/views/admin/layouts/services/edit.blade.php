<form id="editForm" action="{{ route('service.update',$service) }}" method="POST" enctype="multipart/form-data">

    @csrf
    {{-- @method('PUT') --}}
    <div class="row">
        {{-- <input type="hidden" name="service_id" value="{{ $service->id }}"> --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="service_name">Service Title</label>
                <input type="text" id="service_name" value="{{ $service->service_name }}" name="service_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Service Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="service_desc" rows="3">{{ $service->service_duration }}</textarea>
            </div>
            <!-- Add other fields in the left column -->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlTextarea2">Service Process</label>
                <textarea class="form-control" id="exampleFormControlTextarea2" name="service_process" rows="3">{{ $service->service_process }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea3">Service Benefits</label>
                <textarea class="form-control" id="exampleFormControlTextarea3" name="service_benefits" rows="3">{{ $service->service_benefits }}</textarea>
            </div>
            <!-- Add other fields in the right column -->
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="imageUpload">Choose an image</label>
                <input type="file" class="form-control-file" id="imageUpload" name="service_logo" accept="image/*">
                <img id="display_image" class="mt-3" width="auto" height="250px" src="{{ asset('uploads/images/service/'.$service->service_logo) }}" alt="">
            </div>
            <!-- Add other fields in the left column of the second row -->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="service_name">Meta Title</label>
                <input type="text" id="service_name" name="meta_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="service_name">Meta Tag</label>
                <input type="text" id="service_name" name="meta_tag" class="form-control">
            </div>
            <!-- Add other fields in the right column of the second row -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label>Choose Technologies</label>
            <select class="select2bs4" multiple="multiple" name="technologies[]" data-placeholder="Select a State"
                style="width: 100%;">
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" value="1" id="status" name="status">
                    <label class="custom-control-label" for="status"></label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="button" class="bootbox-close-button btn btn-danger me-3 px-3 btn-block">Cancel</button>

        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success me-3 px-3 btn-block">Save</button>
        </div>
    </div>
</form>
