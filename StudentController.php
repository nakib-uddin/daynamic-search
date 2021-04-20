<?php


namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=student::all();
        return view('index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(){
         
        $select=DB::table('students')->select('Department')->distinct()->get();       
       //return view('create',compact('select'));
         //return view('create')->with('select',$select);
         return view('create',['select'=>$select]);
        
        } 
        
   // public function searchcontent(){   
       // $searchkey =\Request::get('title');
       // $students = student::where('firstName','like','%' .searchkey.'%')->orderby('id')->paginate(5);
       // return view('search',['students'=>$students]);
       // $student = student::find($id);
        //return view('search')->with('student', $student);
   // }
   
      public function search(Request $request){
      $data=$request->all();
      $students = student::where('firstName',$data);
      return view('search',['students'=>$students]);
      }
     
     
    //public function create()
    //{
       // return view('create');
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {      
        
        $student = new student;
        $student->name =$request->name;
        $student->Registration_id =$request->Registration_id;
        $student->Department =$request->Department;
        $student->Info =$request->Info;
        $student->save();
        return redirect()->route('index');
        
       //insert data
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $student = student::find($id);
        return view('edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = student::find($id);

        $student->name=$request->name;
    
        $student ->Registration_id=$request->Registration_id;
        $student -> Department=$request->Department;
        $student -> Info=$request->Info;
        $student->save();

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = student::find($id);
        $student->delete();
        return redirect()->route('index');
    }
}
