<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaints::all();

        return view('website.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.complaints.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'title' => ['required', 'string', 'max:255'],
    //         'description' => ['required', 'longText'],
    //     ]);

    //     $complaint = Complaints::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //     ]);

    //     $complaint->save();

    //     return redirect('sent');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title'          =>  'required',
            'description'         =>  'required'
        ]);

        $user = Auth::user();

        $complaints = new Complaints;

        $complaints->title = $request->title;
        $complaints->description = $request->description;
        // Assign the user's ID to the user_id column
        $complaints->user_id = $user->id;

        $complaints->save();

        return redirect()->route('sent.index')->with('success', 'complaint Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $complaints = Complaints::find($id);

        return view('complaints.edit', compact('complaints'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $complaints = Complaints::find($id);

        return view('website.complaints.edit', compact('complaints'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $complaints = Complaints::find($id);

        $complaints->title = $request->title;
        $complaints->description = $request->description;

        $complaints->save();

        return redirect()->route('complaints.edit', $complaints->id)->with('success', 'Complaint Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaints $complaints)
    {
        $complaints->delete();

        return redirect()->route('complaints.index')->with('success', 'Complaint Deleted Successfully');
    }
}
