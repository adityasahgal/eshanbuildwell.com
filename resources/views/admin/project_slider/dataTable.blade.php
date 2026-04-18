<table class="table table-hover table-sm tabel-border">
    <thead>
        <tr>
            <th>#</th>
            <th>Preview</th>
            <th>Title</th>
            <th>Category</th>
            <th>Position</th>
            <th>Updated Date</th>
            <th>Updated By</th>
            @can('project-slider-publish')
            <th>Status</th>
            <th>Featured</th>
            @endcan
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $row)
        <tr>
            <th>{{ ($key + 1) + ($data->currentPage() - 1) * $data->perPage() }}</th>
            <td>
                @if(!empty($row->resolved_image_url))
                <img src="{{ $row->resolved_image_url }}" alt="{{ $row->image_alt }}" style="width: 90px;height: 54px;object-fit:cover;border-radius:6px;">
                @endif
            </td>
            <td>
                <strong>{{ $row->title }}</strong>
                <div class="text-muted small">{{ $row->location }}</div>
            </td>
            <td>{{ $row->category }}</td>
            <td>{{ $row->position }}</td>
            <td>{{ $row->updated_at->format('j F, Y') }}</td>
            <td>{{ optional($row->users)->name }}</td>
            @can('project-slider-publish')
            <td>
                <label class="switch">
                    <input onchange="updateProjectSliderStatus(this, 'status')" value="{{ $row->id }}" type="checkbox" {{ $row->status == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td>
                <label class="switch">
                    <input onchange="updateProjectSliderStatus(this, 'featured')" value="{{ $row->id }}" type="checkbox" {{ $row->featured == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
            </td>
            @endcan

            <td>
                <div class="btn-group">
                    @can('project-slider-edit')
                    <button type="button" class="btn btn-primary btn-sm" onclick='getProjectSliderDetails("{{ $row->id }}")'>
                        <i class="fas fa-edit"></i>
                    </button>
                    @endcan
                    @can('project-slider-delete')
                    <button type="button" class="btn btn-danger btn-sm" onclick='deleteProjectSliderData("{{ $row->id }}")'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @endcan
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div class="row">
    <div class="col-md-3" style="margin-top:10px;">
        <p class="text-sm text-gray-700 leading-5">
            Showing
            <span class="font-medium">{{ $data->firstItem() }}</span>
            to
            <span class="font-medium">{{ $data->lastItem() }}</span>
            of
            <span class="font-medium">{{ $data->total() }}</span>
            results
        </p>
    </div>
    <div class="col-md-9">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>

<div class="modal fade" id="projectSliderUpdateModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-primary card-outline" id="projectSliderData"></div>
    </div>
</div>

<script>
    function getProjectSliderDetails(id) {
        $.ajax({
            url: "{{ route('project-slider.edit') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            type: 'POST',
            success: function(result) {
                $("#projectSliderData").html(result);
                $('#projectSliderUpdateModel').modal('show');
            }
        });
    }

    function deleteProjectSliderData(id) {
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
                    url: "{{ route('project-slider.destroy') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    type: 'POST',
                    success: function(results) {
                        if (results.status === "success") {
                            Swal.fire('Deleted!', results.message, results.status).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error!', results.message, results.status);
                        }
                    }
                });
            }
        });
    }

    function updateProjectSliderStatus(el, type = 'status') {
        const status = el.checked ? 1 : 0;
        $.ajax({
            url: "{{ route('project-slider.status') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: el.value,
                status: status,
                type: type
            },
            type: 'POST',
            success: function(results) {
                if (results.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Project ' + type + ' changed successfully.'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Project ' + type + ' was not changed.'
                    });
                }
            }
        });
    }

</script>
