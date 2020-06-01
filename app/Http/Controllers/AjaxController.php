<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

// Adding a Survey
    public function addSurveyTitle(Request $request){
        $thetitle = $request->surveytitle;
        DB::table('survey_title')->insert(
          ['title' => $thetitle]
         );
      return redirect('surveytitles')->with('message','Survey Title Submitted Successfully');
    }


// Adding a Survey
   public function addSurveyPost(Request $request){
     DB::table('surveys')->insert(
       ['title_id' =>  $request->surveytitle_id,
        'Question' =>  $request->question,
        'option_a' =>  $request->optiona,
        'option_b' => $request->optionb,
        'option_c' => $request->optionc,
        'option_d' => $request->optiond,
        'option_e' => $request->optione,
        'answer'   => $request->answer ]
      );

     return redirect('addsurvey')->with('message','A Survey has been added Successfully');

   }


   // Deleting a Survey title
   public function deleteSurveyTitle($id){
     DB::table('survey_title')->where('id',$id)->delete();
     return redirect('surveytitles')->with('message',' A survey  Title has been moved to trash');
   }

// Delete a Survey
   public function deleteSurvey($id){
        DB::table('surveys')->where('id', $id)->delete();
       return redirect('surveys')->with('message',' A survey  has been moved to trash');
   }

// Edit a Survey Title
   public function editSurveyTitle(Request $req, $id){
     DB::table('survey_title')
               ->where('id', $id)
               ->update(['title' => $req->surveytitle]);
    return redirect('surveytitles')->with('message',' The Survey Title has been updated');

   }


  public function editSurvey($id){
  $SurveyTitle = DB::table('survey_title')->get();
  $surveydata = DB::table('surveys')->where('id',$id)->get();
  return view('editQuiz',['surveys' => $SurveyTitle , 'surveydata' => $surveydata , 'justID' => $id]);
  }

  // Updating the surveys
  public function editSurveyPost(Request $request, $id){
    DB::table('surveys')
              ->where('id', $id)
              ->update(
                ['title_id' =>  $request->surveytitle_id,
                 'Question' =>  $request->question,
                 'option_a' =>  $request->optiona,
                 'option_b' => $request->optionb,
                 'option_c' => $request->optionc,
                 'option_d' => $request->optiond,
                 'option_e' => $request->optione,
                 'answer'   => $request->answer ]);
              return redirect('surveys')->with('message',' The Survey has been updated');

  }


  public function updateUser(Request $request){
// Encrypting the password

    $password = Hash::make($request->password);
     DB::table('users')
        ->where('id', 1)
            ->update([
             'email' => $request->user,
             'password' => $password
       ]);
    return redirect('manage')->with('message',' The User has been updated');
  }


public function logoUpload(Request $request){


  $imageName = 'thelogo.'.$request->logo->getClientOriginalExtension();
  $request->logo->move(public_path('/uploadedimages'), $imageName);
  $path = 'uploadedimages/'.$imageName;

  DB::table('siteinfo')->where('id' ,1)->update([
    'Path' => $path,
    'Heading' => $request->siteheading
  ]);

    return redirect('manage')->with('messagetwo',' The  Site Info has been Updated');

}


// To use in future projects

public function fileUpload(){
  $imageName = time().'.'.$request->logo->getClientOriginalExtension();
  $request->logo->move(public_path('/uploadedimages'), $imageName);
}


}
