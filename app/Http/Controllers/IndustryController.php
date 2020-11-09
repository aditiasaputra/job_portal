<?php

namespace App\Http\Controllers;

use App\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::all();
        $title = 'Industry';
        return view('industry.index', compact('title', 'industries'));
    }

    public function createIndustry(Request $request)
    {
        Industry::updateOrCreate($request->all());
        return redirect()->back()->with('success', 'Industry has been saved!');
    }

    public function editIndustry($id)
    {
        return response()->json(Industry::find($id));
    }

    public function deleteIndustry($id)
    {
        Industry::find($id)->delete();
        return redirect()->back()->with('success', 'Industry has been deleted!');
    }
}
