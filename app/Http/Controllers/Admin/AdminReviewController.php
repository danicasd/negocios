<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with([
                'user',
                'booking.service'
            ])
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleStatus(Review $review)
    {
        $review->update([
            'status' => !$review->status,
        ]);

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Estado de la reseña actualizado correctamente.');
    }
}