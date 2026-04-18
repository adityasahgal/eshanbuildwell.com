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
                        <h3 class="card-title">Manage Team Members</h3>
                        <div class="row card-tools">
                            <div class="col-md-6 input-group input-group-sm">
                                <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search by name, role..." onkeyup="search_func(this.value);">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default" style="height: 31px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                @can('team-create')
                                <button class="btn btn-primary add-btn" data-toggle="modal" data-target="#addModel">Add Member</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="tag_container">
                        @include('admin.team_member.dataTable')
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
                <h4 class="modal-title">Add New Team Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ route('team-member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="John Doe" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation / Role</label>
                                    <input type="text" class="form-control" name="designation" value="{{ old('designation') }}" placeholder="Senior Engineer" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ribbon (Tag)</label>
                                    <input type="text" class="form-control" name="ribbon" value="{{ old('ribbon') }}" placeholder="Leadership">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position (Order)</label>
                                    <input type="number" min="1" class="form-control" name="position" value="{{ old('position', 1) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description / Bio</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Brief introduction...">{{ old('description') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>LinkedIn URL</label>
                                    <input type="url" class="form-control" name="linkedin" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/in/...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="member@eshanbuildwell.com">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Skills (Comma separated)</label>
                            <input type="text" class="form-control" name="skills" value="{{ old('skills') }}" placeholder="Project Strategy, BOQ & Estimation">
                        </div>

                        <div class="form-group">
                            <label>Profile Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose profile photo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Add Member</button>
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
            url: "{{ route('team-member.index') }}",
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
            url: "{{ route('team-member.edit') }}",
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
            url: "{{ route('team-member.status') }}",
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
                    url: "{{ route('team-member.destroy') }}",
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
