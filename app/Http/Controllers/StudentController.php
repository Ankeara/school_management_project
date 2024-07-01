<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $student = Student::all();
        return view ("students.index")->with("students",$student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");
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

        // Create a new student instance
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->address = $validatedData['address'];
        $student->mobile = $validatedData['mobile'];
        $student->save();

        return redirect("students")->with("flash_message", "Student Added!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = Student::find($id);
        return view ("students.show")->with("students",$student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view ("students.edit")->with("students",$student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with("Flash_message", 'student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found']);
        }

        $student->delete();

        return response()->json(['success' => true, 'message' => 'Student deleted successfully']);
    }


}
