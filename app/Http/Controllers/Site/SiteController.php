<?php

namespace App\Http\Controllers\Site;

use DummyFullModelClass;
use App\ain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\ain  $ain
     * @return \Illuminate\Http\Response
     */
    public function index(ain $ain)
    {
       return view('site.index');
    }
       public function contact(ain $ain)
    {
       return view('site.contact');
    }
         public function service(ain $ain)
    {
       return view('site.service');
    }
    
  public function web_develop(ain $ain)
    {
       return view('site.web_develop');
    }
    public function web_design(ain $ain)
    {
       return view('site.web_design');
    }
      public function web_hosting(ain $ain)
    {
       return view('site.web_hosting');
    }    
     public function domain_register(ain $ain)
    {
       return view('site.domain_register');
    }
    public function seo(ain $ain)
    {
       return view('site.seo');
    }

     public function about(ain $ain)
    {
       return view('site.about');
    }

      public function technology(ain $ain)
    {
       return view('site.technology');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\ain  $ain
     * @return \Illuminate\Http\Response
     */
    public function create(ain $ain)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ain  $ain
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ain $ain)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ain  $ain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show(ain $ain, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ain  $ain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(ain $ain, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ain  $ain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ain $ain, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ain  $ain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(ain $ain, DummyModelClass $DummyModelVariable)
    {
        //
    }
}
