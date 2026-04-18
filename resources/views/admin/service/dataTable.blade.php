<table class="table table-hover table-sm table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Thumbnail</th>
            <th>Service Name</th>
            <th>Badge</th>
            <th>Order</th>
            <th>Updated</th>
            <th>By</th>
            @can('service-publish')
            <th>Show on Page</th>
            <th>Status</th>
            @endcan
            @canany(['service-edit','service-delete'])
            <th>Action</th>
            @endcanany
        </tr>
    </thead>
    <tbody>
        @forelse($data as $key => $row)
        <tr>
            <td>{{ ($key + 1) + ($data->currentPage() - 1) * $data->perPage() }}</td>
            <td>
                @if(!empty($row->thumbnail_img) && Storage::disk('public')->exists($row->thumbnail_img))
                <img src="{{ url('storage/' . $row->thumbnail_img) }}" alt="{{ $row->name }}" style="width:80px;height:50px;object-fit:cover;border-radius:4px;">
                @else
                <span class="badge badge-secondary">No Image</span>
                @endif
            </td>
            <td><strong>{{ $row->name }}</strong></td>
            <td>{{ $row->service_badge ?: '—' }}</td>
            <td>{{ $row->service_page_order ?? 1 }}</td>
            <td>{{ $row->updated_at->format('d M Y') }}</td>
            <td>{{ $row->users->name ?? '—' }}</td>

            @can('service-publish')
            <td class="text-center">
                <label class="switch">
                    <input onchange="update_status_type(this,'service_page')" value="{{ $row->id }}" type="checkbox" <?php if (($row->show_on_services_page ?? 0) == 1) echo "checked"; ?>>
                    <span class="slider round"></span>
                </label>
            </td>
            <td class="text-center">
                <label class="switch">
                    <input onchange="update_status_type(this,'status')" value="{{ $row->id }}" type="checkbox" <?php if ($row->status == 1) echo "checked"; ?>>
                    <span class="slider round"></span>
                </label>
            </td>
            @endcan

            @canany(['service-edit','service-delete'])
            <td>
                <div class="btn-group">
                    @can('service-edit')
                    <a href="{{ route('service.edit', Crypt::encrypt($row->id)) }}" class="btn btn-primary btn-sm" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    @endcan
                    @can('service-delete')
                    <button type="button" class="btn btn-danger btn-sm" onclick='deleteService("<?= $row->id ?>")'  title="Delete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    @endcan
                </div>
            </td>
            @endcanany
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center text-muted py-4">No services found. <a href="{{ route('service.create') }}">Add your first service</a>.</td>
        </tr>
        @endforelse
    </tbody>
</table>
<hr>
<div class="row">
    <div class="col-md-4" style="margin-top:10px;">
        <p class="text-sm">
            Showing <strong>{{ $data->firstItem() }}</strong> to <strong>{{ $data->lastItem() }}</strong>
            of <strong>{{ $data->total() }}</strong> results
        </p>
    </div>
    <div class="col-md-8">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>
<input type="hidden" value="{{ $data->path() . '?page=' . $data->currentPage() }}" id="pageUrl">

<script>
    function deleteService(id) {
        Swal.fire({
            title: 'Delete this service?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('service.destroy') }}",
                    data: { '_token': "{{ csrf_token() }}", 'id': id },
                    type: 'POST',
                    success: function(res) {
                        if (res.status === 'success') {
                            Swal.fire('Deleted!', res.message, 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error!', res.message, 'error');
                        }
                    }
                });
            }
        });
    }

    function update_status_type(el, type) {
        var status = el.checked ? 1 : 0;
        $.ajax({
            url: "{{ route('service.status') }}",
            data: { '_token': "{{ csrf_token() }}", 'id': el.value, 'status': status, 'type': type },
            type: 'POST',
            success: function(res) {
                var msg = type === 'service_page' ? 'Page visibility updated.' : 'Status updated.';
                if (res.status === 'success') {
                    Swal.fire({ icon: 'success', title: 'Done!', text: msg, timer: 1500, showConfirmButton: false });
                } else {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.' });
                    el.checked = !el.checked; // revert toggle
                }
            }
        });
    }
</script>
