<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\Banner;
use App\Models\MentalVideo;
use App\Models\MentalAudio;
use App\Models\MentalStory;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{

    public function getDistrict(){

        $districts = District::query()->select(['id','name','bn_name'])->get();

        return response()->json([
            "success" => true,
            "data" => [
                'districts'=>$districts
            ],
        ], 200);
    }


    public function getUpazila($district_id){

        $upazilas = Upazila::query()->where('district_id',$district_id)->select(['id','name','bn_name'])->get();

        return response()->json([
            "success" => true,
            "data" => [
                'upazilas'=>$upazilas
            ],
        ], 200);
    }

    public function getUnion($upazila_id){

        $unions = Union::query()->where('upazilla_id',$upazila_id)->select(['id','name','bn_name'])->get();

        return response()->json([
            "success" => true,
            "data" => [
                'unions'=>$unions
            ],
        ], 200);
    }
    public function eddToLmpOrLmpToEdd($query = null, $date = null) {
        
        if($query=='lmp') {
            $res_date = date('Y-m-d', strtotime("+280 days", strtotime($date)));  //edd
        } else {
            $res_date = date('Y-m-d', strtotime("-280 days", strtotime($date)));   // lmp
        }        
   
        return response()->json([
            "success" => true,
            "data" => [
                'res_date'=> date_format(date_create($res_date), 'd/m/Y'),                
            ],
        ], 200);       
      }
      public function g() {            
        $districts = District::query()->select(['id','name','bn_name'])->get();
        $upazilas = Upazila::query()->where('district_id',1)->select(['id','name','bn_name'])->get();
        $unions = Union::query()->where('upazilla_id',3)->select(['id','name','bn_name'])->get();

        $banner_images = Banner::all();
        foreach ($banner_images as $key => $item) {
            $banner_images[$key]['image'] = asset('/').'uploads/banner/'.$item->image;
        }
        return response()->json([
            "success" => true,
            "data" => [
                'districts'=> $districts,                
                'upazilas'=> $upazilas,                
                'unions'=> $unions,   
                'banner_images' => $banner_images              
            ],
        ], 200);       
      }
      public function mental_health_data() {            
        $videos = MentalVideo::all();
        $audios = MentalAudio::all();
        $story = MentalStory::all();
        
        foreach ($videos as $key => $item) {
            $videos[$key]['filename'] = asset('/').'uploads/mental_health_videos/'.$item->filename;
        }
        foreach ($audios as $key => $item) {
            $audios[$key]['filename'] = asset('/').'uploads/mental_health_audios/'.$item->filename;
        }
        return response()->json([
            "success" => true,
            "data" => [
                'videos'=> $videos,                
                'audios'=> $audios,                
                'story'=> $story,                    
            ],
        ], 200);       
      }      

}
