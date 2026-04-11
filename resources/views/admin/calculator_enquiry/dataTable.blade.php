<table class="table table-hover table-sm table-bordered">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Project Type</th>
            <th>Plot Area (sq ft)</th>
            <th>Total Built-up (sq ft)</th>
            <th>Floors</th>
            <th>Total Cost (₹)</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $key => $row)
        <tr>
            <th>{{ ($key + 1) + ($data->currentPage() - 1) * $data->perPage() }}</th>
            <td>{{ $row->created_at->format('j M Y, g:i A') }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->project_type }}</td>
            <td>{{ number_format($row->plot_area, 2) }}</td>
            <td>{{ number_format($row->total_builtup, 2) }}</td>
            <td>{{ $row->total_floors }}</td>
            <td><strong>₹ {{ number_format($row->total_cost, 2) }}</strong></td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center text-muted">No calculator enquiries found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
<hr>
<div class="row">
    <div class="col-md-3" style="margin-top:10px;">
        <p class="text-sm">
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
<input type="hidden" value="{{ $data->path() . '?page=' . $data->currentPage() }}" id="pageUrl">
