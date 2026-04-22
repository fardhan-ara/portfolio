<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $projects = Project::orderBy('order')->get();
        $skills = Skill::all();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_date', 'desc')->get();
        $testimonials = Testimonial::orderBy('order')->get();

        return view('home', compact('settings', 'projects', 'skills', 'experiences', 'educations', 'testimonials'));
    }

    public function projectDetail($id)
    {
        $project = Project::findOrFail($id);
        $settings = Setting::pluck('value', 'key');
        
        return view('project-detail', compact('project', 'settings'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string'
        ]);

        $contact = Contact::create($request->all());

        // Send email notification
        $adminEmail = Setting::where('key', 'email')->value('value') ?? 'admin@portofolio.com';
        Mail::to($adminEmail)->send(new ContactFormSubmitted($contact));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
