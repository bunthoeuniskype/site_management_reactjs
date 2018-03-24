<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;

class ClientController extends Controller
{  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
        $clients = Client::all();
      
        $messages = [];
        $action = $request->get('ACTION');
        switch($action) {
            case 1: {
                $messages[] = 'Create Client successfully !';
                break;
            }
            case 2: {
                $messages[] = 'Update Client successfully !';
                break;
            }
            default: {
                break;
            }
        }
        $result = [
            'clients' => $clients,
            'messages' => $messages
        ];
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        // $rules = [
        //     'name' => 'required|unique:Client|regex:/^[a-zA-Z0-9-. ]+$/u|max:50',
        //     'dob' => 'required',
        //     'information' => 'max:300',
        //     'position' => 'required|in:intern,junior,senior,pm,ceo,cto,bo',
        //     'phone' => 'required|max:20|regex:/^[0-9-.\/\+\(\) ]+$/u',
        //     'gender' => 'required|in:1,2',
        // ];
        // $request->validate($rules);
          $client = new Client();
          $client->invoice_id = $request->get('invoice_id');
          $client->project_name = $request->get('project_name');
          $client->project_version= $request->get('project_version');
          $client->program_language= $request->get('program_language');
          $client->company= $request->get('company');
          $client->name= $request->get('name');
          $client->phone= $request->get('phone');
           $client->email= $request->get('email');
           $client->price= $request->get('price');
           $client->maintenance= $request->get('maintenance');
           $client->maintenance_price= $request->get('maintenance_price');
           $client->per_term= $request->get('per_term');
           $client->start_date=  $request->get('start_date') ? date($request->get('start_date')) : null;
           $client->end_date=  $request->get('end_date') ? date($request->get('end_date')) : null;
           $client->url= $request->get('url');
           $client->key= $request->get('key');
           $client->others= $request->get('others');       
           $client->save();
        return response()->json('Client Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Client = Client::find($id);
        return response()->json($Client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Client = Client::find($id);
        return response()->json($Client);
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
        // $rules = [
        //     'name' => 'required|unique:Client,id,'.$id.'|regex:/^[a-zA-Z0-9-. ]+$/u|max:50',
        //     'dob' => 'required',
        //     'information' => 'max:300',
        //     'position' => 'required|in:intern,junior,senior,pm,ceo,cto,bo',
        //     'phone' => 'required|max:20|regex:/^[0-9-.\/\+\(\) ]+$/u',
        //     'gender' => 'required|in:1,2',
        // ];
        // $request->validate($rules);
          $client  =  Client::find($id);
          $client->invoice_id = $request->get('invoice_id');
          $client->project_name = $request->get('project_name');
          $client->project_version= $request->get('project_version');
          $client->program_language= $request->get('program_language');
          $client->company= $request->get('company');
          $client->name= $request->get('name');
          $client->phone= $request->get('phone');
           $client->email= $request->get('email');
           $client->price= $request->get('price');
           $client->maintenance= $request->get('maintenance');
           $client->maintenance_price= $request->get('maintenance_price');
           $client->per_term= $request->get('per_term');
           $client->start_date=  $request->get('start_date') ? date($request->get('start_date')) : null;
           $client->end_date=  $request->get('end_date') ? date($request->get('end_date')) : null;
           $client->url= $request->get('url');
           $client->key= $request->get('key');
           $client->others= $request->get('others');       
           $client->save();
        
        return response()->json('Client Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Client = Client::find($id);      
      $Client->delete();
      return response()->json('Client Deleted Successfully.');
    }

    public function clients()
    {
        return view('client/index', ['title' => 'clients']);
    }

    public function newClient()
    {
        return view('client/index', ['title' => 'Create  Client']);
    }
    public function editClient()
    {
        return view('client/index', ['title' => 'Edit  Client']);
    }
}
