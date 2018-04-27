<?php
namespace App\Helpers;
use DateTime;
//use function MongoDB\BSON\fromJSON;
use stdClass;
use Storage;
use Cache;

class Helpers{

	static function randomNum($digits_needed)
	{
	 $random_number=''; // set up a blank string
	 $count=0;
		while ( $count < $digits_needed ) {
		    $random_digit = mt_rand(0, 9);	    
		    $random_number .= $random_digit;
		    $count++;
		}
		return $random_number;
	}

	static function isDeferred(){

	}

	static function offerFormatEdit($date){
		return date('d/m/Y',strtotime($date));
	}
	
	static function formatDateOffer($date)
	{
		return date('M d, Y',strtotime($date));
	}


	static function convertDateOfferCart($date)
	{
		return date('M d, Y',strtotime($date));
	}

	static function convertDateInvite($date)
	{
		return date('d. m. Y',strtotime($date));
	}

	static function convertDateOffer($dateH)
	{
		//yyyy-mm-dd H:i
		if(isset($dateH)){
			$datearr = explode(" ", $dateH);
			$h =  isset($datearr[1]) ? $datearr[1] : '00:00';
			$date =  $datearr[0];
			$date_array = explode("/",$date); // split the array
			$var_day = $date_array[0]; //day seqment
			$var_month = $date_array[1]; //month segment
			$var_year = $date_array[2]; //year segment
			$new_date_format = "$var_year-$var_month-$var_day $h"; // join them together
			return $new_date_format;
		}
		return null;
	}

	static function getNumberOfWeek($week,$month,$year)
    {

        $firstday = date("W", mktime(0, 0, 0, $month, (-7)+$week*7, $year));
        return $firstday;
    }

    static function countweeks($month, $year){
        $firstday = date("w", mktime(0, 0, 0, $month, 1, $year));
        $lastday = date("t", mktime(0, 0, 0, $month, 1, $year));
        $count_weeks =(int) 1 + ceil(($lastday-8+$firstday)/7);
        return $count_weeks;
    }

    static function convertDate($date)
	{
		//yyyy-mm-dd
		if(isset($date)){			
			$date_array = explode("/",$date); // split the array
			$var_day = $date_array[0]; //day seqment
			$var_month = $date_array[1]; //month segment
			$var_year = $date_array[2]; //year segment
			$new_date_format = "$var_year-$var_month-$var_day"; // join them together
			return $new_date_format;
		}
		return null;
	}



	static function ConvertDatetoServiceOffer($date)
	{

		$dateNew = explode(" ",$date);
		//dd/mm/yyyy
		if(isset($date)){
			$date_array = explode("-",$dateNew[0]); // split the array
			$var_day = $date_array[2]; //day seqment
			$var_month = $date_array[1]; //month segment
			$var_year = $date_array[0]; //year segment
			$new_date_format = "$var_day/$var_month/$var_year $dateNew[1]"; // join them together
			return $new_date_format;
		}
		return null;
	}

	static function ConvertDatetoService($date)
	{

		$dateNew = explode(" ",$date);
		//dd/mm/yyyy
		if(isset($date)){
			$date_array = explode("-",$dateNew[0]); // split the array
			$var_day = $date_array[2]; //day seqment
			$var_month = $date_array[1]; //month segment
			$var_year = $date_array[0]; //year segment
			$new_date_format = "$var_day/$var_month/$var_year"; // join them together
			return $new_date_format;
		}
		return null;
	}

	static function msgValidateKV($validate)
	{
		    $err = array();
		    $i = 1;
            foreach ($validate->errors()->getMessages() as $key => $value) {
            	if($i == 1){
            		$err[] = array('error' => $value[0],'field' => $key);
            	}   
            	$i++;           	
            }           
          return $err;
	}

	static function msgValidate($validate)
	{
		 $err = $validate->errors();
	      $msgErr = array();
	      foreach ($err->all() as $key => $value) {
	        $msgErr[] = array('error'=>$value);
	      }
	      return $msgErr;
	}
	
