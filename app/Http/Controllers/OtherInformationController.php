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

        $request->validate([
            /*passport data*/
            'country_id'           => 'required',
            'passport_id'      => 'required',
            'passport_expedition_date'      => 'required',
            'passport_expiration'       => 'required',
            'is_citizen_other_country' => 'required',
            'citizen_other_country' => 'required_unless:is_citizen_other_country,0',
            'visa_request_before' => 'required',
            'identifier_uci' => 'required_unless:visa_request_before,0',

            /*Home data*/
            'street' => 'required',
            'number' => 'required',
            'town' => 'required',
            'country_home' => 'required',
            /* Personal history data*/
            'access_denied' => 'required',
            'access_denied_comment' => 'required_unless:access_denied,0',
            'have_tuberculosis' => 'required',
            'have_tuberculosis_comment' => 'required_unless:have_tuberculosis,0',
            'health_condition' => 'required'


        ]);

        //
        $otherinformation = new OtherInformation();
        /*relation personal data*/
        $otherinformation->persona_information_id   = $request->persona_information_id;
        /*passport data*/
        $otherinformation->country_id                = $request->country_id;
        $otherinformation->passport_id               = $request->passport_id;
        $otherinformation->passport_expedition_date  = $request->passport_expedition_date;
        $otherinformation->passport_expiration_date  = $request->passport_expiration;
        $otherinformation->is_citizen_other_country  = $request->is_citizen_other_country;
        $otherinformation->citizen_other_country     = $request->citizen_other_country;
        $otherinformation->visa_request_before       = $request->visa_request_before;
        $otherinformation->identifier_uci            = $request->identifier_uci;
        /*home data*/
        $otherinformation->street                    = $request->street;
        $otherinformation->another_street            = $request->another_street;
        $otherinformation->number                    = $request->number;
        $otherinformation->apartment                 = $request->apartment;
        $otherinformation->town                      = $request->town;
        $otherinformation->country_home              = $request->country_home;
        /* Personal history data*/
        $otherinformation->access_denied             = $request->access_denied;
        $otherinformation->access_denied_comment     = $request->access_denied_comment;
        $otherinformation->have_tuberculosis         = $request->have_tuberculosis;
        $otherinformation->have_tuberculosis_comment = $request->have_tuberculosis_comment;
        $otherinformation->health_condition          = $request->health_condition;

        $otherinformation->save();

        return redirect()->route('pago');

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
