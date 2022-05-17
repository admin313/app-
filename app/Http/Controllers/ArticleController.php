<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Student;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("articles.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view("articles.create", compact("article", 'tags', "categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Article $article)
    {
//        dd($request->all());
        /*        $article->fill([
                    "title" => $request->title,
                    "slug" => $request->slug,
                    "description" => $request->description,
                    "category_id" => $request->category_id,
                    "user_id" => $request->user_id,
                ]);*/
        $article->create($request->all());
        $art = $request->tag;
//        dd($art);
//        $article->tags()->sync([1,2,3],false);
        $article->tags()->attach(1);
//        return redirect()->route('article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("articles.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("articles.edit", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->fill([
            "title" => $request->title,
            "slug" => $request->slug,
            "image" => $request->image,
            "description" => $request->description,
            "active" => $request->active,
            "category_id" => $request->category_id,
        ]);
        $article->create();
        $article->tags()->sync(array($request->tag));
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('massage', "حذف با موفقیت انجام شد");
    }
    public function getarticle(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::query();

            return Datatables::elequent($data)
                ->addIndexColumn()
                ->editColumn('id', 'ID: {{$id}}')
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="' . route("students.edit", ['student' => $row->id]) . '"data-original-title="Detail" class="btn btn-primary mr-1 btn-sm detailProduct">ویرایش<span class="fas fa-eye"></span></a>
        <button  data-original-title="Detail" class="btn btn-primary mr-1 btn-sm saveArticle">ثبت مقاله<span class="fas fa-eye"></span></button>
<a href="' . route("students.destory", ['student' => $row->id]) . '"data-original-title="Detail" class="btn btn-danger mr-1 btn-sm deleteStudent">حذف<span class="fas fa-eye"></span></a>';
//href="' . route("articles.create", ['student' => $row->id]) . '"

                    //`<input href="javascript:void(0)" type="checkbox"  id="' + $row.id +'" onclick="editClick(this)">Edit</button>`;

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
