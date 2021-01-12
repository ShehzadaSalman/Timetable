<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

   
  public function LandingPage(){
    return view('landing');
  }


public function registration(){
  return view('login');
}



  public function Dashboard()
    {

      $id = Auth::id();
      $timeTable = DB::table('slot')
      ->join('semester', 'semester.semesterId', '=', 'slot.semesterId')
      ->select('semester.semesterName', 'semester.semesterId')->where('slot.userid', $id)->distinct()->get();
        return view('dashboard', ['timetable' => $timeTable]);




        // $timeTable = DB::table('slot')
        // ->join('department', 'slot.deptId', '=', 'department.deptId')
        // ->join('semester', 'slot.semesterId', '=', 'semester.semesterId')
        // ->join('instructor', 'slot.instructorId', '=', 'instructor.instrutorId')
        // ->join('rooms', 'slot.roomId', '=', 'rooms.roomid')
        // ->join('course', 'slot.courseId', '=', 'course.courseId')
        // ->join('day', 'slot.Day', '=', 'day.dayId')
        // ->join('time', 'slot.timeSlot', '=', 'time.timeId')
        // ->select('*')->distinct()->get();
        // return view('dashboard', ['timetable' => $timeTable]);

    }


    public function getTimeTable($id){
      $id = Auth::id();
      $result = DB::table('slot')
                ->join('department', 'slot.deptId', '=', 'department.deptId')
                ->join('semester', 'slot.semesterId', '=', 'semester.semesterId')
                ->join('instructor', 'slot.instructorId', '=', 'instructor.instrutorId')
                ->join('rooms', 'slot.roomId', '=', 'rooms.roomid')
                ->join('course', 'slot.courseId', '=', 'course.courseId')
                ->join('day', 'slot.Day', '=', 'day.dayId')
                ->join('time', 'slot.timeSlot', '=', 'time.timeId')
                ->select('*')->where('slot.userid', $id)
                ->get();
    
    
      return view('timetable', ['result' => $result]);
      // return $result;
    }
    
    public function removeTimeTable($id){
          DB::table('slot')->where('semesterId', $id)->delete();
            return redirect('home')->with('message','The TimeTable has been removed');
    }
    


   public function ManageAdmin(){
      $openpassword =
     $user = DB::table('users')->get();
     $info = DB::table('siteinfo')->get();
     return view('manage',['user' => $user , 'info' => $info ]);

   }

   // managing the instructor
