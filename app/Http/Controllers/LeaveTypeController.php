<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return view('leave-types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('leave-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_days' => 'required|integer|min:1',
        ]);

        LeaveType::create($request->only('name', 'max_days'));

        return redirect()->route('leave-types.index')->with('success', 'Leave type created successfully.');
    }

    public function edit(LeaveType $leaveType)
    {
        return view('leave-types.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_days' => 'required|integer|min:1',
        ]);

        $leaveType->update($request->only('name', 'max_days'));

        return redirect()->route('leave-types.index')->with('success', 'Leave type updated successfully.');
    }
}
