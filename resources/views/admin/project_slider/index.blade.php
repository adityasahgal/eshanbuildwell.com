@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session('status'))
                <script>
                    Swal.fire({
                        icon: '<?= Session('status') ?>',
                        title: '<?= Session('status') ?>',
                        text: '<?= Session('message') ?>',
                    });
                </script>
                @endif

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Manage Homepage Project Slider</h3>
                        <div class="row card-tools">
                            <div class="col-md-6 input-group input-group-sm">
                                <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search" onkeyup="search_func(this.value);">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" style="height: 31px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @can('project-slider-create')
                                <button class="btn btn-primary add-btn" data-toggle="modal" data-target="#addModel">Add Slide</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="tag_container">
                        @include('admin.project_slider.dataTable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-primary card-outline">
            <div class="modal-header">
                <h4 class="modal-title">Add New Project Slide</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('project-slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="number" min="1" class="form-control" name="position" value="{{ old('position', 1) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Badge</label>
                                    <input type="text" class="form-control" name="category" value="{{ old('category') }}" placeholder="Residential" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Label</label>
                                    <input type="text" class="form-control" name="status_label" value="{{ old('status_label', 'Completed') }}" placeholder="Completed" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project Type</label>
                                    <input type="text" class="form-control" name="project_type" value="{{ old('project_type') }}" placeholder="Residential Project" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="A32 P-04, Phii2 Greater Noida UP - 201315" required>
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Greater Noida, UP" required>
                        </div>

                        <div class="form-group">
                            <label>View Details Link</label>
                            <input type="text" class="form-control" name="url_link" value="{{ old('url_link', url('projects')) }}">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 text-left">
                                <label>Image Alt Text</label>
                                <input type="text" class="form-control" name="image_alt" value="{{ old('image_alt') }}" placeholder="Alt text for SEO">
                            </div>
                            <div class="form-group col-md-6 d-flex align-items-end">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" type="checkbox" id="featured" name="featured">
                                    <label class="custom-control-label" for="featured">Featured Project</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Slide Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Slide Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Add Slide</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            getData($(this).attr('href'));
        });
    });

    function getData(url) {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                search: document.getElementById("search").value
            },
            success: function(data) {
                $('#tag_container').html(data);
            },
            error: function() {
                alert("No response from server");
            }
        });
    }

    function search_func(value) {
        $.ajax({
            type: "GET",
            url: "{{ route('project-slider.index') }}",
            data: {
                search: value
            },
            success: function(data) {
                $('#tag_container').html(data);
            },
            error: function() {
                alert("No response from server");
            }
        });
    }
</script>
@endpush