// ===========================================================================================

  public function getInstructor(){
    $id = Auth::id();
    $inst = DB::table('instructor')->where('userid', $id)->get();
    return view('instructor', [ 'inst' => $inst]);
  }

  public function saveInstructor(Request $request){
    $id = Auth::id();
    DB::table('instructor')->insert(
      ['instructorname' => $request->instructorName,
        'userid' => $id 
      ]);

  return redirect('instructor')->with('message','An New Teacher has been added to the table below');
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
// =============================================================================================
   public function getDepartment(){
    $id = Auth::id();
    $inst = DB::table('department')->where('userid', $id)->get();
    return view('department', [ 'inst' => $inst]);
  }

  public function saveDepartment(Request $request){
      $id = Auth::id();
    DB::table('department')->insert(
      [
        'deptName' => $request->departmentName,
        'no_of_rooms' => $request->departmentRoom,
        'userid' => $id

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
    $id = Auth::id();
    $inst = DB::table('rooms')
    ->join('department', 'rooms.deptid', '=', 'department.deptId')
    ->select('rooms.roomid as ID', 'rooms.roomname as NAME','department.deptId as DEPTID', 'department.deptName as DEPARTMENT')
    ->where('rooms.userid', $id)
    ->get();
    $dept = DB::table('department')->where('department.userid', $id)->get();
    return view('room', [ 'inst' => $inst , 'dept' => $dept]);

  }

  public function saveRoom(Request $request){
    $id = Auth::id();
    DB::table('rooms')->insert(
      [
        'roomname' => $request->roomName,
        'deptid' => $request->departmentID,
        'userid' => $id

      ]
  );
 return redirect('room')->with('message','A New Room has been added to the table');

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
// =============================================================================
   public function getSemester(){
    $id = Auth::id();
    $inst = DB::table('semester')
    ->join('department', 'semester.deptId', '=', 'department.deptId')
    ->select('semester.semesterId as ID', 'semester.semesterName as NAME','department.deptId as DEPTID', 'department.deptName as DEPARTMENT')
    ->where('semester.userid', $id)
    ->get();


    $dept = DB::table('department')->where('userid', $id)->get();
    return view('semester', [ 'inst' => $inst , 'dept' => $dept]);

  }

  public function saveSemester(Request $request){
    $id = Auth::id();
    DB::table('semester')->insert(
      [
        'semesterName' => $request->roomName,
        'deptId' => $request->departmentID,
        'userid' => $id
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


// Managing the course
// =============================================================================


  public function getCourse(){
    $id = Auth::id();
    $inst = DB::table('course')->where('userid', $id)->get();
    return view('course', [ 'inst' => $inst]);
  }

  public function saveCourse(Request $request){
    $id = Auth::id();
    DB::table('course')->insert(
      [
        'courseName' => $request->courseName,
        'courseDescription' => $request->courseDescription,
        'userid' => $id
    ]
  );

  return redirect('course')->with('message','A Course has been added to the TimeTable');

  }

  public function deleteCourse($id){
    DB::table('course')->where('courseId', $id)->delete();

    return redirect('course')->with('message','A Course has been removed from the TimeTable');
  }

  public function editCourse(Request $request, $id){

    DB::table('course')->where('courseId', $id)->update(
      [
        'courseName' => $request->courseName,
        'courseDescription' => $request->courseDescription
      ]
    );
    return redirect('course')->with('message','A Course has been updated');
  }

// Manging the slots
// ======================================================================================


// get slot for the current user from the db
  public function getSlot(){
    $id = Auth::id();
    $inst = DB::table('slot')
              ->join('department', 'slot.deptId', '=', 'department.deptId')
              ->join('semester', 'slot.semesterId', '=', 'semester.semesterId')
              ->join('instructor', 'slot.instructorId', '=', 'instructor.instrutorId')
              ->join('rooms', 'slot.roomId', '=', 'rooms.roomid')
              ->join('course', 'slot.courseId', '=', 'course.courseId')
              ->join('day', 'slot.Day', '=', 'day.dayId')
              ->join('time', 'slot.timeSlot', '=', 'time.timeId')
              ->select('*')
              ->where('slot.userid', $id)
              ->get();

  $dept = DB::table('department')->where('userid', $id)->get();
  $teacher = DB::table('instructor')->where('userid', $id)->get();
  $course = DB::table('course')->where('userid', $id)->get();
  $time = DB::table('time')->get();
  $day = DB::table('day')->get();


    return view('slot', [ 'inst' => $inst, 'dept' => $dept, 'teacher' => $teacher, 'course' => $course, 'time' => $time, 'day' => $day]);

  }







// save a slot
  public function saveSlot(Request $request){
    $id = Auth::id();
$check = DB::table('slot')->select('*')->where('slot.Day', $request->day)
->where('slot.timeSlot', $request->timeSlot)->get();
$oldSlotId = 0;


if(count($check) === 0) {

      DB::table('slot')->insert(
        [
          'deptId' => $request->departmentName,
          'semesterId' => $request->semesterName,
          'instructorId' => $request->instructorName,
          'roomId' => $request->roomName,
          'timeSlot' => $request->timeSlot,
          'courseId' => $request->courseName,
          'Day' => $request->day,
          'userid' => $id
      ]
    );
    return redirect('slot')->with('message','A New Slot has been created');
}else{
foreach($check as $ch){
  $oldSlotId = $ch->slotId;
}

$oldSlotId;
  DB::table('slot')->where('slotId', $oldSlotId)->update(
    [
      'deptId' => $request->departmentName,
      'semesterId' => $request->semesterName,
      'instructorId' => $request->instructorName,
      'roomId' => $request->roomName,
      'timeSlot' => $request->timeSlot,
      'courseId' => $request->courseName,
      'Day' => $request->day
  ]
);
    return redirect('slot')->with('message','An Existing slot has been updated');


} // else satatement ends here


  }

  public function deleteSlot($id){
    DB::table('slot')->where('slotId', $id)->delete();
    return redirect('slot')->with('message','A Slot has been removed from the TimeTable');
  }

  public function editSlot($id){

    $inst = DB::table('slot')
              ->join('department', 'slot.deptId', '=', 'department.deptId')
              ->join('semester', 'slot.semesterId', '=', 'semester.semesterId')
              ->join('instructor', 'slot.instructorId', '=', 'instructor.instrutorId')
              ->join('rooms', 'slot.roomId', '=', 'rooms.roomid')
              ->join('course', 'slot.courseId', '=', 'course.courseId')
              ->join('day', 'slot.Day', '=', 'day.dayId')
              ->join('time', 'slot.timeSlot', '=', 'time.timeId')
              ->select('*')->where('slotId', $id)
              ->get();

  $dept = DB::table('rooms')->get();
  $teacher = DB::table('instructor')->get();
  $course = DB::table('course')->get();
  $day = DB::table('day')->get();
  $time = DB::table('time')->get();

    return view('editslot', [ 'inst' => $inst, 'dept' => $dept, 'teacher' => $teacher, 'course' => $course, 'day' => $day, 'time' => $time]);


  }


  public function roomDepartmentAjax($id){
  $rooms = DB::table('rooms')->where('deptid',$id)->get();
    return $rooms;
  }

  public function semesterDepartmentAjax($id){
  $sem = DB::table('semester')->where('deptId',$id)->get();
  return $sem;
  }


public function editSlotPost(Request $request){
  DB::table('slot')->where('slotId', $request->SLOTID)->update(
    [
      'semesterId' => $request->semesterName,
      'instructorId' => $request->instructorName,
      'roomId' => $request->roomName,
      'timeSlot' => $request->timeSlot,
      'courseId' => $request->courseName,
      'Day' => $request->day
    ]
  );

  return redirect('slot')->with('message','A Slot has been updated from the TimeTable');
}



// managing the time table




// multiple user for  timetable maker

// 

public function createUser(Request $request){

  DB::table('users')->insert(
    [
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
  ]
);
return redirect('home')->with('message','Welcome to TimeTable Maker');
}

public function loginUser(Request $req){
  return $req["email"];
}


}
