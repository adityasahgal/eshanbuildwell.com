<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CalculatorEnquiry;
use App\Models\CalculatorPricing;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Service;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\IpUtils;

class MainController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function bim_training()
    {
        return view('frontend.bim-training');
    }

    public function projects()
    {
        return view('frontend.projects');
    }

    public function calculator()
    {
        $categories = ['Residential', 'Commercial', 'Industrial'];
        foreach ($categories as $cat) {
            CalculatorPricing::firstOrCreate(
                ['category' => $cat],
                [
                    'structure_basic' => 1100, 'structure_standard' => 1400, 'structure_premium' => 1800,
                    'finishing_basic' => 500,  'finishing_standard' => 800,  'finishing_premium' => 1200,
                    'mep_basic'       => 200,  'mep_standard'       => 300,  'mep_premium'       => 450,
                    'facade_basic'    => 150,  'facade_standard'    => 250,  'facade_premium'    => 400,
                    'external_basic'  => 150,  'external_standard'  => 250,  'external_premium'  => 400,
                    'location_metro'  => 1.10, 'location_urban'     => 1.00, 'location_hill'     => 1.20,
                    'basement_multiplier' => 1.50,
                    'contingency_rate'   => 5.00,
                ]
            );
        }

        $allPricings = CalculatorPricing::all()->keyBy('category');
        return view('frontend.calculator', compact('allPricings'));
    }

    public function about_us()
    {
        return view('frontend.about-us');
    }

    public function privacy_policy()
    {
        return view('frontend.privacy-policy');
    }

    public function contact_us()
    {
        return view('frontend.contact-us');
    }

    public function blog()
    {
        return view('frontend.blog');
    }
    public function termcondition()
    {
        return view('frontend.terms-condition');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function help()
    {
        return view('frontend.help');
    }
    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function blog_details($slug)
    {
        $blogDetail = Blog::where('status', 1)->where('slug', $slug)->first();
        if ($blogDetail) {
            return view('frontend.blog-detail', compact('blogDetail'));
        }
        return abort(404);
    }

    public function getCateSlug($cateSlug)
    {
        $category = Category::where('status', 1)->where('slug', $cateSlug)->first();
        if ($category) {
            return view('frontend.view-category', ['categories' => $category]);
        }
        return abort(404);
    }

    public function getSubcateSlug($cateSlug, $subcateSlug)
    {
        $category = Category::where('status', 1)->where('slug', $cateSlug)->first();
        if (!$category) {
            return abort(404);
        }
        $subcategory = Subcategory::where('status', 1)->where('slug', $subcateSlug)->first();
        if ($subcategory) {
            return view('frontend.view-subcategory', ['categories' => $subcategory]);
        } else {
            return abort(404);
        }
        return abort(404);
    }

    public function getServiceSlug($cateSlug, $subcateSlug, $slug)
    {
        $category = Category::where('status', 1)->where('slug', $cateSlug)->first();
        $subcategory = Subcategory::where('status', 1)->where('slug', $subcateSlug)->first();
        $product = Service::where('status', 1)->where('slug', $slug)->first();

        if (!$category || !$subcategory) {
            return abort(404);
        }

        if ($product) {
            return view('frontend.view-product', ['productrow' => $product]);
        }

        return abort(404);
    }

    public function storeCalculatorEnquiry(Request $request)
    {
        $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|max:255',
            'phone'              => 'required|string|max:20',
            'total_cost'         => 'required|numeric|min:0',
        ]);

        CalculatorEnquiry::create([
            'name'               => $request->name,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'project_type'       => $request->project_type       ?? 'Residential',
            'plot_length'        => $request->plot_length        ?? 0,
            'plot_width'         => $request->plot_width         ?? 0,
            'plot_area'          => $request->plot_area          ?? 0,
            'builtup_per_floor'  => $request->builtup_per_floor  ?? 0,
            'total_floors'       => $request->total_floors       ?? 1,
            'total_builtup'      => $request->total_builtup      ?? 0,
            'basement_required'  => $request->basement_required  ?? 'No',
            'basement_area'      => $request->basement_area      ?? 0,
            'structure_quality'  => $request->structure_quality  ?? 'Standard',
            'finishing_quality'  => $request->finishing_quality  ?? 'Standard',
            'mep_quality'        => $request->mep_quality        ?? 'Standard',
            'facade_type'        => $request->facade_type        ?? 'Standard',
            'external_dev'       => $request->external_dev       ?? 'Standard',
            'location'           => $request->location           ?? 'Urban',
            'contingency'        => $request->contingency        ?? 'No',
            'structure_cost'     => $request->structure_cost     ?? 0,
            'basement_cost'      => $request->basement_cost      ?? 0,
            'finishing_cost'     => $request->finishing_cost     ?? 0,
            'mep_cost'           => $request->mep_cost           ?? 0,
            'facade_cost'        => $request->facade_cost        ?? 0,
            'external_cost'      => $request->external_cost      ?? 0,
            'location_factor'    => $request->location_factor    ?? 0,
            'contingency_amount' => $request->contingency_amount ?? 0,
            'total_cost'         => $request->total_cost,
        ]);

        return response()->json(['success' => true, 'message' => 'Enquiry stored successfully.']);
    }

    public function showEnquiryModal(Request $request)
    {
        $data = Service::find($request->id);
        return view('frontend.showEnquiryForm', compact('data'));
    }

    public function storeEnquiry(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'message' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA to proceed.'
        ]);

        if (!$this->verifyRecaptcha($request->input('g-recaptcha-response'))) {
            return redirect()->back()->with(['status' => 'danger', 'message' => 'ReCaptcha verification failed.'])->withInput();
        }

        try {
            $enquiry = new Enquiry();
            $enquiry->pname = $request->pname;
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->phone = $request->phone;
            $enquiry->message = $request->message;

            if ($enquiry->save()) {
                return redirect()->back()->with(['status' => 'success', 'message' => 'Your enquiry has been sent successfully.']);
            } else {
                return redirect()->back()->with(['status' => 'danger', 'message' => 'Something went wrong.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    public function enquiry(Request $request)
    {
        $rules = [
            'g-recaptcha-response' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'message' => 'required',
        ];

        $customMessages = [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA to proceed.',
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone must be a valid number.',
            'phone.digits_between' => 'The phone number must be between 10 and 15 digits.',
            'message.required' => 'The message field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!$this->verifyRecaptcha($request->input('g-recaptcha-response'))) {
            return redirect()->back()->with(['status' => 'danger', 'message' => 'ReCaptcha verification failed.'])->withInput();
        }

        try {
            // Create and save the enquiry
            $enquiry = new Enquiry();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->phone = $request->phone;
            $enquiry->message = $request->message;

            if ($enquiry->save()) {
                return redirect()->back()->with(['status' => 'success', 'message' => 'Your enquiry has been sent successfully.']);
            } else {
                return redirect()->back()->with(['status' => 'danger', 'message' => 'Something went wrong.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    private function verifyRecaptcha($token)
    {
        $secret = config('captcha.secret_key');
        if (!$secret) {
            // Fallback to env if config not set correctly
            $secret = env('GOOGLE_CAPTCHA_SECRET_KEY');
        }
        
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        return $response->json('success');
    }
}
