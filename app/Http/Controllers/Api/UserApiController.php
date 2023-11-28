<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ambulance;
use App\Models\ChildWelfare;
use App\Models\Complain;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Entrepreneur;
use App\Models\Mother;
use App\Models\Pharmacy;
use App\Models\Setting;
use App\Models\User;
use App\Models\DeviceToken;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\RequestGuard;

use Rakibhstu\Banglanumber\NumberToBangla;


class UserApiController extends Controller
{  
     public function register(Request $request){
         if($request->input('type')=='Mental'){
            $rules = [
            'name' => ['required', 'string', 'max:255'],
            // 'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'string', 'confirmed'],
            'phone'       => ['required'],
            //'last_period_date'       => ['required'],
            //'parent_or_husband_name' => ['required', 'string', 'max:255'],
            //'nid_no'      => ['required', 'string', 'max:255'],
            'village'      => ['required', 'string', 'max:255'],
            'union_id'      => ['required'],
            'upazila_id'      => ['required'],
            'district_id'      => ['required'],
            ];
            $messages = [
                'name.required' =>'Name is required',
                'phone.required'      =>'Mobile number is required',
                // 'email.required'      =>'Email is required',
                // 'email.email'         =>'Email is required',
                'password.required'   =>'Password is required',
                'password.string'   =>'Password is required',
                //'last_period_date.required'   =>'Last period date is required',
                //'parent_or_husband_name.required'   =>'Parent/Husband name is required',
                //'nid_no.required'   =>'NID/Birth registration is required',
                'village.required'   =>'Village is required',
                'union_id.required'   =>'Union is required',
                'upazila_id.required'   =>'Upazila is required',
                'district_id.required'   =>'District is required',
            ]; 
         } else {
                 $rules = [
                'name' => ['required', 'string', 'max:255'],
                // 'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'   => ['required', 'string', 'confirmed'],
                'phone'       => ['required'],
                'last_period_date'       => ['required'],
                'parent_or_husband_name' => ['required', 'string', 'max:255'],
                'nid_no'      => ['required', 'string', 'max:255'],
                'village'      => ['required', 'string', 'max:255'],
                'union_id'      => ['required'],
                'upazila_id'      => ['required'],
                'district_id'      => ['required'],
            ];
            $messages = [
                'name.required' =>'Name is required',
                'phone.required'      =>'Mobile number is required',
                // 'email.required'      =>'Email is required',
                // 'email.email'         =>'Email is required',
                'password.required'   =>'Password is required',
                'password.string'   =>'Password is required',
                'last_period_date.required'   =>'Last period date is required',
                'parent_or_husband_name.required'   =>'Parent/Husband name is required',
                'nid_no.required'   =>'NID/Birth registration is required',
                'village.required'   =>'Village is required',
                'union_id.required'   =>'Union is required',
                'upazila_id.required'   =>'Upazila is required',
                'district_id.required'   =>'District is required',
            ];
         }

        

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'success'    => false,
                'errors' => $validator->errors()
            ], 400);
        } else {

            try{
                $is_exist = User::where('phone', $request->input('phone'))->first();
                if($is_exist){
                    return response()->json([
                        'success'=>false,
                        'msg' => 'এই মোবাইল নাম্বারটি পূর্বে ব্যবহৃত হয়েছে, অনুগ্রহপূর্বক অন্য একটি ব্যবহার করুন।'
                    ], 500);
                }
                if($request->last_period_date) {
                    $lmp_arr = explode('/', $request->last_period_date);

                    //Y-m-d
                    $lmp = $lmp_arr[2].'-'.$lmp_arr[1].'-'.$lmp_arr[0];
                    $user = User::create([
                        'name' => $request->input('name'),
                        'email' => @$request->input('email'),
                        'password' => Hash::make($request->input('password')),
                        'phone' => $request->input('phone'),
                        'last_period_date' => date_format(date_create($lmp), 'Y-m-d'),
                        'type' => $request->input('type'),
                    ]);
                } else {
                    $user = User::create([
                        'name' => $request->input('name'),
                        'email' => @$request->input('email'),
                        'password' => Hash::make($request->input('password')),
                        'phone' => $request->input('phone'),
                        //'last_period_date' => date_format(date_create($lmp), 'Y-m-d'),
                        'type' => $request->input('type'),
                    ]);
                }
                
                

                $user_id = ['device_token' => $request->device_token];
                DeviceToken::updateOrCreate($user_id,[
                    'user_id' => $user->id,
                    'device_token' => $request->device_token,
                ]);

                if (!$user) {
                    return response()->json([
                        'success'=>false,
                        'msg' => 'Unable to create user.'
                    ], 500);
                }else{


                    $user_id = ["user_id" => $user->id];

                    $mdata['parent_or_husband_name'] = @$request->parent_or_husband_name;
                    $mdata['nid_no'] = $request->nid_no;
                    $mdata['village'] = $request->village;
                    $mdata['union_id'] = $request->union_id;
                    $mdata['upazila_id'] = $request->upazila_id;
                    $mdata['district_id'] = $request->district_id;
                    
                    if($request->last_period_date) {
                        $mdata['last_period_date'] = date_format(date_create($lmp), 'Y-m-d');
                    }


                     Mother::updateOrCreate($user_id, $mdata);


                     $data = [
                        'phone' => $request->phone,
                        'password' => $request->password
                    ];

                    if (auth()->attempt($data)) {
                        $token = auth()->user()->createToken('Laravel9PassportAuth')->accessToken;
                        return $this->respondWithToken($token);
                    }else{
                        return response()->json([
                            'success'=> false,
                            'data' => 'Unable to login.'
                        ], 500);
                    }
                }


            }catch (Exception $e) {
                return response()->json([
                    'success'=> false,
                    'msg' => $e->getMessage()
                ], 500);
            }

        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'access_token'=> $token,
                'user'=> auth()->user()
            ]
        ],200);
    }

    public function login(Request $request){
        //dd($request->phone);
        // $data = [
        //     'phone' => $request->phone,
        //     'password' => $request->password
        // ];
        $credentials = $request->only('phone', 'password');        
        if (auth()->attempt($credentials)) {

            $user_id = ['device_token' => $request->device_token];
            DeviceToken::updateOrCreate($user_id,[
                'user_id' => auth()->user()->id,
                'device_token' => $request->device_token,
            ]);

            $token = auth()->user()->createToken('Laravel9PassportAuth')->accessToken;
            return $this->respondWithToken($token);
        } else {
            return response()->json([
                'success'=>false,
                'msg' => 'Incorrect Mobile or Password'
            ], 400);
        }

    }


    public function profileUpdate(Request $request){

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'parent_or_husband_name' => ['required', 'string', 'max:255'],
            'nid_no'      => ['required', 'string', 'max:255'],
            'village'      => ['required', 'string', 'max:255'],
            'union_id'      => ['required'],
            'upazila_id'      => ['required'],
            'district_id'      => ['required'],
            // 'age'      => ['required', 'string', 'max:255'],
            // 'marriage_age'      => ['required'],
            // 'number_of_tt_vaccination'      => ['required'],
            // 'number_of_pregnancies'      => ['required'],
            // 'number_of_previous_abortions'      => ['required'],
            // 'age_of_last_child'      => ['required'],
            // 'number_of_previous_delivery_normal'      => ['required'],
            // 'number_of_previous_delivery_caesar'      => ['required'],
            // 'place_of_previous_birth'      => ['required'],
            // 'complications_of_previous_pregnancies'      => ['required'],
            'last_period_date'      => ['required'],

        ];
        $messages = [
            'parent_or_husband_name.required' =>'Parent/Husband name is required',
            'nid_no.required'      =>'NID number is required',

            // 'number_of_tt_vaccination.required'      =>'Number of TT vaccinations is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'success'    => false,
                'errors' => $validator->errors()
            ], 400);
        } else {

            try{
                $user_con = ["id" => auth()->user()->id];

                $udata['name'] = $request->name;

                if($request->email) {
                    $udata['email'] = @$request->email;
                }                
                $udata['phone'] = $request->phone;
                $udata['last_period_date'] = date_format(date_create($request->last_period_date), 'Y-m-d');
                $user = User::updateOrCreate($user_con, $udata);

                $mdata['parent_or_husband_name'] = $request->parent_or_husband_name;
                $mdata['nid_no'] = $request->nid_no;
                $mdata['village'] = $request->village;
                $mdata['union_id'] = $request->union_id;
                $mdata['upazila_id'] = $request->upazila_id;
                $mdata['district_id'] = $request->district_id;
                $mdata['contact_for_urgent_needs'] = $request->contact_for_urgent_needs;
                $mdata['age'] = $request->age;
                $mdata['height'] = $request->height;
                $mdata['weight'] = $request->weight;
                $mdata['marriage_age'] = $request->marriage_age;
                $mdata['blood_group'] = $request->blood_group;

                if($request['chronic_disease']){
                    $cdeasease = implode(',',$request->chronic_disease);
                    $mdata['chronic_disease'] =$cdeasease;
                }

                $mdata['number_of_tt_vaccination'] = $request->number_of_tt_vaccination;
                $mdata['date_of_last_tt_vaccination'] = date_format(date_create($request->date_of_last_tt_vaccination), 'Y-m-d');
                $mdata['probable_date_of_delivery'] = date_format(date_create($request->probable_date_of_delivery), 'Y-m-d');
                $mdata['number_of_pregnancies'] = $request->number_of_pregnancies;
                $mdata['number_of_previous_abortions'] = $request->number_of_previous_abortions;
                $mdata['age_of_last_child'] = $request->age_of_last_child;
                $mdata['number_of_previous_delivery_normal'] = $request->number_of_previous_delivery_normal;
                $mdata['number_of_previous_delivery_caesar'] = $request->number_of_previous_delivery_caesar;
                $mdata['place_of_previous_birth'] = $request->place_of_previous_birth;

                if($request['complications_of_previous_pregnancies']){
                    $copp = implode(',',$request->complications_of_previous_pregnancies);
                    $mdata['complications_of_previous_pregnancies'] =$copp;
                }

                $mdata['where_give_to_birth'] = $request->where_give_to_birth;
                $mdata['transport_available_of_emergency'] = $request->transport_available_of_emergency;
                $mdata['enough_money_for_travel'] = $request->enough_money_for_travel;
                $mdata['blood_donors_fixed'] = $request->blood_donors_fixed;

                $mdata['last_period_date'] = date_format(date_create($request->last_period_date), 'Y-m-d');
                //dd($mdata);
                $user_id = ["user_id" => auth()->user()->id];
                $mothers = Mother::updateOrCreate($user_id, $mdata);
                

                if (!$mothers) {
                    return response()->json([
                        'success'=>false,
                        'msg' => 'Unable to update.'
                    ], 500);
                }else{
                    return response()->json([
                        "success" => true,
                        "data" => [
                            'mothers'=>$mothers,
                            'user'=>$user,
                        ],
                    ], 200);
                }
            }catch (Exception $e) {
                return response()->json([
                    'success'=> false,
                    'msg' => $e->getMessage()
                ], 500);
            }


        }

    }

    public function getChildWelfareList(){

        $child_welfares = ChildWelfare::query()->get()->toArray();

        return response()->json([
            "success" => true,
            "data" => [
                'child_welfares' => $child_welfares,
                'bdris_form_download_link' => asset('/uploads/bdris_form/form.pdf')
            ],
        ], 200);
    }

    public function getEntrepreneurList(){
        $entrepreneurs = Entrepreneur::query()->get();
        $result = [];
        foreach($entrepreneurs as $key=>$item) {
            $data = [
                'name' => $item->name,
                'email' => $item->email,
                'mobile' => $item->mobile,
                'union' => $item->union->bn_name,
                'avatar' => $item->avatar ? asset('/uploads/entrepreneur/'.$item->avatar) :  asset('/admin/img/user.png'),
            ];
            array_push($result, $data);
        }
        return response()->json([
            "success" => true,
            "data" => [
                'entrepreneurs'=>$result
            ],
        ], 200);
    }

    public function getPatientWelfareList(){
        $all_data = [];
        $doctors = Doctor::query()->get();

        foreach ($doctors as $key => $doctor) {
            $doctors[$key]['avatar'] = $doctor->avatar ? asset('/').'uploads/doctor/'. $doctor->avatar : asset('/').'uploads/prosuti_kollan/Noimg.png';
        }
        $ambulance = Ambulance::query()->get();
        foreach ($ambulance as $key => $doctor) {
            $ambulance[$key]['photo'] = $doctor->photo ? asset('/').'uploads/ambulance/'. $doctor->photo : asset('/').'uploads/prosuti_kollan/Noimg.png';
        }
        $pharmacy = Pharmacy::query()->get();
        foreach ($pharmacy as $key => $doctor) {
            $pharmacy[$key]['photo'] = $doctor->photo ? asset('/').'uploads/pharmacy/'. $doctor->photo : asset('/').'uploads/prosuti_kollan/Noimg.png';
            $pharmacy[$key]['phone'] = $doctor->phone ? $doctor->phone : '-';
        }

        $all_data['doctors']=$doctors;
        $all_data['ambulance']=$ambulance;
        $all_data['pharmacy']=$pharmacy;

        return response()->json([
            "success" => true,
            "data" => [
                'patient_welfares'=>$all_data
            ],
        ], 200);
    }

    public function getDisease(){

        $diseases = Disease::query()->select(['id','name'])->get();

        return response()->json([
            "success" => true,
            "data" => [
                'diseases'=>$diseases
            ],
        ], 200);
    }


    public function getBittenSnakeContent(){


        $snake_content = Setting::where('key','bitten_snake_content')->first();

        if (!empty($snake_content)){
            return response()->json([
                "success" => true,
                "data" => [
                    'description'=>isset($snake_content->value)?$snake_content->value:''
                ],
            ], 200);
        }else{
            return response()->json([
                "success" => true,
                "data" => [
                    'description'=>''
                ],
            ], 200);
        }

    }

    public function getbabyInfo() {      
        //Ref:
        //https://github.com/rakibdevs/number-to-bangla?ref=madewithlaravel.com
        $numto = new NumberToBangla();

        $fetus = $this->calculate_fetus_age(Auth::user()->last_period_date);
        $edd_data = $this->calculate_edd(Auth::user()->last_period_date);
        
        // $guideline = News::where('to','>=', $fetus)->orderBy('to', 'asc')->get();    
        $guideline = News::where('to','=', $fetus)->orderBy('to', 'asc')->get();    
        foreach ($guideline as $key => $value) {
            $guideline[$key]['image'] = $value->image ? asset('/').'uploads/prosuti_kollan/'.$value->image : asset('/').'uploads/prosuti_kollan/Noimg.png';
        }
        
        return response()->json([
            "success" => true,
            "data" => [
                'fetus'=> $fetus>=0 ? $numto->bnNum($fetus).' সপ্তাহ' : 'আপনি এখনও গর্ভবতী নন।',
                'edd'=> $fetus>=0 ? $edd_data['edd'] : 'আপনি এখনও গর্ভবতী নন।',
                'days_left'=> $fetus>=0 ? $numto->bnNum($edd_data['days_left']) :  'আপনি এখনও গর্ভবতী নন।',
                'guideline' => $guideline
            ],
        ], 200);        
    }
    protected function calculate_fetus_age($lmp_date) {
        $now = time();
        $lmp_timestamp = strtotime($lmp_date);
        $difference = $now - $lmp_timestamp;
        $age_in_days = round($difference / (60 * 60 * 24));
        // $age_in_weeks = floor(($age_in_days - 14) / 7);
        $age_in_weeks = floor(($age_in_days) / 7)+1;
        return $age_in_weeks;
      }
    protected  function calculate_edd($lmp_date) {
        $edd = date('Y-m-d', strtotime("+280 days", strtotime($lmp_date)));
        
        $numto = new NumberToBangla();
        $edd_arr = explode('-', $edd);
        $edd_y = $numto->bnNum($edd_arr[0]);
        $edd_m = $numto->bnMonth($edd_arr[1]);
        $edd_d = $numto->bnNum($edd_arr[2]);

        $edd_timestamp = strtotime("+280 days", strtotime($lmp_date));
        $now = time();
        $difference = $edd_timestamp - $now;
        $days_left = round($difference / (60 * 60 * 24));        
        return [
            // 'edd' => date_format(date_create(@$edd), 'd M Y'),
            'edd' => $edd_d.' '.$edd_m.' '.$edd_y,
            'days_left' => $days_left,
        ];        
      }      

      public function get_profile_info() {
            $data = User::find(Auth::user()->id);
            unset($data->mother);
            $data->last_period_date = date_format(date_create(@$data->last_period_date), 'd/m/Y');
            
            $data->mother->last_period_date = date_format(date_create(@$data->mother->last_period_date), 'd/m/Y');
            $data->mother->probable_date_of_delivery = date_format(date_create(@$data->mother->probable_date_of_delivery), 'd/m/Y');
            $data->mother->date_of_last_tt_vaccination = date_format(date_create(@$data->mother->date_of_last_tt_vaccination), 'd/m/Y');
            
            return response()->json([
                "success" => true,
                "data" => [
                    'user'=> $data,
                    'mothers'=> $data->mother
                ],
            ], 200);   
      }
      public function submitCouncilingRequest(Request $request) {
        $u = new Complain();
        $u->user_id = Auth::user()->id;
        $u->note = $request->note;
        $u->save();

        return response()->json([
            "success" => true,            
            "msg" => "Thank you! Your request has been submitted successfully.",            
        ], 200);   
  }      
}
