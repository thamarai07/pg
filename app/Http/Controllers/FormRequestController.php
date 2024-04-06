<?php

namespace App\Http\Controllers;

use App\Models\FormReqesuModel;
use Illuminate\Http\Request;

class FormRequestController extends Controller
{
    public function create_form_request(Request $request)
    {
        $validatedData = $request->validate([
            'form_request_category' => 'required|string',
            'form_request_filed_name.*' => 'required|string',
        ]);

        $formRequestData = [
            'form_request_category' => $validatedData['form_request_category'],
            'form_request_filed_name' => implode(',', $validatedData['form_request_filed_name']),
        ];

        $formRequest = FormReqesuModel::create($formRequestData);

        // Check if data has been successfully inserted
        if ($formRequest) {
            return redirect()->back()->with('success', 'Form request created successfully');
        } else {
            // Data insertion failed
            return redirect()->back()->with('failed', 'Form request failed. Please contact admin.');
        }
    }
    public function form_requests_view()
    {
        $formRequests = FormReqesuModel::paginate(2); // Fetch data with pagination
        return view('form-request-view', compact('formRequests'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $formRequests = FormReqesuModel::where('form_request_category', 'LIKE', "%$query%")
            ->orWhere('form_request_filed_name', 'LIKE', "%$query%")
            ->paginate(2);

        return view('form-request-view', compact('formRequests'));
    }

    public function edit($id)
    {
        $formRequest = FormReqesuModel::findOrFail($id);

        return view('form_requests.edit', compact('formRequest'));
    }

    public function update(Request $request, $id)
    {
        $formRequest = FormReqesuModel::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'form_request_category' => 'required|string|max:255',
            'form_request_filed_name' => 'required|string|max:255',
        ]);

        // Update the form request
        $formRequest->update($validatedData);

        // Redirect back with success message
        // Redirect back to the edit form
        return redirect()->route('form_requests.edit', $formRequest->id)->with('success', 'Form request updated successfully.');
    }
}