	static function msgValidSingle($validate)
	{
		 $err = $validate->errors();	   
	      foreach ($err->all() as $key => $value) {
	       if($key == 0)
	       	return  $value;
	      }	      
	}

    static function getFeatureImageBig($arr){

    	if($arr != ''){
			$img = json_decode($arr);
			if(count($img) > 0){	
				if($img[0]!=null){
					if(file_exists(base_path().'/public/storage/thumb/'.$img[0])){
						return asset('storage/1500/'.$img[0]);						
					}	
				   return url('uploads/images/other/image-upload.png');
				}			
				return url('uploads/images/other/image-upload.png');
			}
		}		
		return url('uploads/images/other/image-upload.png');
    }

	static function featuteImage($arr)
	{
		if($arr != ''){
			$img = json_decode($arr);
			if(count($img) > 0){	
				if($img[0]!=null){
					if(file_exists(base_path().'/public/storage/thumb/'.$img[0])){
						return asset('storage/thumb/'.$img[0]).' 1400w, '.asset('storage/900/'.$img[0]).' 1600w,'.asset('storage/1200/'.$img[0]).' 1800w, '.asset('storage/1500/'.$img[0]).' 2000w';						
					}	
				   return url('uploads/images/other/image-upload.png');
				}			
				return url('uploads/images/other/image-upload.png');
			}
		}		
		return url('uploads/images/other/image-upload.png');
	}

	static function featuteQuare($arr)
	{
		if($arr != ''){
			$img = json_decode($arr);
			if(count($img) > 0){	
				if($img[0]!=null){
					if(file_exists(base_path().'/public/storage/quare/'.$img[0])){
						return url('storage/quare/'.$img[0]);
					}else{
						if(file_exists(base_path().'/public/storage/thumb/'.$img[0])){
						  return url('storage/thumb/'.$img[0]);
						}	
					   return url('uploads/images/other/image-upload.png');
					}					
				}			
				return url('uploads/images/other/image-upload.png');
			}
		}		
		return url('uploads/images/other/image-upload.png');
	}

   static function ConvertArrObjImage($image,$thumb,$image_name,$ar)
	{
		$arr = [];
        if($ar !== ''){
        if(count(json_decode($ar)) > 0){
        	foreach (json_decode($ar) as $key => $value) {

            $arr[] = array($image => url('storage/'.$value),$thumb => url('storage/thumb/'.$value), $image_name =>$value);          
          }
         }	
        }else{
        	 $arr[] = array($image=>url('uploads/images/other/image-upload.png'),$thumb=>url('uploads/images/other/image-upload.png'));
        }
        return $arr;	
	}

	
	static function ConvertArrObjTwo($obj1,$ar1,$obj2,$ar2)
    {  
        $arr = [];
        if($ar1 !== ''){
        if(count(json_decode($ar1)) > 0){   
         	 //$data = json_decode($ar1);       
       		  $arr = json_decode($ar1);     
        	// foreach (json_decode($ar1) as $key => $value) {
             
         //  }
         }	
        } 
      return $arr;
    }

	static function ConvertArrObj($obj,$ar)
    {  
        $arr = [];
        if($ar !== ''){
        if(count(json_decode($ar)) > 0){
        	foreach (json_decode($ar) as $key => $value) {
            $arr[] = array($obj=>$value);
          }
         }	
        } 
        return $arr;
    }

    static function ConvertEloquentToArr($ar)
    {
        $arr = [];
        $object = new stdClass();
        if($ar !== ''){
            if(count(json_decode($ar)) > 0){
                foreach (json_decode($ar) as $key => $value) {
                    $arr []= ($object->$key=$value);
                }
            }
        }
        return $arr;
    }

    static function ConvertEloquentToArrKey($ar)
    {
        $arr = [];
        $object = new stdClass();
        if($ar !== ''){
            if(count(json_decode($ar)) > 0){
                foreach (json_decode($ar) as $key => $value) {
                    $arr [$key]= ($value);
                }
            }
        }
        return $arr;
    }

