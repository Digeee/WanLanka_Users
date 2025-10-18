<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class CustomerReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('customer_reviews', ['reviews' => $reviews]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        Review::create([
            'name' => $request->input('name'),
            'review' => $request->input('review'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}