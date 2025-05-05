<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'Admin') {
            // Admin can see all companies
            $companies = Company::all();
        } else {
            // Other users can only see their own companies
            $companies = Company::where('user_id', Auth::id())->get();
        }

        return view('companies.list', compact('companies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'category' => 'nullable',
            'industry' => 'nullable',
            'employees' => 'nullable',
            'description' => 'nullable',
            'services' => 'nullable',
            'registration_number' => 'nullable',
            'linkedin' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'logo' => 'nullable',
        ]);

        $company = new Company();
        $company->user_id = Auth::id();
        $company->fill($request->all());

        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
        }


        $company->save();

        return redirect()->back()->with('success', 'Company added successfully!');
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'category' => 'nullable',
            'industry' => 'nullable',
            'employees' => 'nullable',
            'description' => 'nullable',
            'services' => 'nullable',
            'products' => 'nullable',
            'registration_number' => 'nullable',
            'linkedin' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company->fill($request->all());

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $company->logo = $request->file('logo')->store('logos', 'public');
        }

      

        $company->save();

        return redirect()->back()->with('success', 'Company updated successfully!');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete logo and cover image if they exist
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        return redirect()->back()->with('success', 'Company deleted successfully!');
    }
}
