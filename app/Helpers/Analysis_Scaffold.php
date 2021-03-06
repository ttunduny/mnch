<?php namespace App\Helpers;

use App\Models\Facilities;
use App\Models\Assessments;
use Cache;


class Analysis_Scaffold {
 		

 		public  function CHV2()
 		{	
 			$terms = $this->getterms('CHV2');
 			$data = Assessments::Submitted('CHV2')->where('Assessment_Term',$terms[0])->get();
      $yr = Cache::remember('CHV2YEARS',config('cache.timeout'),function() use ($data){
              $Years = Analyse::sec3Years($data);
              $YearsCount = count($Years)-1;
              $Years = array_reverse($Years);
              $AllYears = $Years;
              unset($Years[0]);
              unset($Years[1]);
              $Years = array_reverse($Years, true);
              $AllYears = array_reverse($AllYears, true);
             return['Years'=> $Years,'AllYears'=> $AllYears,'YearsCount'=>$YearsCount];
        });
 			
 			$SubmittedCHCount =  $data->count();
 			$SubmittedCHCounties = County::AllSubmitted('CHV2');     
      $links = ['facilityinfo'=>'Facility information',
                'staff'=>'Staff training',
                'health'=>'Health Services',
                'guidelines'=>'Guidelines and Job Aids',
                'treat'=>'Treatment Data: Diarrhoea Cases',
                'zinc'=>'Treatment Data: Non Diarrhoea Cases ',
                'diarrhoea'=>'Treatment Commodities: Diarrhoea',                
                'antibiotics'=>'Treatment Commodities: Antibiotics',
                'malaria'=>'Treatment Commodities: Malaria',
                'ort'=>'Oral Rehydration Therapy',
                'lort'=>'Location of ORT Corner',
                'supplies'=>'Supplies Availability',
                'resource'=>'Resource Availability',
                'comm'=>'Community Strategy'];
 			return [
 			'terms'=> $terms,
      'links'=> $links,
 			'Years'=> $yr['Years'],
 			'AllYears'=> $yr['AllYears'],
 			'YearsCount'=>$yr['YearsCount'],
 			'Count'=>$SubmittedCHCount,
 			'Counties'=>$SubmittedCHCounties,
 			'name'=>'Child Health Survey',
      'sver'=>'CHV2'
 			];
 			
 		}

    public  function CHV1()
    { 
      $terms = $this->getterms('CHV1');
      $data = Assessments::Submitted('CHV1')->where('Assessment_Term',$terms[0])->get();
      // $yr = Cache::remember('CHV1YEARS',config('cache.timeout'),function() use ($data){
      //         $Years = Analyse::sec3Years($data);
      //         $YearsCount = count($Years)-1;
      //         $Years = array_reverse($Years);
      //         $AllYears = $Years;
      //         unset($Years[0]);
      //         unset($Years[1]);
      //         $Years = array_reverse($Years, true);
      //         $AllYears = array_reverse($AllYears, true);
      //        return['Years'=> $Years,'AllYears'=> $AllYears,'YearsCount'=>$YearsCount];
      //   });
      
      $SubmittedCHCount =  $data->count();
      $SubmittedCHCounties = County::AllSubmitted('CHV1');     
      $links = ['facilityinfo'=>'Facility information',
                'staff'=>'Staff training',
                'health'=>'Health Services',
                'guidelines'=>'Guidelines and Job Aids',
                'diarrhoea'=>'Treatment Commodities: Diarrhoea',                
                'antibiotics'=>'Treatment Commodities: Antibiotics',
                'malaria'=>'Treatment Commodities: Malaria',
                'ort'=>'Oral Rehydration Therapy',
                'lort'=>'Location of ORT Corner',
                'supplies'=>'Supplies Availability',
                'resource'=>'Resource Availability',
                'comm'=>'Community Strategy'];
      return [
      'terms'=> $terms,
      'links'=> $links,
      'Count'=>$SubmittedCHCount,
      'Counties'=>$SubmittedCHCounties,
      'name'=>'Child Health Survey',
      'sver'=>'CHV1'

      ];
      
    }

 		public function IMCIV1()
 		{
 			         
        $SubmittedIMCICount =  Assessments::Submitted('IMCI')->count();
        $SubmittedIMCICounties = County::AllSubmitted('IMCI');  

		return [
 			'Count'=>$SubmittedIMCICount,
 			'Counties'=>$SubmittedIMCICounties,
      'links'=>'links',
 			'name'=>'Integrated Management of Childhood Illness',
      'sver'=>'IMCIV1'
 			];
 		}

