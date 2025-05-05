<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function showForm()
    {
        return view('resume.create');
    }

    public function generatePdf(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'website' => 'required',
            'summary' => 'required',
            'role' => 'required',
            'work_experience' => 'required',
            'education' => 'required',
            'additional_info' => 'nullable',
        ]);

        // Save data to the database
        $resume = Resume::create($request->all());

        // Generate PDF
        $pdf = Pdf::loadView('resume.pdf', ['data' => $resume]);

        return $pdf->download('resume.pdf');
    }
}