    static function ConvertArrObjUser($ar)
    {
        $arr = [];
        $object = new stdClass();
        if($ar !== ''){
            if(count(json_decode($ar)) > 0){
                foreach (($ar) as $key => $value) {
                    $arr =  $object->$key=$value;
                }
            }
        }
        return  $arr;
    }
	
	static function objEmpty()
	{
		return json_decode("{}");
	}

	static function arrEmpty()
	{
		return json_decode("{}");
	}

	static function ratingAct($data)
	{					
		$arrR = [];
		foreach ($data as $key => $value) {
			$arrR[] = $value->rating;
		}
		$count = count($data);
		$arrSum = array_sum($arrR);
		$avg = 0;

		if($count != 0){
		  $avg = $arrSum/$count;
		  if($avg > 5)
			 $avg = 5;
		}	
		$avgRes = round($avg,1);	
		return Helpers::ratingComment($avgRes);
	}

	static function ratingComment($avg)
	{
	    $StarO = '<span class="fa fa-star-o"></span> ';
		$Star5 = '<span class="fa fa-star"></span> ';
		$StarH = '<span class="fa fa-star-half-full"></span>';

		$starObj = (object)$starArr = [
		's0' => $StarO.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's0.0' => $StarO.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's0.1' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's0.2' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,	
		's0.3' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,	
		's0.4' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,		
		's0.5' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,	
		's0.6' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,	
		's0.7' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,	
		's0.8' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,	
		's0.9' => $StarH.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1' => $Star5.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.0' => $Star5.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.1' => $Star5.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.2' => $Star5.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.3' => $Star5.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.4' => $Star5.' '.$StarO.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.5' => $Star5.' '.$StarH.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.6' => $Star5.' '.$StarH.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.7' => $Star5.' '.$StarH.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.8' => $Star5.' '.$StarH.' '.$StarO.' '.$StarO.' '.$StarO,
		's1.9' => $Star5.' '.$StarH.' '.$StarO.' '.$StarO.' '.$StarO,
		's2' => $Star5.' '.$Star5.' '.$StarO.' '.$StarO.' '.$StarO,
		's2.0' => $Star5.' '.$Star5.' '.$StarO.' '.$StarO.' '.$StarO,
		's2.1' => $Star5.' '.$Star5.' '.$StarO.' '.$StarO.' '.$StarO,
		's2.2' => $Star5.' '.$Star5.' '.$StarO.' '.$StarO.' '.$StarO,
		's2.3' => $Star5.' '.$Star5.' '.$StarO.' '.$StarO.' '.$StarO,
		's2.4' => $Star5.' '.$Star5.' '.$StarO.' '.$StarO.' '.$StarO,
		's2.5' => $Star5.' '.$Star5.' '.$StarH.' '.$StarO.' '.$StarO,
		's2.6' => $Star5.' '.$Star5.' '.$StarH.' '.$StarO.' '.$StarO,
		's2.7' => $Star5.' '.$Star5.' '.$StarH.' '.$StarO.' '.$StarO,
		's2.8' => $Star5.' '.$Star5.' '.$StarH.' '.$StarO.' '.$StarO,
		's2.9' => $Star5.' '.$Star5.' '.$StarH.' '.$StarO.' '.$StarO,
		's3' => $Star5.' '.$Star5.' '.$Star5.' '.$StarO.' '.$StarO,
		's3.0' => $Star5.' '.$Star5.' '.$Star5.' '.$StarO.' '.$StarO,
		's3.1' => $Star5.' '.$Star5.' '.$Star5.' '.$StarO.' '.$StarO,
		's3.2' => $Star5.' '.$Star5.' '.$Star5.' '.$StarO.' '.$StarO,
		's3.3' => $Star5.' '.$Star5.' '.$Star5.' '.$StarO.' '.$StarO,
		's3.4' => $Star5.' '.$Star5.' '.$Star5.' '.$StarO.' '.$StarO,
		's3.5' => $Star5.' '.$Star5.' '.$Star5.' '.$StarH.' '.$StarO,
		's3.6' => $Star5.' '.$Star5.' '.$Star5.' '.$StarH.' '.$StarO,
		's3.7' => $Star5.' '.$Star5.' '.$Star5.' '.$StarH.' '.$StarO,
		's3.8' => $Star5.' '.$Star5.' '.$Star5.' '.$StarH.' '.$StarO,
		's3.9' => $Star5.' '.$Star5.' '.$Star5.' '.$StarH.' '.$StarO,
		's4' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarO,
		's4.0' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarO,
		's4.1' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarO,
		's4.2' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarO,
		's4.3' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarO,
		's4.4' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarO,
		's4.5' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarH,
		's4.6' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarH,
		's4.7' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarH,
		's4.8' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarH,
		's4.9' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$StarH,
		's5' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$Star5,
		's5.0' => $Star5.' '.$Star5.' '.$Star5.' '.$Star5.' '.$Star5,
		];			
	   if($avg > 5)
		 $avg = 5;

		$value = 's'.$avg;
	   return $starObj->$value;//$starArr[$avg];
	}
	static function getCity($id)
	{
		$data = \App\City::where('id',$id)->first();
		if($data){
			return $data->name;
		}
		return null;
	}
	static function getCountry($id)
	{
		$data = \App\Country::where('id',$id)->first();
		if($data){
			return $data->name;
		}
		return null;
	}
   
