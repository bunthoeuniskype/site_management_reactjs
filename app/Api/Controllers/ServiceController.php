<?php

namespace App\Api\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceLog;
use App\Client;

class ServiceController extends Controller
{

	function __construct(){
	$this->log = new ServiceLog();
	$this->serive = new Client();//new Service();
	}	

  public function authClient(Request $request)
  {	   
  		try {
	    	$auth = $this->serive->where(['key'=>$request->key,'status'=>1])->first();
	      if($auth){
	      	$checkDomain = $this->serive->where(['url' => $request->url,'key' => $request->key])->first();
	      	if(!$checkDomain){
	      		$checkLog = $this->log->where('url',$request->url)->first();
	      		if(!$checkLog){
	      			$log = $this->log;
			      	$log->key = $request->key;
			      	$log->url = $request->url;
			      	$log->save();
			    }		      	
	      	}
	      	//domain block url 
	      	$checkUrl = $this->serive->where(['url' => $request->url,'status'=>0])->first();
	      	if($checkUrl){
	      	   return 'unauthorize';
	      	}
	        return 'authorize';
	      }      
	    } catch (Exception $e) {
	      return 'unauthorize';
	    }
	    return 'unauthorize';
  }
  
}
