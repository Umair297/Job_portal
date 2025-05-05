<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faqlist()
    {
        $questions = Faq::all(); 
        return view('pricing', compact('questions'));
    }




    public function index()
    {
        $questions = Faq::all();
        return view('questions.list', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'nullable',
        ]);

        Faq::create($request->all());

        return redirect('/questions')->with('success', 'Question added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'nullable',
        ]);

        $question = Faq::findOrFail($id);
        $question->update($request->all());

        return redirect('/questions')->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Faq::findOrFail($id);
        $question->delete();

        return redirect('/questions')->with('success', 'Question deleted successfully.');
    }
}