   static function getCountryCode($id)
	{
		$data = \App\Country::where('id',$id)->first();
		if($data){
			return $data;
		}
		return null;
	}
	static function activityType($arrType,$actType)
	{
		if($arrType != ''){
			 if(count(json_decode($arrType)) > 0){
				foreach (json_decode($arrType) as $key => $value) {
				if($value == $actType){
					return true;
				}
			  }
			}			
		}
		return false;
	}

	static function includeService($arrInc,$inc)
	{
		if($arrInc != ''){
			 if(count(json_decode($arrInc)) > 0){
				foreach (json_decode($arrInc) as $key => $value) {
				if($value == $inc){
					return true;
				}
			  }
			}
		  return false;
		}
		return false;
	}

	static function addOtherAddOn($arrOther,$other)
	{
		if($arrOther != ''){
			 if(count(json_decode($arrOther)) > 0){
				foreach (json_decode($arrOther) as $key => $value) {
				if($value == $other){
					return true;
				}
			  }
			}			
		}
		return false;
	}
	

	static function includeLanguage($arrLang,$lang)
	{
		if($arrLang != ''){
			 if(count(json_decode($arrLang)) > 0){
				foreach (json_decode($arrLang) as $key => $value) {
				if($value == $lang){
					return true;
				}
			  }
			}			
		}
		return false;
	}

	static function exceptArrEmpty($arr)
	{
		return array_filter($arr);
	}

	static function exchangeRateCart($amount,$type)
	{
		$dataEx = \App\ExchangeRate::getExangeRate();
		$exchangeType = Cache::get('currency');
		$currencyRate1 = $dataEx->$type;
		$currencyRate2 = $dataEx->$exchangeType;

		$totalAmount = ($amount/$currencyRate1)*$currencyRate2;
		return  $totalAmount;
	}

	static function exchangeRateCartEuro($amount,$type,$toCurr)
	{
		$dataEx = \App\ExchangeRate::getExangeRate();	
		$currencyRate1 = $dataEx->$type;
		$currencyRate2 = $dataEx->$toCurr;

		$totalAmount = ($amount/$currencyRate1)*$currencyRate2;
		return  $totalAmount;
	}
	

	static function exchangePaymentPaypal($amount,$type,$exchangeType)
	{
		$dataEx = \App\ExchangeRate::getExangeRate();		
		$currencyRate1 = $dataEx->$type;
		$currencyRate2 = $dataEx->$exchangeType;

		$totalAmount = ($amount/$currencyRate1)*$currencyRate2;		
		return  number_format($amount,2,'.','');
	}
	

