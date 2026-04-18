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
                        <h3 class="card-title">Manage Client Testimonials</h3>
                        <div class="row card-tools">
                            <div class="col-md-6 input-group input-group-sm">
                                <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search by name, project..." onkeyup="search_func(this.value);">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" style="height: 31px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                @can('testimonial-create')
                                <button class="btn btn-primary add-btn" data-toggle="modal" data-target="#addModel">Add Testimonial</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="tag_container">
                        @include('admin.testimonial.dataTable')
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
                <h4 class="modal-title">Add New Testimonial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('testimonial.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Rajesh Sharma" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Rating (1-5)</label>
                                    <input type="number" min="1" max="5" class="form-control" name="rating" value="{{ old('rating', 5) }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Order Position</label>
                                    <input type="number" min="1" class="form-control" name="position" value="{{ old('position', 1) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Project Details / Location</label>
                            <input type="text" class="form-control" name="project_info" value="{{ old('project_info') }}" placeholder="e.g. Commercial Project, Delhi" required>
                        </div>

                        <div class="form-group">
                            <label>Testimonial Quote</label>
                            <textarea class="form-control" name="quote" rows="4" placeholder="What the client said..." required>{{ old('quote') }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Save Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-primary card-outline" id="editHtml">
            <!-- Loaded via AJAX -->
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
            url: "{{ route('testimonial.index') }}",
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

    function edit(id) {
        $.ajax({
            type: "POST",
            url: "{{ route('testimonial.edit') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data) {
                $('#editHtml').html(data);
                $('#editModel').modal('show');
            },
            error: function() {
                alert("No response from server");
            }
        });
    }

    function update_status(id, status) {
        $.ajax({
            type: "POST",
            url: "{{ route('testimonial.status') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "status": status
            },
            success: function(data) {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Status updated successfully',
                        timer: 1500
                    });
                }
            }
        });
    }

    function destroy(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('testimonial.destroy') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire('Deleted!', 'Record has been deleted.', 'success');
                            location.reload();
                        }
                    }
                });
            }
        })
    }
</script>
@endpush
