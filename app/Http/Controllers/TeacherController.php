<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teacher = Teacher::all();
        return view ("teachers.index")->with("teachers",$teacher);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
        ]);

        // Create a new teacher instance
        $teacher = new teacher();
        $teacher->name = $validatedData['name'];
        $teacher->address = $validatedData['address'];
        $teacher->mobile = $validatedData['mobile'];
        $teacher->save();

        return redirect("teachers")->with("flash_message", "teacher Added!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teacher = Teacher::find($id);
        return view ("teachers.show")->with("teachers",$teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::find($id);
        return view ("teachers.edit")->with("teachers",$teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with("Flash_message", 'teacher Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teachers = Teacher::find($id);

        if (!$teachers) {
            return response()->json(['success' => false, 'message' => 'teacher not found']);
        }

        $teachers->delete();

        return response()->json(['success' => true, 'message' => 'teacher deleted successfully']);
    }
}
