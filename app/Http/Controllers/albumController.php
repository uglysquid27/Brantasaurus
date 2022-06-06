<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class albumController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $student = DB::table('student')->paginate(3);
        // return view('student.index',['student'=>$student]);
        // $student =Student::latest();

        // if(request('search')){
        //     $student->where('name','like','%'.request('search').'%');
        // }

        // return view('student.index',[
        //     "name"=>"All Posts",
        //     "active"=>'posts',
        //     "posts"=>$student->get()
        // ]);
        // $student = Student::all(); //take all data from table
        // $paginate = Student::orderBy('id_student', 'asc')->simplePaginate(3)->withQueryString();
        // return view('student.index', [
        //     'student' => Student::orderBy('id_student', 'asc')->search(request(['search']))->paginate(3)->withQueryString()
        // ]);
        $student = Album::with('class')->get(); 
        $paginate = Album::orderBy('id_student', 'asc')->paginate(3);
        return view('student.index', [
            'student' => $student, 'student' => $paginate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $class = ClassModel::all();
    //     return view('student.create',['class'=>$class]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nim' => 'required',
            'Name' => 'required',
            'Address' => 'required',
            'Date_of_birth' => 'required',
            'Class' => 'required',
            'Major' => 'required',
        ]);

        $student = new Album;
        $student->nim = $request->get('Nim');
        $student->name = $request->get('Name');
        $student->major = $request->get('Major');
        $student->address = $request->get('Address');
        $student->Date_of_birth = $request->get('Date_of_birth');

        $class = new ClassModel;
        $class->id = $request->get('Class');

        $student->class()->associate($class);
        $student->save();

        return redirect()->route('student.index')
            ->with('success', 'Student Sucessfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $student = Student::where('nim', $nim)->first();
        return view('student.detail', ['Student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $student = Student::with('class')->where('nim', $nim)->first();
        $class = ClassModel::all();
        return view('student.edit', compact('student','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Name' => 'required',
            'Address' => 'required',
            'Date_of_birth' => 'required',
            'Class' => 'required',
            'Major' => 'required',
        ]);

        $student = Student::with('class')->where('nim', $nim)->first();
        $student->nim = $request->get('Nim');
        $student->name = $request->get('Name');
        $student->major = $request->get('Major');
        $student->address = $request->get('Address');
        $student->Date_of_birth = $request->get('Date_of_birth');
        $student->save();

        $class = new ClassModel;
        $class->id = $request->get('Class');

        $student->class()->associate($class);
        $student->save();

        return redirect()->route('student.index')
            ->with('success', 'Student Succesfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Album::where('nim', $nim)->delete();
        return redirect()->route('student.index')
            ->with('success', 'Student Successfully Deleted');
    }

    public function searchResult($search)
    {
        $query = DB::table("student") ->where('name', 'LIKE', '%'.$search.'%')->get();
        return $query;
    }

    // public function score($nim){
    //     $student = Student::with('course')->where('nim', $nim)->first();
    //     $course_student = Course_Student::all();
    //     return view('student.score', compact('student','course_student'));
    // }

}

