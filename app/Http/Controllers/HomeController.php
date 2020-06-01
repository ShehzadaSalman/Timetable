<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
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


  public function Dashboard()
    {
        return view('dashboard');
    }


   public function ManageAdmin(){
      $openpassword =
     $user = DB::table('users')->get();
     $info = DB::table('siteinfo')->get();
     return view('manage',['user' => $user , 'info' => $info ]);

   }


   public function SurveyTitle(){
      $survey_titles = DB::table('survey_title')->latest()->paginate('5');
     return view('SurveyTitle',['titles' => $survey_titles]);
   }


    public function Survey(){

      $surveys = DB::table('surveys')->join('survey_title', 'surveys.title_id', 'survey_title.id')
      ->select('surveys.id as surveyID','surveys.*','survey_title.id as survey_titleID', 'survey_title.*')
      ->paginate('5');
      return view('Survey',['listing' => $surveys]);

    }


    public function AddSurvey(){
    $newSurvey = DB::table('survey_title')->get();
    return view('addQuiz',['surveys' => $newSurvey]);
    }


}
