<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    public function getData()
    {
        $data = Hospital::all();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Patient::with('hospital')->get();

        return view('pages.hospital.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        return view('pages.hospital.create', compact('hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hospital_id' => 'required|integer',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $patient = Patient::create($request->all());

        if ($patient) {
            return redirect()->route('hospital.index')->with('success', 'Patient added successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
    }

    public function customEdit($id)
    {
        $item = Patient::findOrFail($id);

        return view('pages.hospital.edit', compact('item'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hospital_id' => 'integer',
            'name' => 'string',
            'address' => 'string',
            'phone' => 'string',
        ]);

        $patient = Patient::findOrFail($id);

        if ($patient) {
            $patient->update($request->all());
            return redirect()->route('hospital.index')->with('success', 'Patient updated successfully');
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('hospital.index')->with('success', 'Patient deleted successfully');
    }
}
