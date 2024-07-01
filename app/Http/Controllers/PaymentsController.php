<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Payments;
use App\Models\Enrollments;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
     public function index(): View
    {
        $payments = DB::table('payments')
                    ->join('enrollments', 'payments.enrollment_id', '=', 'enrollments.id')
                    ->select('payments.*', 'enrollments.enroll_no as enroll_no')
                    ->get();

        return view("payments.index")->with("payments", $payments);
    }

    public function create()
    {
        $enrollments = Enrollments::all(); // Assuming you have a Course model
        return view("payments.create", compact('enrollments'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'nullable|date',
            'amount' => 'required|numeric',
        ]);

        // Create a new payments instance
        $payments = new Payments();
        $payments->enrollment_id = $validatedData['enrollment_id'];
        $payments->paid_date = $validatedData['paid_date'];
        $payments->amount = $validatedData['amount'];
        $payments->save();

        return redirect("payments")->with("flash_message", "payments Added!!");
    }


    public function show(string $id): View
    {
        $payments = Payments::find($id);
        return view ("payments.show")->with("payments",$payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
    {
        $payments = Payments::find($id);
        $enrollments = Enrollments::all(); // Assuming you have a Course model
        return view ("payments.edit", compact('payments', 'enrollments'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate the request
         $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'nullable|date',
            'amount' => 'required|numeric',
        ]);

        $payments = Payments::find($id);
        $payments->enrollment_id = $validatedData['enrollment_id'];
        $payments->paid_date = $validatedData['paid_date'];
        $payments->amount = $validatedData['amount'];
        $payments->save();

        return redirect('payments')->with("flash_message", 'payments Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $payments = Payments::find($id);

        if (!$payments) {
            return response()->json(['success' => false, 'message' => 'payments not found']);
        }

        $payments->delete();

        return response()->json(['success' => true, 'message' => 'payments deleted successfully']);
    }
}