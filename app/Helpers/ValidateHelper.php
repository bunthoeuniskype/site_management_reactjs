<?php
namespace App\Helpers;
use Validator;

class ValidateHelper{

	static function offerValidate($request)
	{
		return Validator::make($request->all(),[
			'offer_name' => 'required',
			'location' => 'required',
			'price_per_person' => 'required',			
			'number_participant' => 'required|numeric',		
			'weather' => 'required',	
			'start_date' => 'required',
            'recurrent_type_month'=>'required',
            'recurrent_type_day'=>'required',
            'recurrent_type_week'=>'required'
			],[
				'offer_name.required' => trans('message.offer_name_no_blank'),
				'location.required' => trans('message.location_no_blank'),
				'price_per_person.required' => trans('message.price_no_blank'),
				'weather.required' => trans('message.weather_no_blank'),
				'number_participant.required' => trans('message.participant_no_blank'),
				'number_participant.numeric' => trans('message.number_participants_numeric'),
				'start_date.required' => trans('message.startdate_no_blank'),
                'start_date.date'=>trans('message.startdate_wrong'),
                'recurrent_type_day.required'=>trans('message.recurrent_type_day_no_select'),
                'recurrent_type_week.required'=>trans('message.recurrent_type_month_no_select'),
                'recurrent_type_month.required'=>trans('message.recurrent_type_month_no_select')
			]);
	}

    static function offerValidateEdit($request)
    {
        return Validator::make($request->all(),[
            'offer_name' => 'required',
            'location' => 'required',
            'price_per_person' => 'required',
            'number_participant' => 'required|numeric',
            'weather' => 'required',
            'start_date' => 'required'
        ],[
            'offer_name.required' => trans('message.offer_name_no_blank'),
            'location.required' => trans('message.location_no_blank'),
            'price_per_person.required' => trans('message.price_no_blank'),
            'weather.required' => trans('message.weather_no_blank'),
            'number_participant.required' => trans('message.participant_no_blank'),
            'number_participant.numeric' => trans('message.number_participants_numeric'),
            'start_date.required' => trans('message.startdate_no_blank'),
            'start_date.date'=>trans('message.startdate_wrong')
        ]);
    }
}