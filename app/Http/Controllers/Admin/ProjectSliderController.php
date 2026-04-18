<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project-slider-create|project-slider-edit|project-slider-delete|project-slider-publish', ['only' => ['index', 'store']]);
        $this->middleware('permission:project-slider-create', ['only' => ['store']]);
        $this->middleware('permission:project-slider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project-slider-delete', ['only' => ['destroy']]);
        $this->middleware('permission:project-slider-publish', ['only' => ['status']]);
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $query = ProjectSlider::with('users')->orderBy('position')->orderByDesc('created_at');

        if (!empty($search)) {
            $query->where(function ($inner) use ($search) {
                $inner->where('title', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('project_type', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate(10);

        if ($request->ajax()) {
            return view('admin.project_slider.dataTable', compact('data'))->render();
        }

        return view('admin.project_slider.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'status_label' => 'required|string|max:100',
            'position' => 'required|integer|min:1',
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'url_link' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slider = new ProjectSlider();
        $this->assignFields($slider, $request);

        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('uploads/project-slider');
        }

        $slider->uid = Auth::id();

        if ($slider->save()) {
            return redirect()->route('project-slider.index')->with(['status' => 'success', 'message' => 'Project slider created successfully.']);
        }

        return redirect()->route('project-slider.index')->with(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
    }

    public function edit(Request $request)
    {
        $row = ProjectSlider::findOrFail($request->id);

        echo '<div class="modal-header">
            <h4 class="modal-title">Update Project Slide</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="' . route('project-slider.update') . '" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="id" value="' . $row->id . '" />
                <div class="card-body">
                    <div class="form-group">
                        <label>Position</label>
                        <input type="number" min="1" class="form-control" name="position" value="' . $row->position . '" required>
                    </div>
                    <div class="form-group">
                        <label>Category Badge</label>
                        <input type="text" class="form-control" name="category" value="' . e($row->category) . '" required>
                    </div>
                    <div class="form-group">
                        <label>Status Label</label>
                        <input type="text" class="form-control" name="status_label" value="' . e($row->status_label) . '" required>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="' . e($row->title) . '" required>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" value="' . e($row->location) . '" required>
                    </div>
                    <div class="form-group">
                        <label>Project Type</label>
                        <input type="text" class="form-control" name="project_type" value="' . e($row->project_type) . '" required>
                    </div>
                    <div class="form-group">
                        <label>View Details Link</label>
                        <input type="text" class="form-control" name="url_link" value="' . e($row->url_link) . '">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Image Alt Text</label>
                            <input type="text" class="form-control" name="image_alt" value="' . e($row->image_alt) . '">
                        </div>
                        <div class="form-group col-md-6 d-flex align-items-end">
                            <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" type="checkbox" id="featuredEdit" name="featured" ' . ($row->featured == 1 ? 'checked' : '') . '>
                                <label class="custom-control-label" for="featuredEdit">Featured Project</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slide Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" accept="image/*" class="custom-file-input" id="customFileEdit">
                                <label class="custom-file-label" for="customFileEdit">Choose Slide Image</label>
                            </div>';
        if (!empty($row->resolved_image_url)) {
            echo '<img loading="lazy" src="' . $row->resolved_image_url . '" style="width: 80px;height: 50px;object-fit:cover;margin-left: 20px;border-radius:6px;">';
        }
        echo '      </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Slide</button>
                </div>
            </form>

        </div>
        <script type="text/javascript">
            $(function() {
                bsCustomFileInput.init();
            });
        </script>';
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'status_label' => 'required|string|max:100',
            'position' => 'required|integer|min:1',
            'url_link' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slider = ProjectSlider::findOrFail($request->id);
        $this->assignFields($slider, $request);

        if ($request->hasFile('image')) {
            $imageValidator = Validator::make($request->all(), [
                'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            ]);

            if ($imageValidator->fails()) {
                return redirect()->back()->withErrors($imageValidator)->withInput();
            }

            if (!empty($slider->image) && str_starts_with($slider->image, 'uploads/') && file_exists('storage/' . $slider->image)) {
                unlink('storage/' . $slider->image);
            }

            $slider->image = $request->file('image')->store('uploads/project-slider');
        }

        $slider->uid = Auth::id();

        if ($slider->save()) {
            return redirect()->route('project-slider.index')->with(['status' => 'success', 'message' => 'Project slider updated successfully.']);
        }

        return redirect()->route('project-slider.index')->with(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
    }

    public function status(Request $request)
    {
        $slider = ProjectSlider::findOrFail($request->id);

        if ($request->type === 'featured') {
            $slider->featured = $request->status;
        } else {
            $slider->status = $request->status;
        }

        $slider->uid = Auth::id();

        if ($slider->save()) {
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);
    }


    public function destroy(Request $request)
    {
        $slider = ProjectSlider::find($request->id);

        if (!$slider) {
            return response()->json(['status' => 'error', 'message' => 'Record not found.']);
        }

        if (!empty($slider->image) && str_starts_with($slider->image, 'uploads/') && file_exists('storage/' . $slider->image)) {
            unlink('storage/' . $slider->image);
        }

        $slider->delete();

        return response()->json(['status' => 'success', 'message' => 'Your record has been deleted.']);
    }

    private function assignFields(ProjectSlider $slider, Request $request): void
    {
        $slider->title = $request->title;
        $slider->category = $request->category;
        $slider->location = $request->location;
        $slider->project_type = $request->project_type;
        $slider->status_label = $request->status_label;
        $slider->position = $request->position;
        $slider->url_link = $request->url_link ?: url('projects');
        $slider->image_alt = $request->image_alt ?: $request->title;
        $slider->featured = $request->has('featured') ? 1 : 0;
    }

}
