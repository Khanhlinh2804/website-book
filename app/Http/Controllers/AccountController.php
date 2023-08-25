<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use App\Models\UserRole;
use App\Models\Roles;
use App\Http\Requests\Account\AccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $account = User::with('getRoles')->orderByDesc('id','desc')->paginate(10);
        return view('backend.account.list', compact('account'));
    }
    public function trashed()
    {

        $account = User::onlyTrashed()->with('getRoles')->orderByDesc('id','desc')->paginate(10);
        return view('backend.account.trash', compact('account'));
    }
    public function restore($id){
        $account = User::withTrashed()->find($id);

        if ($account) {
            $account->restore();
            return redirect()->route('admin.account.index')->with('success', 'User restored successfully.');
        } else {
            return redirect()->route('admin.account.index')->with('error', 'User not found.');
        }
    }
    public function deleteforce($id){
        $account = User::withTrashed()->find($id);

        if ($account) {
            $account->forceDelete();
            return redirect()->route('admin.account.index')->with('success', 'User restored successfully.');
        } else {
            return redirect()->route('no_delete')->with('error', 'User not found.');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('backend.account.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
       $request->validate ( [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $password = Hash::make($request->password); 
        $request->merge(['password' => $password]);

        $user = User::create($request->all());

        if ($user) {
            if (is_array($request->role)) {
                foreach ($request->role as $role_id) {
                    UserRole::create([
                        'user_id' => $user->id,
                        'role_id' => $role_id
                    ]);
                }
            }

            return redirect()->route('admin.account.index')->with('success', 'Create account successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create account');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $role_assignments = $user->getRoles()->get()->pluck('name','id')->toArray();
        // dd($role_assignments);
        $roles = Roles::all();
        return view('backend.account.edit_role', compact('roles','user','role_assignments'));

        // dd($id);
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
        $user = User::find($id);
        $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'phone'=>'required',
        ];
        
        $messages =[
            'name.required' =>'Account name cannot be empty',
            'email.required' =>'Account email cannot be empty',
            'phone.required' =>'Account phone cannot be empty'
        ];

        if($request->password = ''){
            $rules['comfirm_password'] = 'required|same:password';
            $messages['comfirm_password.required'] = 'Vui lòng nhập lại mật khẩu';
            $messages['comfirm_password.same'] = 'Nhập lại mk';
            $data['password'] = bcrypt($request->password);

        }
        // dd($request->all());
        $request->validate($rules,$messages);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ];

        $user->update($request->only('name', 'email', 'phone'));
        
        if (is_array($request->role)) {
            UserRole::where('user_id', $user->id)->delete();
            foreach ($request->role as $role_id) {
               UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $role_id
            ]);

            }
            
            return redirect('/admin/account')->with('success', 'Update successfully');
        } else {
            return redirect('/admin')->with('error', 'Update unsuccessfully');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.account.index');
    }
    
}