	static function exchangeRate($price_per_person,$discount,$type)
	{
		if($discount != '' and $discount > 0){
		   $amount = $price_per_person - (($price_per_person * $discount) / 100);	
		}else{
		   $amount = $price_per_person;
		}		

		$dataEx = \App\ExchangeRate::getExangeRate();
		$exchangeType = Cache::get('currency');
		$currencyRate1 = $dataEx->$type;
		$currencyRate2 = $dataEx->$exchangeType;

		$totalAmount = ($amount/$currencyRate1)*$currencyRate2;
		return  number_format($totalAmount, 2, '.', '').''.Helpers::arrCurrency($exchangeType);
	}
		
	static function priceBeforeDiscountExchange($amount,$discount,$type)
	{
		if($discount != '' and $discount > 0){
		   
		    $dataEx = \App\ExchangeRate::getExangeRate();
			$exchangeType = Cache::get('currency');
			$currencyRate1 = $dataEx->$type;
			$currencyRate2 = $dataEx->$exchangeType;

			$totalAmount = ($amount/$currencyRate1)*$currencyRate2;
			return  number_format($totalAmount, 2, '.', '').''.Helpers::arrCurrency($exchangeType);

		}else{
			return '';
		}
		
	}	
	static function currencyPaypal($key)
	{
		$arr = [
			'euro'=> 'EUR',
			'dollar'=> 'USD',
			'pound'=> 'GBP'
		]; 
		if(isset($arr[$key])){
		  return $arr[$key];
		}
		return $arr['euro'];
	}

	static function arrCurrency($key){
		$arr = [
			'euro'=> '€',
			'dollar'=> '$',
			'pound'=> '£'
		]; 
		if(isset($arr[$key])){
		  return $arr[$key];
		}
		return null;		
	}

	static function priceCurrency($price_per_person,$currency_type)
	{		
		return $price_per_person.''.Helpers::arrCurrency($currency_type);
	}

	static function addOtheraddOnsOffer($arr)
	{
		if($arr !== ''){
			if(count(json_decode($arr)) > 0){
				foreach (json_decode($arr) as $key => $value) {
					echo '<div class="include_offer_detail_padding col-md-3"><i class="fa fa-plus fa-lg"></i> '.$value.'</div>';
				}
			}
		}
		return '';
	}

	static function checkPriceAfterDiscount($price_per_person,$currency_type,$discount)
	{
		if($discount != '' and $discount > 0){
			$amountDiscount = $price_per_person - (($price_per_person * $discount) / 100);			
		return $amountDiscount.''.Helpers::arrCurrency($currency_type);

		}else{
		    return $price_per_person.''.Helpers::arrCurrency($currency_type);
		}
		
	}

	static function priceAfterDiscount($price_per_person,$discount)
	{
		if($discount != '' and $discount > 0){
			$amountDiscount = $price_per_person - (($price_per_person * $discount) / 100);		
		  return $amountDiscount;
		}else{			
		  return $price_per_person;
		}
		
	}

  static function checkPriceBeforeDiscount($price_per_person,$currency_type,$discount)
	{
		if($discount != '' and $discount > 0){
		   return $price_per_person.''.Helpers::arrCurrency($currency_type);
		}else{
			return '';
		}
		
	}	

	static function offerSlider($arr)
	{
		if($arr != ''){
			$img = json_decode($arr);
			if(count($img) > 0){
				foreach ($img as $key => $value) {
					echo '<div>';
					echo '<img data-u="image" srcset="'.asset("storage/900/".$value).' 1000w,'.asset("storage/1200/".$value).' 1500w, '.asset("storage/1500/".$value).' 2000w" />';
					//echo '<img data-u="image" src="'.asset("storage/1500/".$value).'" />';
					echo '<img data-u="thumb" src="'.asset("storage/thumb/".$value).'" />';
					echo '</div>';	
				}
			}
		}else{
			echo '<div>';
			echo '<img data-u="image" src="'.asset("uploads/images/other/image-upload.png").'" />';
			echo '<img data-u="thumb" src="'.asset("uploads/images/other/image-upload.png").'" />';
			echo '</div>';	
		}
	}

