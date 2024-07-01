<?php

namespace App\Http\Controllers;
use App\Models\Batches;
use App\Models\Student;
use App\Models\Enrollments;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(): View
    {
        $enrollmentss = DB::table('enrollments')
                    ->join('batches', 'enrollments.batches_id', '=', 'batches.id')
                    ->join('student', 'enrollments.student_id', '=', 'student.id')
                    ->select('enrollments.*', 'batches.name as batches_name', 'student.name as student_name')
                    ->get();

        return view("enrollments.index")->with("enrollments", $enrollmentss);
    }

   public function create()
    {
        $batches = Batches::all(); // Assuming you have a Batches model
        $students = Student::all(); // Assuming you have a Student model
        return view("enrollments.create", compact('batches', 'students'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'enroll_no' => 'required|unique:enrollments,enroll_no',
            'batches_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:student,id',
            'join_date' => 'required|date',
            'fee' => 'required',
            // Add other validation rules as needed
        ]);

        // Create a new enrollment instance
        $enrollments = new Enrollments();
        $enrollments->enroll_no = $validatedData['enroll_no'];
        $enrollments->batches_id = $validatedData['batches_id'];
        $enrollments->student_id = $validatedData['student_id'];
        $enrollments->join_date = $validatedData['join_date'];
        $enrollments->fee = $validatedData['fee'];
        // Set other fields if needed
        $enrollments->save();

        return redirect("enrollments")->with("flash_message", "Enrollment Added!!");
    }

    public function show(string $id)
    {
        $enrollments = DB::table('enrollments')
                    ->join('batches', 'enrollments.batches_id', '=', 'batches.id')
                    ->join('student', 'enrollments.student_id', '=', 'student.id')
                    ->select('enrollments.*', 'batches.name as batches_name', 'student.name as student_name')
                    ->where('enrollments.id', $id)
                    ->first();

        if (!$enrollments) {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found');
        }

        return view('enrollments.show', compact('enrollments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $enrollments = DB::table('enrollments')
                ->join('batches', 'enrollments.batches_id', '=', 'batches.id')
                ->join('student', 'enrollments.student_id', '=', 'student.id')
                ->select('enrollments.*', 'batches.name as batches_name', 'student.name as student_name')
                ->where('enrollments.id', $id)
                ->first();

    if (!$enrollments) {
        return redirect()->route('enrollments.index')->with('error', 'Enrollment not found');
    }

    $batches = Batches::all();
    $students = Student::all();

    return view("enrollments.edit", compact('enrollments', 'batches', 'students'));
}


    public function update(Request $request, $id): RedirectResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'enroll_no' => 'required|unique:enrollments,enroll_no,' . $id,
            'batches_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:student,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        // Find the enrollment by ID
        $enrollment = Enrollments::find($id);

        if (!$enrollment) {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found');
        }

        // Update the enrollment
        $enrollment->update($validatedData);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollments = Enrollments::find($id);

        if (!$enrollments) {
            return response()->json(['success' => false, 'message' => 'enrollments not found']);
        }

        $enrollments->delete();

        return response()->json(['success' => true, 'message' => 'enrollments deleted successfully']);
    }
}
