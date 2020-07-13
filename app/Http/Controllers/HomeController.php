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

   // managing the instructor


  public function getInstructor(){
    $inst = DB::table('instructor')->get();
    return view('instructor', [ 'inst' => $inst]);
  }

  public function saveInstructor(Request $request){
    DB::table('instructor')->insert(
      ['instructorname' => $request->instructorName]
  );

  return redirect('instructor')->with('message','An Instructor has been added to the TimeTable');

  }

  public function deleteInstructor($id){
    DB::table('instructor')->where('instrutorId', $id)->delete();

    return redirect('instructor')->with('message','An Instructor has been removed from the TimeTable');
  }

  public function editInstructor(Request $request, $id){

    DB::table('instructor')->where('instrutorId', $id)->update(
      [
        'instructorname' => $request->instructorName
      ]
    );


    return redirect('instructor')->with('message','An Instructor has been updated');
  }


   // managing the department

   public function getDepartment(){
    $inst = DB::table('department')->get();
    return view('department', [ 'inst' => $inst]);
  }

  public function saveDepartment(Request $request){
    DB::table('department')->insert(
      [
        'deptName' => $request->departmentName,
        'no_of_rooms' => $request->departmentRoom

      ]
  );

  return redirect('department')->with('message','A Department has been added to the TimeTable');

  }

  public function deleteDepartment($id){
    DB::table('department')->where('deptId', $id)->delete();
    DB::table('rooms')->where('deptid', $id)->delete();
    return redirect('department')->with('message','A Department has been removed from the TimeTable');
  }

  public function editDepartment(Request $request, $id){

    DB::table('department')->where('deptId', $id)->update(
      [
        'deptName' => $request->departmentName,
        'no_of_rooms' => $request->departmentRoom
      ]
    );


    return redirect('department')->with('message','A department has been updated');
  }


   //managing the rooms
  // ============================================================================ //

   public function getRoom(){

    $inst = DB::table('rooms')
    ->join('department', 'rooms.deptid', '=', 'department.deptId')
    ->select('rooms.roomid as ID', 'rooms.roomname as NAME','department.deptId as DEPTID', 'department.deptName as DEPARTMENT')
    ->get();


    $dept = DB::table('department')->get();
    return view('room', [ 'inst' => $inst , 'dept' => $dept]);

  }

  public function saveRoom(Request $request){

    DB::table('rooms')->insert(
      [
        'roomname' => $request->roomName,
        'deptid' => $request->departmentID

      ]
  );

  return redirect('room')->with('message','A New Room has been added');

  }

  public function deleteRoom($id){
    DB::table('rooms')->where('roomid', $id)->delete();

    return redirect('room')->with('message','A Room has been removed from the TimeTable');
  }

  public function editRoom(Request $request, $id){

    DB::table('rooms')->where('roomid', $id)->update(
      [
        'deptid' => $request->departmentName,
        'roomname' => $request->roomName
      ]
    );


    return redirect('room')->with('message','A Room has been updated');
  }













   // Managing the semester

   public function getSemester(){

    $inst = DB::table('semester')
    ->join('department', 'semester.deptId', '=', 'department.deptId')
    ->select('semester.semesterId as ID', 'semester.semesterName as NAME','department.deptId as DEPTID', 'department.deptName as DEPARTMENT')
    ->get();


    $dept = DB::table('department')->get();
    return view('semester', [ 'inst' => $inst , 'dept' => $dept]);

  }

  public function saveSemester(Request $request){

    DB::table('semester')->insert(
      [
        'semesterName' => $request->roomName,
        'deptId' => $request->departmentID

      ]
  );

  return redirect('semester')->with('message','A New Semester has been added');

  }

  public function deleteSemester($id){
    DB::table('semester')->where('semesterId', $id)->delete();

    return redirect('semester')->with('message','A Semester has been removed from the TimeTable');
  }

  public function editSemester(Request $request, $id){

    DB::table('semester')->where('semesterId', $id)->update(
      [
        'deptId' => $request->departmentName,
        'semesterName' => $request->roomName
      ]
    );


    return redirect('semester')->with('message','A Semester has been updated');
  }






}