  static function offerThumbArrSuggest($arr)
	{
		if($arr != ''){
			$img = json_decode($arr);
			if(count($img) > 0){
				foreach ($img as $key => $value) {
					echo '<div>';					
					echo '<img style="width:24%;float:left;margin:0.25%; border:1px solid #f9b112;" src="'.asset("storage/thumb/".$value).'" />';
					echo '</div>';	
				}
			}
		}
	}
	static function makeDirectory($directory)
	{		
		//call make:link storage
		if(!file_exists(base_path().'/public/storage/')){
			\Artisan::call('storage:link');
		}

		$path_storage = Storage::disk(config('voyager.storage.disk'))->getDriver()->getAdapter()->getPathPrefix();

		if(!file_exists($path_storage.'quare/')) {
          mkdir($path_storage.'quare/', 0777, true);
        }
		
		if(!file_exists($path_storage.'thumb/')) {
          mkdir($path_storage.'thumb/', 0777, true);
        }

	 	if(!file_exists($path_storage.'900')) {
	        mkdir($path_storage.'900', 0777, true);
	    }
	     if(!file_exists($path_storage.'1200')) {
	        mkdir($path_storage.'1200', 0777, true);
	    }

	    if(!file_exists($path_storage.'1500')) {
	        mkdir($path_storage.'1500', 0777, true);
	    }	

		if(!file_exists($path_storage.'original/'.$directory)) {
          mkdir($path_storage.'original/'.$directory, 0777, true);
        } 

        if(!file_exists($path_storage.'quare/'.$directory)) {
          mkdir($path_storage.'quare/'.$directory, 0777, true);
        }

	    if(!file_exists($path_storage.'thumb/'.$directory)) {
          mkdir($path_storage.'thumb/'.$directory, 0777, true);
        }

        if(!file_exists($path_storage.'900/'.$directory)) {
          mkdir($path_storage.'900/'.$directory, 0777, true);
        }

        if(!file_exists($path_storage.'1200/'.$directory)) {
          mkdir($path_storage.'1200/'.$directory, 0777, true);
        }

        if(!file_exists($path_storage.'1500/'.$directory)) {
	        mkdir($path_storage.'1500/'.$directory, 0777, true);
	    }

	    if(!file_exists($path_storage.$directory)) {
	        mkdir($path_storage.$directory, 0777, true);
	    }

		// if(!file_exists(base_path().'/public/storage/quare/')) {
  //         mkdir(base_path().'/public/storage/quare/', 0777, true);
  //       }
		
		// if(!file_exists(base_path().'/public/storage/thumb/')) {
  //         mkdir(base_path().'/public/storage/thumb/', 0777, true);
  //       }

	 // 	if(!file_exists(base_path().'/public/storage/900')) {
	 //        mkdir(base_path().'/public/storage/900', 0777, true);
	 //    }
	 //     if(!file_exists(base_path().'/public/storage/1200')) {
	 //        mkdir(base_path().'/public/storage/1200', 0777, true);
	 //    }

	 //    if(!file_exists(base_path().'/public/storage/1500')) {
	 //        mkdir(base_path().'/public/storage/1500', 0777, true);
	 //    }	

		// if(!file_exists(base_path().'/public/storage/original/'.$directory)) {
  //         mkdir(base_path().'/public/storage/original/'.$directory, 0777, true);
  //       } 

  //       if(!file_exists(base_path().'/public/storage/quare/'.$directory)) {
  //         mkdir(base_path().'/public/storage/quare/'.$directory, 0777, true);
  //       }

	 //    if(!file_exists(base_path().'/public/storage/thumb/'.$directory)) {
  //         mkdir(base_path().'/public/storage/thumb/'.$directory, 0777, true);
  //       }

  //       if(!file_exists(base_path().'/public/storage/900/'.$directory)) {
  //         mkdir(base_path().'/public/storage/900/'.$directory, 0777, true);
  //       }

  //       if(!file_exists(base_path().'/public/storage/1200/'.$directory)) {
  //         mkdir(base_path().'/public/storage/1200/'.$directory, 0777, true);
  //       }

  //       if(!file_exists(base_path().'/public/storage/1500/'.$directory)) {
	 //        mkdir(base_path().'/public/storage/1500/'.$directory, 0777, true);
	 //    }

	 //    if(!file_exists(base_path().'/public/storage/'.$directory)) {
	 //        mkdir(base_path().'/public/storage/'.$directory, 0777, true);
	 //    }

	    return true;
	}

