<?php
namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Admin and Super Admin can see all leave requests
        if ($user->role === 'admin' || $user->role === 'super-admin') {
            $leaves = Leave::with('user', 'leaveType')->orderBy('created_at', 'desc')->get();
        } else {
            // Employees see only their own leave requests
            $leaves = Leave::where('user_id', $user->id)->with('leaveType')->orderBy('created_at', 'desc')->get();
        }

        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('leaves.create', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        Leave::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave request submitted successfully.');
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $leave->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Leave status updated.');
    }
}
