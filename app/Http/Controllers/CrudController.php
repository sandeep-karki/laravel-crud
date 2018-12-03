<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use App\Mail\Register;
use Mail;
use \Input as Input;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Crud::all();
        return view('crud.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required',
            'contact' => 'required|numeric',
            'section' => 'required|alpha',
            'email' => 'required|email',
            'image' => 'required|file'
        ]);

        $attributes=$request->all();
        
        //uploading image to database        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension(); // getting image extension
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/appsetting/', $filename);
                }

                $attributes['image']=$filename;
                $student = Crud::create($attributes);
                Mail::to($student)->send(new register($student));
                return redirect('/crud')->with('status', 'student added successfully.Please check the email');

            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = crud::find($id);
        return view('crud.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required',
            'contact' => 'required|numeric',
            'section' => 'required|alpha'
        ]);
        $student = Crud::find($id);
        $student->update($request->all());
        return redirect('/crud')->with('status', 'student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Crud::find($id);
        $student->delete();
        return redirect('/crud')->with('status', 'student deleted successfully');
    }

}
