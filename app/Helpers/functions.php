<?php 
use App\Role;
use App\Module;
use App\AccessModule;
use App\Models\User;
use App\Models\Transactions;

function get_module_access($role){
    $modules=AccessModule::where('role_id',$role)->get();
    return $modules;
    

}

function getRole($id){

    $role=Role::where('id',$id)->first();
    return $role;
    

}

function getUser($id){

    $user=User::where('id',$id)->first();
    return $user;
    

}

function get_user_wallet_balance($user_id){
     
     $query = Transactions::where('user_id' , $user_id)
                           ->groupBy('user_id')
                           ->SelectRaw('SUM(amount) as bal')
                           ->first();
    $balance = !empty($query->bal) ? $query->bal : 0; 
     return $balance;
}




function get_module_action($role,$title){
    if($role){
    $module=Module::where('page_title',$title)->first();

    $action=AccessModule::where('role_id',$role)->where('module_id',$module->id)->first();
    }else{
         $action=AccessModule::where('role_id',$role)->where('module_id','0')->first();

    }

    return $action;
    

}




function getprofilecount($tech){
    
    $count=Candidate::where('tech',$tech)->count();

    return rand(15,40)+$count;
}


function get_total_candidate($status=''){

    $count=0;
    if($status=='active'){
        $count = Candidate::where('status','active')->count();

    }elseif($status=='under-interview'){
        $count=ShortList::whereNotIn('round',[Config::get('constants.round.short_list.key'),Config::get('constants.round.rejected.key'),Config::get('constants.round.release.key'),Config::get('constants.round.candidate-selected.key')])->count();

    }elseif($status=='in-kobl-interview'){
        $count=Candidate::where('stage_id','4')->count();

    }else{
       $count = Candidate::count(); 
    }
    

    return $count;
}


function get_total_employer($type=''){

    $count=0;
    if($type==''){

      $count=User::where(['role'=>'3','status'=>'active'])->count();
    }elseif($type=="vendor"){
        $count=User::where(['role'=>'3','is_staffing'=>'1','is_employer'=>'0','status'=>'active'])->count();

    }elseif($type=="employer"){
        $count=User::where(['role'=>'3','is_employer'=>'1','status'=>'active'])->count();
    }elseif($type=="percentage"){
        $count=User::where(['role'=>'3','is_placement_agency'=>'1','status'=>'active'])->count();
    }
    return $count;
}





function get_short_list_count($round=''){

    $count=0;
    $count=ShortList::where('round',$round)->count();
    return $count;
}


function get_total_resume_leads(){

    $count=0;
    $count=ResumeLead::count();
    return $count;
}







function getEmployerInterviewData($id){
    
    $data=InterviewEmail::where('id',$id)->first();

    return $data;
}

function getInterviewName($id){
    
  $user=User::where('id',$id)->first();

  return $user;
}

function getInterviewByEmail($id){
    
  $user=InterviewEmail::where('email',$id)->orderBy('id','desc')->first();

  return $user;
}

function getpercentageByExp($exp){
    $field_name='';
    if($exp>0 && $exp<=3){
        $field_name='zero_three_percent';
    }elseif($exp>3 && $exp<=6){
        $field_name='three_six_percent';
    }elseif($exp>6 && $exp<=10){
        $field_name='six_ten_percent';
    }elseif($exp>10){
        $field_name='ten_above_percent';
    }
    
  $plan=Plan::where('type','Percentage')->select($field_name)->first();

  return $plan->$field_name;
}


function getofferedCTC($employer_id,$candidate_id){
    
    
  $offer=ShortList::where(['round'=>'candidate-selected','candidate_id'=>$candidate_id,'user_id'=>$employer_id])->first();

  return $offer;
}

function checkCompleteProfile(){
   $user=Auth::user(); 
  $menu=Candidate::where('user_id',$user->id)->where('stage_id','<',4)->count();
  $check_candidate=Candidate::where('user_id',$user->id)->count();
  $status=$check_candidate==0?1: $menu;
  return $status;
}


function get_educations_detail($id){ 
 $data=Education::where('user_id',$id)->get();
 return $data;
}

function get_quiz($id){
  
 $candidate=Candidate::where('user_id',$id)->first();
 $t=(int)$candidate->exp;
 $level=ExamLevel::whereRaw('? between min_exp and max_exp', [$t])->first();
  $exam_level=$level->level;
  $questions=ExamQuestion::where(['exam_id'=>$exam_level,'status'=>'active'])->get();
  $answers=CandidateExamSheet::where(['exam_id'=>$exam_level,'user_id'=>$id])->get();
  $correct_answer_cate_1=0;
  $correct_answer_cate_2=0;
  $correct_answer_cate_3=0;
  foreach($answers as $ans){
    foreach($questions as $question){
        if($question->id==$ans->ques_id){
            if($ans->ans==$question->correct_ans){
                if($question->category_id==1){
                    $correct_answer_cate_1=$correct_answer_cate_1+1;
                }
                if($question->category_id==2){
                    $correct_answer_cate_2=$correct_answer_cate_2+1;
                }
                if($question->category_id==3){
                    $correct_answer_cate_3=$correct_answer_cate_3+1;
                }


            }
        }

    }


}

$data=array(
    'level'=>$level,
    'questions'=>$questions,
    'correct_answer_cate_1'=>$correct_answer_cate_1,
    'correct_answer_cate_2'=>$correct_answer_cate_2,
    'correct_answer_cate_3'=>$correct_answer_cate_3

);

 return $data;
}

function get_level($id){
 $candidate=Candidate::where('user_id',$id)->first();
 $t=(int)$candidate->exp;
 $level=ExamLevel::whereRaw('? between min_exp and max_exp', [$t])->first();
 return $level;
}


function get_employments_details($id){ 
 $data=Employment::where('user_id',$id)->get();
 return $data;
}

function get_feedback($id){ 
  $data=Feedback::where('user_id',$id)->where('heading','video')->first();
  return $data;
 }

 function getRoutePath() {
    return $_SERVER['REQUEST_URI'];
}


function getCandidate_shortlist($id,$user_id) {
    //$user=Auth::user();

    //dd($id."==".$user_id);
    $count= ShortList::where(['candidate_id'=>$id,'user_id'=>$user_id,'status'=>'active'])->count();
    return $count;
}




