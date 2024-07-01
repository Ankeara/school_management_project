<?php

namespace App\Http\Controllers;
use App\Models\Batches;
use App\Models\Courses;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $batches = DB::table('batches')
                    ->join('courses', 'batches.course_id', '=', 'courses.id')
                    ->select('batches.*', 'courses.name as course_name')
                    ->get();

        return view("batches.index")->with("batches", $batches);
    }

    public function create()
    {
        $courses = Courses::all(); // Assuming you have a Course model
        return view("batches.create", compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'nullable|date',
        ]);

        // Create a new batch instance
        $batch = new Batches();
        $batch->name = $validatedData['name'];
        $batch->course_id = $validatedData['course_id'];
        $batch->start_date = $validatedData['start_date'];
        $batch->save();

        return redirect("batches")->with("flash_message", "Batch Added!!");
    }


    public function show(string $id): View
    {
        $batches = Batches::find($id);
        return view ("batches.show")->with("batches",$batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $batches = Batches::find($id);
    $courses = Courses::all(); // Assuming you have a Course model
    return view ("batches.edit", compact('batches', 'courses'));
}

public function update(Request $request, string $id): RedirectResponse
{
    // Validate the request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
        'start_date' => 'nullable|date',
    ]);

    $batch = Batches::find($id);
    $batch->name = $validatedData['name'];
    $batch->course_id = $validatedData['course_id'];
    $batch->start_date = $validatedData['start_date'];
    $batch->save();

    return redirect('batches')->with("flash_message", 'Batch Updated!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $batches = Batches::find($id);

        if (!$batches) {
            return response()->json(['success' => false, 'message' => 'batches not found']);
        }

        $batches->delete();

        return response()->json(['success' => true, 'message' => 'batches deleted successfully']);
    }
}