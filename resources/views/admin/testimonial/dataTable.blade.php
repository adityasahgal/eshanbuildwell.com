<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Client</th>
            <th>Rating</th>
            <th>Quote</th>
            <th>Position</th>
            @can('testimonial-publish')
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
                <strong>{{ $row->name }}</strong><br>
                <small class="text-muted">{{ $row->project_info }}</small>
            </td>
            <td>
                @for($i=1; $i<=5; $i++)
                    <i class="fas fa-star {{ $i <= $row->rating ? 'text-warning' : 'text-gray' }}"></i>
                @endfor
            </td>
            <td>
                <div style="max-width: 300px; max-height: 60px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                    "{{ $row->quote }}"
                </div>
            </td>
            <td>{{ $row->position }}</td>
            @can('testimonial-publish')
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
                    @can('testimonial-edit')
                    <button type="button" class="btn btn-sm btn-info" onclick="edit({{ $row->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endcan
                    @can('testimonial-delete')
                    <button type="button" class="btn btn-sm btn-danger" onclick="destroy({{ $row->id }})">
                        <i class="fas fa-trash"></i>
                    </button>
                    @endcan
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No testimonials found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $data->links() !!}
</div>
