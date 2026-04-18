<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:team-create|team-edit|team-delete|team-publish', ['only' => ['index', 'store']]);
        $this->middleware('permission:team-create', ['only' => ['store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:team-delete', ['only' => ['destroy']]);
        $this->middleware('permission:team-publish', ['only' => ['status']]);
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $query = TeamMember::with('users')->orderBy('position')->orderByDesc('created_at');

        if (!empty($search)) {
            $query->where(function ($inner) use ($search) {
                $inner->where('name', 'like', '%' . $search . '%')
                    ->orWhere('designation', 'like', '%' . $search . '%')
                    ->orWhere('ribbon', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate(10);

        if ($request->ajax()) {
            return view('admin.team_member.dataTable', compact('data'))->render();
        }

        return view('admin.team_member.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'ribbon' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
            'skills' => 'nullable|string',
            'position' => 'required|integer|min:1',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $member = new TeamMember();
        $this->assignFields($member, $request);

        if ($request->hasFile('image')) {
            $member->image = $request->file('image')->store('uploads/team');
        }

        $member->uid = Auth::id();

        if ($member->save()) {
            return redirect()->route('team-member.index')->with(['status' => 'success', 'message' => 'Team member added successfully.']);
        }

        return redirect()->route('team-member.index')->with(['status' => 'error', 'message' => 'Something went wrong.']);
    }

    public function edit(Request $request)
    {
        $row = TeamMember::findOrFail($request->id);

        echo '<div class="modal-header">
            <h4 class="modal-title">Update Team Member</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="' . route('team-member.update') . '" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="id" value="' . $row->id . '" />
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="' . e($row->name) . '" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" value="' . e($row->designation) . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Ribbon / Department</label>
                            <input type="text" class="form-control" name="ribbon" value="' . e($row->ribbon) . '" placeholder="e.g. Leadership">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Position (Order)</label>
                            <input type="number" min="1" class="form-control" name="position" value="' . $row->position . '" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Bio / Description</label>
                        <textarea class="form-control" name="description" rows="3">' . e($row->description) . '</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>LinkedIn URL</label>
                            <input type="url" class="form-control" name="linkedin" value="' . e($row->linkedin) . '">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email ID</label>
                            <input type="email" class="form-control" name="email" value="' . e($row->email) . '">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Skills (Comma separated)</label>
                        <input type="text" class="form-control" name="skills" value="' . e($row->skills) . '" placeholder="e.g. Project Strategy, Estimation">
                    </div>
                    <div class="form-group">
                        <label>Profile Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" accept="image/*" class="custom-file-input" id="customFileEdit">
                                <label class="custom-file-label" for="customFileEdit">Choose Image</label>
                            </div>';
        if (!empty($row->resolved_image_url)) {
            echo '<img loading="lazy" src="' . $row->resolved_image_url . '" style="width: 50px;height: 50px;object-fit:cover;margin-left: 20px;border-radius:50%;">';
        }
        echo '      </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Member</button>
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
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'ribbon' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
            'skills' => 'nullable|string',
            'position' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $member = TeamMember::findOrFail($request->id);
        $this->assignFields($member, $request);

        if ($request->hasFile('image')) {
            if (!empty($member->image) && str_starts_with($member->image, 'uploads/') && file_exists('storage/' . $member->image)) {
                unlink('storage/' . $member->image);
            }
            $member->image = $request->file('image')->store('uploads/team');
        }

        $member->uid = Auth::id();

        if ($member->save()) {
            return redirect()->route('team-member.index')->with(['status' => 'success', 'message' => 'Team member updated successfully.']);
        }

        return redirect()->route('team-member.index')->with(['status' => 'error', 'message' => 'Something went wrong.']);
    }

    public function status(Request $request)
    {
        $member = TeamMember::findOrFail($request->id);
        $member->status = $request->status;
        $member->uid = Auth::id();

        if ($member->save()) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error']);
    }

    public function destroy(Request $request)
    {
        $member = TeamMember::find($request->id);
        if (!$member) {
            return response()->json(['status' => 'error', 'message' => 'Record not found.']);
        }

        if (!empty($member->image) && str_starts_with($member->image, 'uploads/') && file_exists('storage/' . $member->image)) {
            unlink('storage/' . $member->image);
        }

        $member->delete();
        return response()->json(['status' => 'success', 'message' => 'Team member has been deleted.']);
    }

    private function assignFields(TeamMember $member, Request $request): void
    {
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->ribbon = $request->ribbon;
        $member->description = $request->description;
        $member->linkedin = $request->linkedin;
        $member->email = $request->email;
        $member->skills = $request->skills;
        $member->position = $request->position;
    }
}
