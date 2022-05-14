<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\v1\BaseController;
use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;
use DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Format;
use DataTables\Editor\Mjoin;
use DataTables\Editor\Options;
use DataTables\Editor\Upload;
use DataTables\Editor\Validate;
use DataTables\Editor\ValidateOptions;

class StudentController extends BaseController
{
    /*
    list student
    */
    public function index()
    {

        return view('student');
    }

    public function listStudent()
    {
        $student = Student::all();
        $this->sendResponse($student, 'list  successfully.');
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
//            return $data;
            return Datatables::of($data)
                ->addIndexColumn()

                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