	static function removeImage($img)
	{
		try {
			
		  if(file_exists(base_path().'/public/storage/quare/'.$img))
		  unlink(base_path().'/public/storage/quare/'.$img);

		  if(file_exists(base_path().'/public/storage/thumb/'.$img))
		  unlink(base_path().'/public/storage/thumb/'.$img);

		  if(file_exists(base_path().'/public/storage/1200/'.$img)) 
		  unlink(base_path().'/public/storage/1200/'.$img);

		  if(file_exists(base_path().'/public/storage/900/'.$img)) 
		  unlink(base_path().'/public/storage/900/'.$img);

		  if(file_exists(base_path().'/public/storage/1500/'.$img)) 
		  unlink(base_path().'/public/storage/1500/'.$img);	 

		  if(file_exists(base_path().'/public/storage/'.$img)) 
		  unlink(base_path().'/public/storage/'.$img);
		} catch (Exception $e) {
			
		}
		
	}
	
	static function arrayListCustomRecursive($newValues) {
        $recursiveArr = array();
        foreach ($newValues as $key => $value ) {
            $recursiveArr = array_merge_recursive($value,$recursiveArr);           
        }
        return (array)$recursiveArr;
    }

    static function IndexedArray2($IndexKey){
      $dArr = array();
      if(is_array($IndexKey)){
         foreach ($IndexKey as $key => $value) { 
           //if($value[0]  != 'star')
            $dArr[] = array($value[0] => $value[1]);        
          }
        }
       return $dArr; 
}
	static function objConvertInfo($info,$age){
        if($info != ''){
            $arr = array();
            foreach ($info as $key => $value) {
                $arr[] = array('family_info'=>$value,'age_child'=>$age[$key]);
            }
            return [json_encode($arr)];
        }
        return [json_encode([])];
    }

    static function objConvertInfoFamily($info){
        if($info != ''){
            $arr = array();
            foreach ($info as $key => $value) {
                $arr[] = array('family_info'=>$value->family_info,'age_child'=>$value->age_child);
            }
            return [json_encode($arr)];
        }
        return [json_encode([])];
    }

    static function ConvertObjectToArr($cart_obj)
    {
        $arr = array();
        if($cart_obj != ''){
             $arr_cart_obj = json_decode($cart_obj);
            foreach (($arr_cart_obj) as $key => $value) {
                $arr[]=$key=$value;
            }
            return $arr;
        }
        return $arr;
    }

    static function ConvertFamilyInfObj($family_info){
        if($family_info != ''){
            $arr = array();
            $arr_family = json_decode($family_info);
            for($i=0;$i<count($arr_family);$i++)
            {
                $arr_family_dec = json_decode($arr_family{$i});
                for($j=0;$j<count($arr_family_dec);$j++)
                {
                    $arr[] = array("family_info"=>$arr_family_dec{$j}->family_info,"age_child"=>$arr_family_dec{$j}->age_child);
                }
            }
            return ($arr);
        }
        return $arr[] = [array("family_info"=>"","age_child"=>"")];
    }

    static function ConvertItemInfObj($item_cart){
        if($item_cart != ''){
            $arr = array();
            $arr_item_cart = ($item_cart);

            foreach($arr_item_cart as $key=>$value)
            {
                $arr[] = array("item_name"=>$value['name'],
                               "qty"=>$value['qty'],
                               "price"=>$value['price'],
                               "discount"=>$value['discount'],
                               "sub_total"=>$value['sub_total']);
            }
            return ($arr);
        }
        return $arr[] = [array("item_name"=>"", "qty"=>"", "price"=>"", "discount"=>"", "sub_total"=>"")];
    }

   static function truncate($strings, $length)
	{
		$string = strip_tags($strings);
	    if (strlen($string) > $length) {
	        $string = substr($string, 0, $length) . '...';
	    }

	    return $string;
	}

}