<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Route;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Roles::paginate(10);
        return view('backend.role.list', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = [];
        $all = Route::getRoutes();

        foreach ($all as $key) {
            $name = $key->getName();
            $pos = strpos($name,'admin');
            if($pos !== false && !in_array($name,$routes)){
                array_push($routes, $name);

            }
        }

        // dd($routes);
        return view('backend.role.add', compact('routes'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required'
        ], ['name.required' => 'Permission name cannot be empty']);
        // array_push($request->route,'admin.admin.login');
        $routes = json_encode($request->route);
        // dd($routes);
        Roles::create(['name' => $request->name, 'permissions' => $routes]);
        return redirect()->route('admin.role.index')->with('success', 'Add permissions successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $model = Roles::find($id);
        $per = json_decode($model->permissions);
        // dd($per);
        $routes = [];
        $all = Route::getRoutes();

        foreach ($all as $key) {
            $name = $key->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes)) {
                array_push($routes, $name);
            }
        }

        return view('backend.role.edit', compact('routes', 'model','per', 'all'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Roles::find($id);
        $routes = [];
        $all = Route::getRoutes();
        $request->validate([
            'name' =>'required'
        ], ['name.required' => 'Permission name cannot be empty']);
        $routes = json_encode($request->route);
        // dd($routes);
        $model->update([
            'name' => $request->name, 
            'permissions' => $routes
        ]);
        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Roles::find($id)->delete();
        return redirect()->route('admin.role.index');
    }
}
