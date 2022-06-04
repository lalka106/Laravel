<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function review_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:30',
            'subject' => 'required|min:10|max:100',
            'message' => 'required|min:20|max:500',
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');
        $review->user_id = Auth::id();

        $review->save();

        return redirect()->route('home')->with('success', 'Отзыв добавлен');
    }

    public function ShowSingleReview($id)
    {
        $reviews = new Contact();
        return view('single-review', ['reviews' => $reviews->find($id)]);

    }

    public function ReviewUpdate($id)
    {
        $reviews = new Contact();
        return view('review-update', ['reviews' => $reviews->find($id)]);
    }

    public function ReviewUpdateSubmit($id, Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:30',
            'subject' => 'required|min:10|max:100',
            'message' => 'required|min:20|max:500',
        ]);

        $review = new Contact();
        $review = $review->find($id);
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');
        $review->user_id = Auth::id();

        $review->save();

        return redirect()->route('single-review', $id)->with('success', 'Отзыв обновлен');
    }

    public function ReviewDelete($id)
    {
        $review = new Contact();
        $review = $review->find($id)->delete();
//        $review = $review->delete();
        return redirect()->route('review')->with('success', 'Отзыв удален');

    }
}
