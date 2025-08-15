<?php

namespace App\Http\Controllers;

use App\Models\PerformanceReview;
use App\Models\Employee;
use Illuminate\Http\Request;

class PerformanceReviewController extends Controller
{
    public function index()
    {
        $reviews = PerformanceReview::with('employee')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('reviews.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'review_date' => 'required|date',
            'reviewer'    => 'nullable|string|max:100',
            'rating'      => 'required|integer|min:1|max:5',
            'comments'    => 'nullable|string',
        ]);

        PerformanceReview::create($request->all());
        return redirect()->route('reviews.index')->with('success', 'Review added successfully.');
    }

    public function edit(PerformanceReview $review)
    {
        $employees = Employee::all();
        return view('reviews.edit', compact('review', 'employees'));
    }

    public function update(Request $request, PerformanceReview $review)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'review_date' => 'required|date',
            'reviewer'    => 'nullable|string|max:100',
            'rating'      => 'required|integer|min:1|max:5',
            'comments'    => 'nullable|string',
        ]);

        $review->update($request->all());
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(PerformanceReview $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }

    public function show(PerformanceReview $review)
    {
        return view('reviews.show', compact('review'));
    }
}
