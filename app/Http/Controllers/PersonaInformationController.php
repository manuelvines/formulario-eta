<?php

namespace App\Http\Controllers;
use App\Country;
use App\PersonaInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use DB;

class PersonaInformationController extends Controller
{

    public function index(){

        $countries = Country::all();
        return view('frontend.index')
                     ->with('countries',$countries);

    }
    //
    public function store(Request $request){

        $request->validate([
            'surnames'   => 'required',
            'email'      => 'required|unique:persona_information',
            'email_confirm'  => 'same:email',
            'phone'      => 'required',
            'name'       => 'required',
            'birth_date' => 'required',
            'country_of_birth' => 'required',
            'place_of_birth' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'country_of_nationality' => 'required',
            'representative_surnames' => 'required_unless:is_minor_flag,0',
            'representative_name' => 'required_unless:is_minor_flag,0',
            'representative_representative_address' => 'required_unless:is_minor_flag,0',

        ]);


        $personalInfo = new PersonaInformation();
        $personalInfo->surnames                   = $request->surnames;
        $personalInfo->email                      = $request->email;
        $personalInfo->phone                      = $request->phone;
        $personalInfo->name                       = $request->name;
        $personalInfo->birth_date                 = $request->birth_date;
        $personalInfo->country_of_birth           = $request->country_of_birth;
        $personalInfo->place_of_birth             = $request->place_of_birth;
        $personalInfo->gender                     = $request->gender;
        $personalInfo->marital_status             = $request->marital_status;
        $personalInfo->country_of_nationality     = $request->country_of_nationality;
        $personalInfo->representative_surnames    = $request->representative_surnames;
        $personalInfo->representative_name        = $request->representative_name;
        $personalInfo->representative_address     = $request->representative_address;

        $personalInfo->save();
        //$personalInfoRegister = $this->show($personalInfo->id);

        return redirect('informacion-adicional/'.   base64_encode($personalInfo->email) );


    }

    /**
     *JOIN CON PAISES
     */
    public function show($email){
        return $personalInfo = PersonaInformation::where('email',$email)->first();
    }

    public function test($emailBase64Encode)
    {
        $countries = Country::all();
        $personalInfoRegister = $this->show(base64_decode($emailBase64Encode));
        $country_of_birth = Country::select('name')->where('id', $personalInfoRegister->country_of_birth)->first();
        $country_of_nationality = Country::select('name')->where('id', $personalInfoRegister->country_of_nationality)->first();

        return view('frontend.additional-information')
            ->with('personalInfoRegister' , $personalInfoRegister)
            ->with('country_of_nationality',$country_of_nationality)
            ->with('country_of_birth', $country_of_birth)
            ->with('countries', $countries);
    }
}
