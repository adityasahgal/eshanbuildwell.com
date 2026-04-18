<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:service-create|service-edit|service-delete|service-publish', ['only' => ['index']]);
        $this->middleware('permission:service-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
        $this->middleware('permission:service-publish', ['only' => ['status']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q       = $request->search;
            $status  = $request->status;
            $records = $request->records ?? 10;

            $data = Service::with(['users'])
                ->when(!empty($q), fn($qry) => $qry->where('name', 'LIKE', "%{$q}%"))
                ->when($status !== null && $status !== '', fn($qry) => $qry->where('status', $status))
                ->orderBy('created_at', 'DESC')
                ->paginate($records);

            return view('admin.service.dataTable', compact('data'))->render();
        }

        $data = Service::with(['users'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.service.index', compact('data'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->route('service.create')->withErrors($validator)->withInput();
            }

            $service          = new Service();
            $service->name    = $request->name;
            $service->service_badge = $request->service_badge;
            $service->status  = 1;

            // Spartan image picker submits as array thumbnail_img[]
            $files = $request->file('thumbnail_img');
            if (!empty($files) && is_array($files) && isset($files[0])) {
                $service->thumbnail_img = $files[0]->store('uploads/services/thumbnail', 'public');
            } elseif ($request->hasFile('thumbnail_img') && !is_array($request->file('thumbnail_img'))) {
                $service->thumbnail_img = $request->file('thumbnail_img')->store('uploads/services/thumbnail', 'public');
            }

            $service->short_description   = $request->short_description;
            $service->service_card_points = $request->service_card_points;
            $service->service_cta_text    = $request->service_cta_text ?: 'Get in touch';
            $service->service_cta_link    = $request->service_cta_link ?: url('contact-us');
            $service->description         = $request->description;
            $service->service_page_order  = $request->service_page_order ?: 1;
            $service->show_on_services_page = $request->has('show_on_services_page') ? 1 : 0;
            $service->uid                 = Auth::id();

            $service->save();

            return redirect()->route('service.index')
                ->with(['status' => 'success', 'message' => 'Service added successfully.']);
        } catch (Exception $e) {
            return redirect()->route('service.create')
                ->with(['status' => 'error', 'message' => $e->getMessage()])->withInput();
        }
    }

    public function edit(Request $request)
    {
        $product = Service::with(['users'])->findOrFail(Crypt::decrypt($request->id));
        return view('admin.service.edit', compact('product'));
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->route('service.edit', $request->id)->withErrors($validator)->withInput();
            }

            $service       = Service::findOrFail(Crypt::decrypt($request->id));
            $service->name = $request->name;
            $service->service_badge = $request->service_badge;

            // Handle new image upload
            $files = $request->file('thumbnail_img');
            if (!empty($files) && is_array($files) && isset($files[0])) {
                if (!empty($service->thumbnail_img)) {
                    Storage::disk('public')->delete($service->thumbnail_img);
                }
                $service->thumbnail_img = $files[0]->store('uploads/services/thumbnail', 'public');
            } elseif ($request->hasFile('thumbnail_img') && !is_array($request->file('thumbnail_img'))) {
                if (!empty($service->thumbnail_img)) {
                    Storage::disk('public')->delete($service->thumbnail_img);
                }
                $service->thumbnail_img = $request->file('thumbnail_img')->store('uploads/services/thumbnail', 'public');
            } elseif ($request->filled('previous_thumbnail_img')) {
                $service->thumbnail_img = $request->previous_thumbnail_img;
            } else {
                // User removed image — clear it
                $service->thumbnail_img = null;
            }

            $service->short_description   = $request->short_description;
            $service->service_card_points = $request->service_card_points;
            $service->service_cta_text    = $request->service_cta_text ?: 'Get in touch';
            $service->service_cta_link    = $request->service_cta_link ?: url('contact-us');
            $service->description         = $request->description;
            $service->service_page_order  = $request->service_page_order ?: 1;
            $service->show_on_services_page = $request->has('show_on_services_page') ? 1 : 0;
            $service->uid                 = Auth::id();

            $service->save();

            return redirect()->route('service.index')
                ->with(['status' => 'success', 'message' => 'Service updated successfully.']);
        } catch (Exception $e) {
            return redirect()->route('service.edit', $request->id)
                ->with(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function status(Request $request)
    {
        try {
            $service = Service::findOrFail($request->id);

            if ($request->type === 'service_page') {
                $service->show_on_services_page = $request->status;
            } elseif ($request->type === 'featured') {
                $service->featured = $request->status;
            } elseif ($request->type === 'top') {
                $service->top = $request->status;
            } else {
                $service->status = $request->status;
            }

            $service->uid = Auth::id();
            $service->save();

            return response()->json(['status' => 'success']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $service = Service::findOrFail($request->id);

            if (!empty($service->thumbnail_img)) {
                Storage::disk('public')->delete($service->thumbnail_img);
            }

            $service->delete();

            return response()->json(['status' => 'success', 'message' => 'Service deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
