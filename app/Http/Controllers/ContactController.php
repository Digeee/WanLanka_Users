<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return redirect()->route('contact.show');
    }
    public function showForm()
    {
        return view('contact'); // This will be a separate page
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'message'        => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.show')->with('success', 'Your message has been sent!');
    }
}
