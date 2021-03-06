<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;
use App\Location;
use App\StaffCategory;
use App\Position;
use Validator;
use App\Role;
use App\Qualification;
use App\UserGroup;
use App\Competency;
use App\Bank;
use Illuminate\Http\Request;
use App\Traits\UserProfile;

class UserProfileController extends Controller
{
	use UserProfile;
	public function index(Request $request)
    {
    	 // $user=User::find($user_id);
      //  $locations=Location::all();
      //  $staff_categories=StaffCategory::all();
      //  $positions=Position::all();
      //  return view('empmgt.partials.details',['user'=>$user,'locations'=>$locations,'staff_categories'=>$staff_categories,'positions'=>$positions]);
       $user=\Auth::user();
       $countries=\App\Country::all();
       $qualifications=Qualification::all();
       $competencies=Competency::all();
       $companies=Company::all();
       $banks=Bank::all();
        $company=Company::find(session('company_id'));
        if(!$company){
          $company=Company::first();
        }
       // return $user->skills()->where('skills.id',1)->first()->pivot->competency;
       return view('empmgt.profile',['user'=>$user,'qualifications'=>$qualifications,'countries'=>$countries,'competencies'=>$competencies,'companies'=>$companies,'banks'=>$banks,'company'=>$company]);
    }
   
   public function store(Request $request)
    {
        //
     
        return $this->processPost($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        return $this->processGet($id,$request);
    }

}
