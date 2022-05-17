<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\v1\BaseController;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;


class StudentController extends BaseController
{
    /*
    list student
    */
    public function index()
    {

        $student = Student::all();
        return view('student.student', compact('student'));
    }

    public function listStudent()
    {
        $student = Student::all();
        $this->sendResponse($student, 'list  successfully.');
    }

    /**
     * @param Student $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Student $student)
    {
//        dd($student->id);
        return view('student.StudentEdit', compact('student'));
    }

    public function show(Request $request, Student $student)
    {


    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'dob' => 'required',
        ]);


        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->username = $request->input('username');
        $student->phone = $request->input('phone');
        $student->dob = $request->input('dob');
        $student->save();

        return redirect('Student');
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'dob' => 'required',
        ]);
        $student->fill([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'username'=>$request->username,
            'dob'=>$request->dob,
        ]);

        $student->update();
        return redirect()->back();
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
//            return $data;
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button type="button" name="edit" id="'. $row->id .'" class="edit btn btn-primary btn-sm"> Edit</button>';
                    $actionBtn .= '<button type="button" name="edit" id="'. $row->id .'" class="delete btn btn-danger btn-sm"> delete</button>';
                    $actionBtn .= '<button type="button" name="add" id="'. $row->id .'" class="add btn btn-info btn-sm"> add </button>';
                    return  $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
//

                    //`<input href="javascript:void(0)" type="checkbox"  id="' + $row.id +'" onclick="editClick(this)">Edit</button>`;

//                    return $actionBtn;
//                })

        }
    }

    public function delete($id)
    {
        Student::query()->findOrFail($id)->delete();
        return redirect('Student');

    }
}
