<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:category-create|category-edit|category-delete|category-publish', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-publish', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::with(['users'])->orderBy('created_at', 'DESC')->where('name', 'LIKE', "%{$request->search}%")
                ->paginate(10);
            return view('admin.category.dataTable', compact('data'))->render();
        } else {
            $data = Category::with(['users'])->orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.category.index', compact('data'));
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
            'name' => 'required|unique:categories,name|max:255'
        ], [
            'name.required' => 'A category name is required',
            'name.unique' => 'This category name already exist. Please enter another name'
        ]);
        if ($validator->fails()) {
            return redirect()->route('category.index')->withErrors($validator)->withInput();
        }
        $category = new Category();
        $category->name = $request->name;
        $category->short_description = $request->short_description;
        $category->description = $request->description;
        $category->image_alt = $request->image_alt;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->keywords = $request->keywords;
        if ($request->slug != null) {
            $category->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)));
        } else {
            $category->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)));
        }

        if ($request->hasFile('banner')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('category.index')->withErrors($validator)->withInput();
            }
            $category->banner = $request->file('banner')->store('uploads/categories/banner');
        }
        if ($request->hasFile('icon')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('category.index')->withErrors($validator)->withInput();
            }
            $category->icon = $request->file('icon')->store('uploads/categories/icon');
        }

        $category->uid = Auth::user()->id;
        if ($category->save()) {
            return redirect()->route('category.index')->with(['status' => 'success', 'message' => 'Insert Operation Successfully Done.']);
        } else {
            return redirect()->route('category.index')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        echo '<div class="modal-header">
            <h4 class="modal-title">Update Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="' . route("category.update") . '" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="id" value="' . $category->id . '" />
            <div class="card-body">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" class="form-control" name="name" value="' . $category->name . '" required>
            </div>
            <div class="form-group">
              <label for="banner">Banner</label>
              <div class="input-group row">
              <div class="custom-file col-md-8">
                <input type="file" name="banner" class="custom-file-input" accept="image/*" id="customFile">
                <label class="custom-file-label" for="customFile">Choose Banner</label>
              </div>

              <div class="col-md-4 text-center">';
              if (file_exists('storage/' . $category->banner) && !empty($category->banner)){
                echo '<img loading="lazy"  width="100%" height="120" src="' . url('storage/' . $category->banner) . '" alt="banner">';
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
              if (file_exists('storage/' . $category->icon) && !empty($category->icon)){
               echo '<img loading="lazy"  width="80" height="60" src="' . url('storage/' . $category->icon) . '" alt="icon">';
              }
             echo '</div>
               
              </div>
            </div>

              <div class="form-group">
              <label for="slug">Category Slug</label>
              <input type="text" class="form-control" name="slug" value="' . $category->slug . '" required>
            </div>
             <div class="form-group">
              <label>Short Description</label>
              <textarea name="short_description" class="form-control">' . $category->short_description . '</textarea>
            </div>
            <div class="form-group">
            <label for="description">Description</label>
            <textarea id="edittextarea" name="description" placeholder="Place some text here"
            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">' . $category->description . '</textarea>
            </div>
             <div class="form-group">
              <label for="image_alt">Image Alt</label>
              <input type="text" name="image_alt" class="form-control" value="' . $category->image_alt . '">
            </div>
           <div class="form-group">
              <label for="meta_title">Meta Title</label>
              <input type="text" name="meta_title" class="form-control" value="' . $category->meta_title . '">
            </div>

            <div class="form-group">
              <label for="meta_description">Meta Description</label>
              <textarea name="meta_description" class="form-control" placeholder="Text Here">' . $category->meta_description . '</textarea>
            </div>
            <div class="form-group">
              <label for="keywords">Keywords</label>
              <textarea name="keywords" class="form-control" placeholder="Text Here">' . $category->keywords . '</textarea>
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255'
        ], [
            'name.required' => 'A category name is required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('category.index')->withErrors($validator)->withInput();
        }
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->short_description = $request->short_description;
        $category->description = $request->description;
        $category->image_alt = $request->image_alt;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->keywords = $request->keywords;
        if ($request->slug != null) {
            $category->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)));
        } else {
            $category->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)));
        }

        if ($request->hasFile('banner')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('category.index')->withErrors($validator)->withInput();
            }
            if (file_exists('storage/' . $category->banner) && !empty($category->banner)) {
                unlink('storage/' . $category->banner);
            }
            $category->banner = $request->file('banner')->store('uploads/categories/banner');
        }
        if ($request->hasFile('icon')) {
            $validator = Validator::make($data, [
                'banner' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            if ($validator->fails()) {
                return redirect()->route('category.index')->withErrors($validator)->withInput();
            }
            if (file_exists('storage/' . $category->icon) && !empty($category->icon)) {
                unlink('storage/' . $category->icon);
            }
            $category->icon = $request->file('icon')->store('uploads/categories/icon');
        }
        $category->uid = Auth::user()->id;
        if ($category->save()) {
            return redirect()->route('category.index')->with(['status' => 'success', 'message' => 'Update Operation Successfully Done.']);
        } else {
            return redirect()->route('category.index')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
        }
    }


    public function status(Request $request)
    {
        $cate = Category::find($request->id);
        if ($request->type == 'featured'){
            $cate->featured = $request->status;
        }
        elseif ($request->type == 'top'){
            $cate->top = $request->status;
        }
        else{
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $res = Category::where('id', $request->id)->first();
        if ($res) {
            if (file_exists('storage/' . $res->banner) && !empty($res->banner)) {
                unlink('storage/' . $res->banner);
            }
            if (file_exists('storage/' . $res->icon) && !empty($res->icon)) {
                unlink('storage/' . $res->icon);
            }
            Category::where('id', $request->id)->delete();
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
