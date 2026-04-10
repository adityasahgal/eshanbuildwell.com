<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:subcategory-create|subcategory-edit|subcategory-delete|subcategory-publish', ['only' => ['index', 'store']]);
        $this->middleware('permission:subcategory-create', ['only' => ['store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
        $this->middleware('permission:subcategory-publish', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q = $request->search;
            $data = Subcategory::with(['categories', 'users'])
                ->orderBy('created_at', 'DESC')
                ->Where('name', 'LIKE', "%{$q}%")
                ->orWhereHas('categories', function ($query) use ($q) {
                    $query->where('name', 'LIKE', "%{$q}%");
                })
                ->paginate(10);
            return view('admin.subcategory.dataTable', compact('data'))->render();
        } else {
            $data = Subcategory::with(['categories', 'users'])->orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.subcategory.index', compact('data'));
        }
    }


    public function getSubcate(Request $request){
        $data = Subcategory::where('status', 1)->where('cid', $request->cid)->get();
        foreach ($data as $row) {
            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
    }
    
    public function getMultiSubcate(Request $request){
        $data = Subcategory::where('status', 1)->whereIn('cid', $request->cid)->get();
        foreach ($data as $row) {
            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|unique:subcategories,name|max:255'
        ], [
            'name.required' => 'A subcategory name is required',
            'name.unique' => 'This subcategory name already exist. Please enter another name'
        ]);
        if ($validator->fails()) {
            return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
        }
        $subcategory = new Subcategory;
        $subcategory->cid = $request->cate_id;
        $subcategory->name = $request->name;
        $subcategory->short_description = $request->short_description;
        $subcategory->description = $request->description;
        $subcategory->image_alt = $request->image_alt;
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        $subcategory->keywords = $request->keywords;
        if ($request->slug != null) {
            $subcategory->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)));
        } else {
            $subcategory->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)));
        }

        if ($request->hasFile('banner')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
            }
            $subcategory->banner = $request->file('banner')->store('uploads/subcategories/banner');
        }
        if ($request->hasFile('icon')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
            }
            $subcategory->icon = $request->file('icon')->store('uploads/subcategories/icon');
        }
        $subcategory->uid = Auth::user()->id;
        if ($subcategory->save()) {
            return redirect()->route('subcategory.index')->with(['status' => 'success', 'message' => 'Insert Operation Successfully Done.']);
        } else {
            return redirect()->route('subcategory.index')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $subcategory = Subcategory::where('id', $request->id)->first();
        $cateRow = Category::where('status', 1)->get();
        echo '<div class="modal-header">
            <h4 class="modal-title">Update Subcategory</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="' . route("subcategory.update") . '" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="id" value="' . $subcategory->id . '" />
            <div class="card-body">
            <div class="form-group">
            <label for="cname">Category Name</label>
            <select class="form-control" name="cate_id" required>';
        foreach ($cateRow as $cate) {
            if ($subcategory->cid == $cate->id) {
                echo '<option value="' . $cate->id . '" selected>' . $cate->name . '</option>';
            } else {
                echo '<option value="' . $cate->id . '">' . $cate->name . '</option>';
            }
        }
        echo '</select>
          </div>
          <div class="form-group">
            <label for="name">SubCategory Name</label>
            <input type="text" class="form-control" name="name" value="' . $subcategory->name . '" required>
          </div>
          <div class="form-group">
            <label for="banner">Banner</label>
            <div class="input-group row">
            <div class="custom-file col-md-8">
              <input type="file" name="banner" class="custom-file-input" accept="image/*" id="customFile">
              <label class="custom-file-label" for="customFile">Choose Banner</label>
            </div>

            <div class="col-md-4 text-center">';
            if (file_exists('storage/' . $subcategory->banner) && !empty($subcategory->banner)){
                echo '<img loading="lazy"  width="100%" height="120" src="' . url('storage/' . $subcategory->banner) . '" alt="banner">';
            }
              echo '</div>
            </div>
          </div>
           <div class="form-group">
            <label for="icon">Icon</label>
            <div class="input-group row">
             <div class="custom-file col-md-8">
              <input type="file" name="icon" accept="image/*" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose Icon</label>
            </div>
            <div class="col-md-4 text-center">';
            if (file_exists('storage/' . $subcategory->icon) && !empty($subcategory->icon)){
             echo '<img loading="lazy"  width="80" height="60" src="' . url('storage/' . $subcategory->icon) . '" alt="icon">';
            }
             echo '</div>
            </div>
          </div>
            <div class="form-group">
            <label for="slug">Category Slug</label>
            <input type="text" class="form-control" name="slug" value="' . $subcategory->slug . '" required>
          </div>
           <div class="form-group">
            <label for="short">Short Description</label>
            <textarea name="short_description" class="form-control">' . $subcategory->short_description . '</textarea>
          </div>
          <div class="form-group">
          <label for="description">Description</label>
          <textarea id="edittextarea" name="description" placeholder="Place some text here"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">' . $subcategory->description . '</textarea>
          </div>
           <div class="form-group">
            <label for="image_alt">Image Alt</label>
            <input type="text" name="image_alt" class="form-control" value="' . $subcategory->image_alt . '">
          </div>
         <div class="form-group">
            <label for="title">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="' . $subcategory->meta_title . '">
          </div>

          <div class="form-group">
            <label for="meta">Meta Description</label>
            <textarea name="meta_description" class="form-control" placeholder="Text Here">' . $subcategory->meta_description . '</textarea>
          </div>
          <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea name="keywords" class="form-control" placeholder="Text Here">' . $subcategory->keywords . '</textarea>
          </div>
        </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Records</button>
                </div>
            </form>
        </div>
        <script type="text/javascript">
  $(function() {
    $("#edittextarea").summernote()
  });
  $(function() {
    bsCustomFileInput.init();
});
  </script>';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255'
        ], [
            'name.required' => 'A subcategory name is required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
        }
        $subcategory = Subcategory::findOrFail($request->id);
        $subcategory->cid = $request->cate_id;
        $subcategory->name = $request->name;
        $subcategory->short_description = $request->short_description;
        $subcategory->description = $request->description;
        $subcategory->image_alt = $request->image_alt;
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        $subcategory->keywords = $request->keywords;
        if ($request->slug != null) {
            $subcategory->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)));
        } else {
            $subcategory->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)));
        }

        if ($request->hasFile('banner')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
            }
            if (file_exists('storage/' . $subcategory->banner) && !empty($subcategory->banner)) {
                unlink('storage/' . $subcategory->banner);
            }
            $subcategory->banner = $request->file('banner')->store('uploads/subcategories/banner');
        }
        if ($request->hasFile('icon')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
            }
            if (file_exists('storage/' . $subcategory->icon) && !empty($subcategory->icon)) {
                unlink('storage/' . $subcategory->icon);
            }
            $subcategory->icon = $request->file('icon')->store('uploads/subcategories/icon');
        }
        $subcategory->uid = Auth::user()->id;
        if ($subcategory->save()) {
            return redirect()->route('subcategory.index')->with(['status' => 'success', 'message' => 'Update Operation Successfully Done.']);
        } else {
            return redirect()->route('subcategory.index')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
        }
    }


    public function status(Request $request)
    {
        $cate = Subcategory::find($request->id);
        if ($request->type == 'featured') {
            $cate->featured = $request->status;
        } elseif ($request->type == 'top') {
            $cate->top = $request->status;
        } else {
            $cate->status = $request->status;
        }
        $cate->uid = Auth::user()->id;
        if ($cate->save()) {
            $data = [
                'status' => 'success',
            ];
        } else {
            $data = [
                'status' => 'error',
            ];
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $res = Subcategory::where('id', $request->id)->first();
        if ($res) {
            if (file_exists('storage/' . $res->banner) && !empty($res->banner)) {
                unlink('storage/' . $res->banner);
            }
            if (file_exists('storage/' . $res->icon) && !empty($res->icon)) {
                unlink('storage/' . $res->icon);
            }
            Subcategory::where('id', $request->id)->delete();
            $data = [
                'status' => 'success',
                'message' => 'Your Record has been deleted'
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => 'Something Wrong.!'
            ];
        }
        return response()->json($data);
    }
}