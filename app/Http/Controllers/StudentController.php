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
            $data = Student::latest();
//            return $data;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route("students.edit", ['student' => $row->id]) . '"data-original-title="Detail" class="btn btn-primary mr-1 btn-sm detailProduct">ویرایش<span class="fas fa-eye"></span></a><a href="' . route("students.destory", ['student' => $row->id]) . '"data-original-title="Detail" class="btn btn-danger mr-1 btn-sm deleteStudent">حذف<span class="fas fa-eye"></span></a>';
                    //'<a href="'.route("students.edit",['student'=>$row->id]).'"data-original-title="Detail" class="btn btn-primary mr-1 btn-sm detailProduct"><span class="fas fa-eye"></span></a><a href="javascript:void(0)" id="' + $row.id +'" class="showStudent ml-2 btn btn-primary btn-sm">نمایش</a> <a href="" id="' + $row.id +'" class="deleteStudent btn btn-danger btn-sm">حذف</a>';


                    //`<input href="javascript:void(0)" type="checkbox"  id="' + $row.id +'" onclick="editClick(this)">Edit</button>`;

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function delete(Student $student)
    {
        $student->delete();
        return response()->json(['success' => 'حذف با موققیت انجام شد!']);

    }
}
