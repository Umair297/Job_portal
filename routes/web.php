<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PriceController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

//this is aboute route
Route::get('/about', function () {
    return view('about');
})->name('about');

//this is blog route
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

//this is blog route

// this is job detail page

Route::get('/jobdetail/{id}', [JobController::class, 'show'])->name('jobdetail');

//this is blog route
Route::get('/contact', function () {
    return view('contacts');
})->name('contacts.list');

// Default route
Route::get('/', function () {
    return view('welcome');
});
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/users', [RegisterController::class, 'index'])->name('user.index');
Route::get('/user', [RegisterController::class, 'home'])->name('users.home');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('users/create', [RegisterController::class, 'create'])->name('users.create');
Route::get('users/{user}/edit', [RegisterController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [RegisterController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [RegisterController::class, 'destroy'])->name('users.destroy');



Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}/delete', [CompanyController::class, 'destroy'])->name('companies.destroy');



Route::get('/job', [JobController::class, 'joblist'])->name('jobs.view');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.list');
Route::post('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::delete('/jobs/delete/{id}', [JobController::class, 'delete'])->name('jobs.delete');
Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');
Route::post('/jobs/update/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::get('/jobs/filter', [JobController::class, 'filterJobs'])->name('job.filter');

Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('job.apply');
Route::get('/job-applications', [JobController::class, 'indexs'])->name('job.applications.index');
Route::delete('/applications/{id}', [JobController::class, 'destroy'])->name('applications.destroy');




Route::get('/blog', [BlogController::class, 'bloglist'])->name('blog.view');
Route::get('/blogdetail/{id}', [BlogController::class, 'blogdetail'])->name('blogdetail.view'); // Show all questions

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/blogs/{id}/update', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}/delete', [BlogController::class, 'destroy'])->name('blogs.destroy');



Route::get('/tutorials', [TutorialController::class, 'index'])->name('tutorials.index');
Route::get('/tutorials/create', [TutorialController::class, 'create'])->name('tutorials.create');
Route::post('/tutorials', [TutorialController::class, 'store'])->name('tutorials.store');
Route::get('/tutorials/{id}', [TutorialController::class, 'show'])->name('tutorials.show');
Route::get('/tutorials/{id}/edit', [TutorialController::class, 'edit'])->name('tutorials.edit');
Route::put('/tutorials/{id}', [TutorialController::class, 'update'])->name('tutorials.update');
Route::delete('/tutorials/{id}', [TutorialController::class, 'destroy'])->name('tutorials.destroy');
Route::get('/toturial', [TutorialController::class, 'toturial'])->name('toturial.view');


Route::get('/pricing', [FaqController::class, 'faqlist'])->name('faq.view');
Route::get('/questions', [FaqController::class, 'index'])->name('questions.index');
Route::post('/questions', [FaqController::class, 'store'])->name('questions.store'); 
Route::put('/questions/{id}/update', [FaqController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}/delete', [FaqController::class, 'destroy'])->name('questions.destroy'); 



Route::get('/resume/create', [ResumeController::class, 'showForm'])->name('resume.create');
Route::post('/resume/create', [ResumeController::class, 'generatePdf'])->name('resume.generate');


Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');



Route::get('/chates/{receiver_id}', [ChatController::class, 'startMessages'])->name('chat.start');
Route::post('/chat/send', [ChatController::class, 'sendMessages'])->name('chat.send');
Route::get('chat/with-candidates/{job_id}', [ChatController::class, 'chatWithCandidates'])->name('chat.withCandidates');
Route::get('/chat/fetch-messages/{receiver_id}', [ChatController::class, 'fetchMessages'])->name('chat.fetchMessages');



Route::post('/pay', [PriceController::class, 'payment'])->name('pay');
Route::get('/prices', [PriceController::class, 'subscribers'])->name('subscribers');
Route::delete('/prices/{id}', [PriceController::class, 'destroy'])->name('delete.subscriber');