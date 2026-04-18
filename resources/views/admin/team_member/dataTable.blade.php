<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Member</th>
            <th>Designation</th>
            <th>Position</th>
            <th>Created By</th>
            @can('team-publish')
            <th>Status</th>
            @endcan
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $row)
        <tr>
            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="{{ $row->resolved_image_url }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                    <div>
                        <div class="font-weight-bold">{{ $row->name }}</div>
                        <small class="badge badge-info">{{ $row->ribbon }}</small>
                    </div>
                </div>
            </td>
            <td>{{ $row->designation }}</td>
            <td>{{ $row->position }}</td>
            <td>{{ $row->users->name ?? 'N/A' }}</td>
            @can('team-publish')
            <td>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status{{ $row->id }}" 
                        {{ $row->status == 1 ? 'checked' : '' }} 
                        onchange="update_status({{ $row->id }}, this.checked ? 1 : 0)">
                    <label class="custom-control-label" for="status{{ $row->id }}"></label>
                </div>
            </td>
            @endcan
            <td>
                <div class="btn-group">
                    @can('team-edit')
                    <button type="button" class="btn btn-sm btn-info" onclick="edit({{ $row->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endcan
                    @can('team-delete')
                    <button type="button" class="btn btn-sm btn-danger" onclick="destroy({{ $row->id }})">
                        <i class="fas fa-trash"></i>
                    </button>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No team members found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $data->links() !!}
</div>
