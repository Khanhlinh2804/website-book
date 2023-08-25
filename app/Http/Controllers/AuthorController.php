<?php

namespace App\Http\Controllers;
use App\Models\Classify;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\Author\AuthorValidate;
// use App\Http\Requests\authorUpdateRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author= Author::orderByDesc('id','desc')->paginate(10);
        // dd($author);
        return view('backend.author.list', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classify = Classify::all();
        return view('backend.author.add', compact('classify'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Author::create($request->all());
        return redirect()->route('admin.author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $author = Author::find($id);
        $classify = Classify::all();
        return view('backend.author.edit', compact('classify', 'author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorValidate $request, author $author)
    {
        $form_data = $request->all('name','status');
        $request->validated();
        $author->update([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.author.index')->with('success','update author successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth= author::find($id);
        try {
            $auth->delete();
            return redirect()->route('admin.author.index');
        } catch (\Throwable $th) {
            return redirect()->route('no_delete');
        }
    }
}