 		public function MNHV2()
 		{
 			 $terms = self::getterms('MNHV2');
      		 $SubmittedMNHCount =  Assessments::Submitted('MNHV2')->where('Assessment_Term',$terms[0])->count();  
             $SubmittedMNHCounties = County::AllSubmitted('MNHV2');
        	 $links = ['facilityinfo'=>'Facility information',
                'pdelivery'=>'Provision of Delivery Services',
                'sdelivery'=>'Delivery Services',
                'health'=>'Health Facility Management',
                'skilled'=>'Skilled Birth Attendants',
                'bed'=>'Bed Capacity',
                'servicedev'=>'24 hour service delivery',
                'bemonc'=>'Provision OF BEmONC Signal Functions',   
              'bemoncCh'=>'Challenges Experienced in BEmONC Service Provison', 
               'cemonc'=>'Provision OF CEmONC Signal Functions',   
              'HIV'=>'HIV Testing and Counselling',            
                'blood'=>'Blood and Transfusions',
                'cs'=>'Reason for not conducting CS',
                'KMC'=>'Provision of KMC',
                'devpep'=>'Preparedness for Delivery',
                'nbc'=>'Provison of New Born Care',
                'Guidelines'=>'Guidelines Availability',
                'Tools'=>'Tools Availability',
                'Jobaids'=>'Job Aids Availability',
                'Equipment'=>'Equipment Availability',
                'Testing'=>'Testing Supplies',
                'Delivery'=>'Delivery Kit Components'];

        	 return [
      'links'=> $links,
 			'terms'=> $terms,
 			'Count'=>$SubmittedMNHCount,
 			'Counties'=>$SubmittedMNHCounties,
 			'name'=>'Maternal and Neonatal Health Survey',
      'sver'=>'MNHV2'
 			];
 			

 		}



    public function MNHV1()
    {
       $terms = self::getterms('MNHV1');
           $SubmittedMNHCount =  Assessments::Submitted('MNHV1')->where('Assessment_Term',$terms[0])->count();  
             $SubmittedMNHCounties = County::AllSubmitted('MNHV1');
           $links = ['facilityinfo'=>'Facility information',
                'pdelivery'=>'Provision of Delivery Services',
                'sdelivery'=>'Delivery Services',
                'health'=>'Health Facility Management',
                'skilled'=>'Skilled Birth Attendants',
                'bed'=>'Bed Capacity',
                'servicedev'=>'24 hour service delivery',
                'bemonc'=>'Provision OF BEmONC Signal Functions',   
              'bemoncCh'=>'Challenges Experienced in BEmONC Service Provison', 
               'cemonc'=>'Provision OF CEmONC Signal Functions',   
              'HIV'=>'HIV Testing and Counselling',            
                'blood'=>'Blood and Transfusions',
                'cs'=>'Reason for not conducting CS',
                'KMC'=>'Provision of KMC',
                'devpep'=>'Preparedness for Delivery',
                'nbc'=>'Provison of New Born Care',
                'Guidelines'=>'Guidelines Availability',
                'Tools'=>'Tools Availability',
                'Jobaids'=>'Job Aids Availability',
                'Equipment'=>'Equipment Availability',
                'Testing'=>'Testing Supplies',
                'Delivery'=>'Delivery Kit Components'];

           return [
      'links'=> $links,
      'terms'=> $terms,
      'Count'=>$SubmittedMNHCount,
      'Counties'=>$SubmittedMNHCounties,
      'name'=>'Maternal and Neonatal Health Survey',
      'sver'=>'MNHV1'
      ];
      

    }


 		public  function getterms($survey)
 		{
 		    $array=null;
 		    count(Facilities::SubmittedAssessments($survey,'Baseline')->toArray()) < 1 ?: $array[] = 'Baseline';
      		count(Facilities::SubmittedAssessments($survey,'Midterm')->toArray()) < 1 ?: $array[] = 'Midterm';
      		count(Facilities::SubmittedAssessments($survey,'Endterm')->toArray()) < 1 ?: $array[] = 'Endterm';
      		$array != null ?: $array[] = 'Baseline';
     		return $array;
     	}

     	public function resolve($values,$survey)
     	{
        if ($survey == 'IMCIV1') {
          $view = 'analytics.IMCIindex';
        }else{
          $view = 'analytics.index';
        }
     
      
	      return view($view)
        ->with('links',$values['links'])
	      ->with('survey',$survey)
	      ->with('SubmittedCount',$values['Count'])
	      ->with('SubmittedCounties',$values['Counties'])
	      ->with('Years', isset($values['Years']) ? $values['Years'] : '')
	      ->with('YearsCount',  isset($values['YearsCount']) ? $values['YearsCount'] : '')
	      ->with('AllYears', isset($values['AllYears']) ? $values['AllYears'] : '')
	      ->with('terms', isset($values['terms']) ? $values['terms'] : '')
	      ->with('surveyname',$values['name'])
        ->with('sver',$values['sver']);
	   }
 	
	}