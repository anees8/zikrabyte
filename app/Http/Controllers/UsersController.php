<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;
use App\Models\ContactDetails;
use App\Models\Review;




class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        return view('users.create-step-one',compact('user'));
    }

    public function createStepOne(Request $request)
    {
        $personalinfo = $request->session()->get('personalinfo');
  
        return view('users.create-step-one',compact('personalinfo'));
    }

    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
        ]);
        
      
    
            $personalinfo = new PersonalInfo();
            $personalinfo->fill($validatedData); // Use validated data, not $request->all()
            $request->session()->put('personalinfo', $personalinfo);
        
        return redirect()->route('users.create.step.two');
    }

    public function createStepTwo(Request $request)
    {
        $contact_detail = $request->session()->get('contact_detail');
  
        return view('users.create-step-two',compact('contact_detail'));
    }

    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:contact_details,email', // Assuming your contact_details table is named 'contact_details'
            'phone_number' => 'required|string|regex:/^\+?[0-9]*$/|min:10|max:15|unique:contact_details,phone_number', // Assuming your users table is named 'users'
        
        ]);

        $contact_detail = new ContactDetails();
      
        $contact_detail->fill($validatedData); // Use validated data, not $request->all()
        $request->session()->put('contact_detail', $contact_detail);
  
        return redirect()->route('users.create.step.three');
    }

    public function createStepThree(Request $request)
    {
        $review = $request->session()->get('review');
  
        return view('users.create-step-three',compact('review'));
    }

    public function postCreateStepThree(Request $request)
    {

        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5', // Adjust min and max values as needed
            'content' => 'required|string|max:255',
        ]);

        $review = new Review();
    
        $review->fill($validatedData); // Use validated data, not $request->all()
        $request->session()->put('review', $review);


        
        $personalinfo = $request->session()->get('personalinfo');
        $personalinfo->save();

        $contact_detail = $request->session()->get('contact_detail');
        $contact_detail->user_id= $personalinfo->id;
        $contact_detail->save();

        $review = $request->session()->get('review');
        $review->user_id= $personalinfo->id;
        $review->save();
        
  
        $request->session()->forget('review');
        $request->session()->forget('contact_detail');
        $request->session()->forget('personalinfo');
        
  
        return redirect()->route('users.index')->with('success', 'Form submitted successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
