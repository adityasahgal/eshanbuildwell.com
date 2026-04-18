<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonial-create|testimonial-edit|testimonial-delete|testimonial-publish', ['only' => ['index', 'store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
        $this->middleware('permission:testimonial-publish', ['only' => ['status']]);
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $query = Testimonial::with('users')->orderBy('position')->orderByDesc('created_at');

        if (!empty($search)) {
            $query->where(function ($inner) use ($search) {
                $inner->where('name', 'like', '%' . $search . '%')
                    ->orWhere('project_info', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate(10);

        if ($request->ajax()) {
            return view('admin.testimonial.dataTable', compact('data'))->render();
        }

        return view('admin.testimonial.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'project_info' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'position' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = new Testimonial();
        $this->assignFields($testimonial, $request);
        $testimonial->uid = Auth::id();

        if ($testimonial->save()) {
            return redirect()->route('testimonial.index')->with(['status' => 'success', 'message' => 'Testimonial added successfully.']);
        }

        return redirect()->route('testimonial.index')->with(['status' => 'error', 'message' => 'Something went wrong.']);
    }

    public function edit(Request $request)
    {
        $row = Testimonial::findOrFail($request->id);

        echo '<div class="modal-header">
            <h4 class="modal-title">Update Testimonial</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="' . route('testimonial.update') . '" method="POST">
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="id" value="' . $row->id . '" />
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Client Name</label>
                            <input type="text" class="form-control" name="name" value="' . e($row->name) . '" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Rating (1-5)</label>
                            <input type="number" min="1" max="5" class="form-control" name="rating" value="' . $row->rating . '" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Order Position</label>
                            <input type="number" min="1" class="form-control" name="position" value="' . $row->position . '" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Project Details / Location</label>
                        <input type="text" class="form-control" name="project_info" value="' . e($row->project_info) . '" placeholder="e.g. Commercial Project, Delhi" required>
                    </div>
                    <div class="form-group">
                        <label>Testimonial Quote</label>
                        <textarea class="form-control" name="quote" rows="4" required>' . e($row->quote) . '</textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                </div>
            </form>
        </div>';
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'project_info' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'position' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = Testimonial::findOrFail($request->id);
        $this->assignFields($testimonial, $request);
        $testimonial->uid = Auth::id();

        if ($testimonial->save()) {
            return redirect()->route('testimonial.index')->with(['status' => 'success', 'message' => 'Testimonial updated successfully.']);
        }

        return redirect()->route('testimonial.index')->with(['status' => 'error', 'message' => 'Something went wrong.']);
    }

    public function status(Request $request)
    {
        $testimonial = Testimonial::findOrFail($request->id);
        $testimonial->status = $request->status;
        $testimonial->uid = Auth::id();

        if ($testimonial->save()) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error']);
    }

    public function destroy(Request $request)
    {
        $testimonial = Testimonial::find($request->id);
        if (!$testimonial) {
            return response()->json(['status' => 'error', 'message' => 'Record not found.']);
        }
        $testimonial->delete();
        return response()->json(['status' => 'success', 'message' => 'Testimonial has been deleted.']);
    }

    private function assignFields(Testimonial $testimonial, Request $request): void
    {
        $testimonial->name = $request->name;
        $testimonial->project_info = $request->project_info;
        $testimonial->rating = $request->rating;
        $testimonial->quote = $request->quote;
        $testimonial->position = $request->position;
    }
}
