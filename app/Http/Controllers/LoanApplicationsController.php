<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use Illuminate\Http\Request;

class LoanApplicationsController extends Controller
{
    // Onyesha maombi yote (kwa watumiaji walioidhinishwa)
    public function index()
    {
        $user = auth()->user();
        $applications = LoanApplication::query();

        if ($user->role == 'loan_officer') {
            $applications = $applications->where('is_approved', 'pending');
        } elseif ($user->role == 'vice_chairman') {
            $applications = $applications->where('is_approved', 'approved')->whereNull('approved_by');
        } elseif ($user->role == 'chairman') {
            $applications = $applications->where('is_approved', 'approved')->whereNotNull('approved_by');
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $applications = $applications->get();

        return view('dash.loan_applications.index', compact('applications'));
    }

    // Onyesha fomu ya kuomba mkopo
    public function create()
    {
        return view('dash.loan_applications.create');
    }

    public function add()
    {
        return view('dash.loan_applications.create');
    }

    // Hifadhi ombi jipya la mkopo
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'loan_term' => 'required|integer|min:1',
        ]);

        LoanApplication::create([
            'client_id' => auth()->id(),
            'amount' => $request->amount,
            'description' => $request->description,
            'loan_term' => $request->loan_term,
            'is_approved' => 'pending',
        ]);

        return redirect()->route('loan_applications.index')->with('success', 'Loan application submitted successfully.');
    }

    // Onyesha maelezo ya ombi
    public function show($id)
    {
        $application = LoanApplication::findOrFail($id);

        return view('dash.loan_applications.show', compact('application'));
    }

    // Onyesha fomu ya kuhariri ombi
    public function edit($id)
    {
        $application = LoanApplication::findOrFail($id);

        return view('dash.loan_applications.edit', compact('application'));
    }

    // Sasisha maombi ya mkopo
    public function update(Request $request, $id)
    {
        $application = LoanApplication::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'loan_term' => 'required|integer|min:1',
        ]);

        $application->update($request->only(['amount', 'description', 'loan_term']));

        return redirect()->route('loan_applications.index')->with('success', 'Loan application updated successfully.');
    }

    // Futa ombi la mkopo
    public function destroy($id)
    {
        $application = LoanApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('loan_applications.index')->with('success', 'Loan application deleted successfully.');
    }

    // Mchakato wa approval
    public function approve(Request $request, $id)
    {
        $application = LoanApplication::findOrFail($id);
        $user = auth()->user();

        if ($user->role == 'loan_officer') {
            if ($request->approval == 'approved') {
                $application->is_approved = 'approved';
                $application->approved_by = $user->id;
            } else {
                $application->is_approved = 'rejected';
            }
        } elseif ($user->role == 'vice_chairman' && $application->is_approved == 'approved') {
            if ($request->approval == 'approved') {
                $application->is_approved = 'approved';
                $application->approved_by = $user->id;
            } else {
                $application->is_approved = 'rejected';
            }
        } elseif ($user->role == 'chairman' && $application->is_approved == 'approved') {
            if ($request->approval == 'approved') {
                $application->is_approved = 'approved';
                $application->approved_by = $user->id;
            } else {
                $application->is_approved = 'rejected';
            }
        } else {
            return response()->json(['message' => 'Unauthorized action'], 403);
        }

        $application->save();

        return redirect()->route('loan_applications.index')->with('success', 'Loan application status updated successfully.');
    }
}
