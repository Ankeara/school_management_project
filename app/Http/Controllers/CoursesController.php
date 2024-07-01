<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\View\View;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::all();
        return view ("courses.index")->with("courses",$courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("courses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:255',
            'duration' => 'required|string|max:155',
        ]);

        // Create a new teacher instance
        $courses = new Courses();
        $courses->name = $validatedData['name'];
        $courses->syllabus = $validatedData['syllabus'];
        $courses->duration = $validatedData['duration'];
        $courses->save();

        return redirect("courses")->with("flash_message", "course Added!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $courses = Courses::find($id);
        return view ("courses.show")->with("courses",$courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Courses::find($id);
        return view ("courses.edit")->with("courses",$courses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courses = Courses::find($id);
        $input = $request->all();
        $courses->update($input);
        return redirect('courses')->with("Flash_message", 'courses Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courses = Courses::find($id);

        if (!$courses) {
            return response()->json(['success' => false, 'message' => 'courses not found']);
        }

        $courses->delete();

        return response()->json(['success' => true, 'message' => 'courses deleted successfully']);
    }
}
