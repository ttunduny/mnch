<?php namespace App\Models;

use Moloquent;
use Cache;
use App\Helpers\Map;
use Carbon\Carbon;
use Mpociot\Firebase\SyncsWithFirebase;
class Participants extends Moloquent {
use SyncsWithFirebase;

	protected $collection = 'Participants';

	protected $fillable = ['Index','Name_of_Participant', 'FacilityName','PartID','mobile_Number','email_address','training_site'];
	
	   public function facility() {
        return $this->belongsTo('App\Models\Facilities','mfl_code','FacilityCode');
    }

public function collection()
        {
             return $this->collection;
        }
        
   		 public function scopeView($query)
     {
       

     	return $query->with(['facility'=>function($query){
     				 	$query->select('FacilityCode','FacilityName');
     				 	}])
     				 ->with('assessment');

     }

      public function scopeViewD($query,$Date)
     {
             $Date = Carbon::createFromFormat('Y-m-d H', $Date.' 00');

        return $query->with(['facility'=>function($query){
                        $query->select('FacilityCode','FacilityName');
                        }])
                     ->with(['assessment'=>function($query) use ($Date){
                        $query->where('Date',$Date);
                        }])
                     ;

     }


      public static function County($County='All')
     {
            
         $Participants =   Cache::rememberForever('ParticipantsListCounties',function(){
                             $List = self::view()->get();
                                $Map = new Map;
                                
                                return $Map->transform($List,'ParticipantsListCounties');

                          });

         if($County == 'All'){
            return  $Participants;
         }else{
            return  $Participants->where('County',$County);
         }         
       

     }

      public function assessment() {
        return $this->belongsTo('App\Models\Assessments','PartID','PartID');
    }

     public static function SubmittedAssessmentsIM($County=false){

      $Assessments = $County ? self::where('County',$County): 
                             self::select('FacilityCode','County') ;

       return $Assessments->with(['assessments'=>function($query) use ($Survey,$Term){
                                  $query->where('Survey','like',$Survey.'%')
                                        ->where('Assessment_Term',$Term)
                                        ->where('Status','Submitted');
                            }])

                    ->get()
                    ->lists('assessments')->flatten();

    }


	
}