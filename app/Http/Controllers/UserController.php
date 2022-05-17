<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::all();

        if ($request->ajax()) {
            $data = User::get();
            return DataTable::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("user");
    }

    /**
     *
     * get all  datatable
     *
     **/
    public function ListUser(Request $request)
    {
//        return view("user");
        if ($request->ajax()) {
//            $data = User::query();
            $data = User::latest()->get();
//            dd($data);
//            return $data;
//            return DataTables::of($data)
//            $data = User::query();
////            return $data;eloquent query()
            return DataTable::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a type="button" name="edit" id="'. $row->id .'" class="edit btn btn-primary btn-sm"> Edit</a>';
                    $actionBtn .= '<a type="button" name="edit" id="'. $row->id .'" class="delete btn btn-danger btn-sm"> delete</a>';
                    $actionBtn .= '<a type="button" name="savearticle" id="'. $row->id .'" class="savearticle btn btn-success btn-sm"> save Article</a>';
                    $actionBtn .= '<a type="button" name="add" id="'. $row->id .'" class="add btn btn-info btn-sm"> add </a>';
                    return  $actionBtn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
