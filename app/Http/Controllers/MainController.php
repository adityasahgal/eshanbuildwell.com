<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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

    public function projects()
    {
        return view('frontend.projects');
    }

    public function calculator()
    {
        $pricing = CalculatorPricing::firstOrCreate(
            ['id' => 1],
            [
                'structure_basic' => 1100, 'structure_standard' => 1450, 'structure_premium' => 1900,
                'finishing_basic' => 500,  'finishing_standard' => 800,  'finishing_premium' => 1250,
                'mep_basic'       => 200,  'mep_standard'       => 350,  'mep_premium'       => 550,
                'facade_basic'    => 105,  'facade_standard'    => 180,  'facade_premium'    => 280,
                'external_basic'  => 0,    'external_standard'  => 80,   'external_premium'  => 150,
                'location_metro'  => 1.10, 'location_urban'     => 1.00, 'location_hill'     => 1.20,
            ]
        );
        return view('frontend.calculator', compact('pricing'));
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

    public function showEnquiryModal(Request $request)
    {
        $data = Service::find($request->id);
        return view('frontend.showEnquiryForm', compact('data'));
    }

    public function storeEnquiry(Request $request)
    {
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
            'recaptcha' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'message' => 'required',
        ];
        $customMessages = [
            'recaptcha.required' => 'Please complete the reCAPTCHA to proceed.',
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
}
