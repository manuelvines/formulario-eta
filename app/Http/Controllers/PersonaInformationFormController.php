<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonaInformationForm;

class PersonaInformationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalInfoForm = PersonaInformationForm::all()->first();
        if($personalInfoForm != null){


            return  view('backend.persona-information.edit')
                       ->with('personalInfoForm', $personalInfoForm);
        }else{
            return  view('backend.persona-information.save');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personalInfoForm = PersonaInformationForm::all()->first();
        if($personalInfoForm != null){

            return  view('backend.persona-information.edit')
                ->with('personalInfoForm', $personalInfoForm);


        }else{
            return  view('backend.persona-information.save');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $personalInfoForm = new PersonaInformationForm;
        $personalInfoForm->info_surnames                  = $request->info_surnames;
        $personalInfoForm->info_email                     = $request->info_email;
        $personalInfoForm->info_phone                     = $request->info_phone;
        $personalInfoForm->info_name                      = $request->info_name;
        $personalInfoForm->info_birth_date                = $request->info_birth_date;
        $personalInfoForm->info_country_of_birth          = $request->info_country_of_birth;
        $personalInfoForm->info_place_of_birth            = $request->info_place_of_birth;
        $personalInfoForm->info_gender                    = $request->info_gender;
        $personalInfoForm->info_marital_status            = $request->info_marital_status;
        $personalInfoForm->info_country_of_nationality    = $request->info_country_of_nationality;
        $personalInfoForm->info_representative_surnames   = $request->info_representative_surnames;
        $personalInfoForm->info_representative_name       = $request->info_representative_name;
        $personalInfoForm->info_representative_address    = $request->info_representative_address;
        $personalInfoForm->save();
        return redirect()->route('persona.index');
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
        //

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

         return $request->gender;
        //
        $personalInfoForm = PersonaInformationForm::find($id);
        $personalInfoForm->info_surnames                  = $request->info_surnames;
        $personalInfoForm->info_email                     = $request->info_email;
        $personalInfoForm->info_phone                     = $request->info_phone;
        $personalInfoForm->info_name                      = $request->info_name;
        $personalInfoForm->info_birth_date                = $request->info_birth_date;
        $personalInfoForm->info_country_of_birth          = $request->info_country_of_birth;
        $personalInfoForm->info_place_of_birth            = $request->info_place_of_birth;
        $personalInfoForm->info_gender                    = $request->info_gender;
        $personalInfoForm->info_marital_status            = $request->info_marital_status;
        $personalInfoForm->info_country_of_nationality    = $request->info_country_of_nationality;
        $personalInfoForm->info_representative_surnames   = $request->info_representative_surnames;
        $personalInfoForm->info_representative_name       = $request->info_representative_name;
        $personalInfoForm->info_representative_address    = $request->info_representative_address;
        $personalInfoForm->save();
        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
