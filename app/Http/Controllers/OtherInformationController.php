<?php

namespace App\Http\Controllers;

use App\OtherInformation;
use Illuminate\Http\Request;

class OtherInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $otherinformation = new OtherInformation();
        $otherinformation->persona_information_id   = $request->persona_information_id;
        $otherinformation->country_id               = $request->country_id;

        $otherinformation->passport_id              = $request->passport_id;
        $otherinformation->passport_expedition_date = $request->passport_expedition_date;
        $otherinformation->passport_expiration_date = $request->passport_expiration;
        $otherinformation->is_citizen_other_country = $request->is_citizen_other_country;
        $otherinformation->citizen_other_country    = $request->citizen_other_country;
        $otherinformation->visa_request_before      = $request->visa_request_before;
        $otherinformation->identifier_uci           = $request->identifier_uci;

        $otherinformation->save();

        return "debemos mandar al form de pago";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherInformation  $otherInformation
     * @return \Illuminate\Http\Response
     */
    public function show(OtherInformation $otherInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherInformation  $otherInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherInformation $otherInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherInformation  $otherInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherInformation $otherInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherInformation  $otherInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherInformation $otherInformation)
    {
        //
    }
}
