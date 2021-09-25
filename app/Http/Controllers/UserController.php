<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;

use App\Repositories\PostRepositoryInterface;

class UserController extends Controller
{
    private $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fires link event capturing page url
        $this->repository->saveLinks();
        $Authuser = Auth::User();
        //retrieves all users table
       
        $User = array(               
            'email' => Auth::user()->email,        
        );

        $userDB = $this->repository->getAuthUserByEmail($User);
       //dumps values to view index page for display
        return view('Users.index',['userDB' => $userDB,'notificatiion' => $Authuser->notification]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Users.createform');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //fires link event capturing page url
        $this->repository->saveLinks();
        //save user
        if(Auth::check() && $request->input('roles') != ""){

            $User = array(               
                    'name' => $request->input('Name'),
                    'email' => $request->input('Email'),
                    'password' => $request->input('Password'), 
                    'role' => $request->input('roles'),
                    'admin' => $request->input('Admin')             
                );

            $addUser = $this->repository->addUser($User);
            //need to redirect to user index page with success session message and payload data
            return redirect('/user')->with('success' , 'User Details added');
        }

        return back()->withInput()->with('errors','Error creating try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fires link event capturing page url
        $this->repository->saveLinks();
        //finds user with supplied id to edit
        $user = $this->repository->getUserById($id);
        //display view edit form with user details
        return view('Users.edit',['user' => $user]);
      
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //update user
       
        $UserUpdate = array(
            'id' =>   $user->id,           
            'name' => $request->input('Name'),
            'email' => $request->input('Email'),
            'password' => $request->input('Password'), 
            'role' => $request->input('role'),           
        );

        $User = $this->repository->UpdateUser($UserUpdate);

        if($User){
            //fires link event capturing page url
            $this->repository->saveLinks();
            
            //need to redirect to user index page with success session message and payload data 
            return redirect('/user')->with('success' , 'User Details Updated');
        }
        return back()->withInput()-with('errors','Error creating try again');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
            
        //fires link event capturing page url
        $this->repository->saveLinks();
        //finds user with supplied id to delete
        $finduser = $this->repository->getUserById($user->id);
        //$findtr_user = tr_User::find($user->user_id);

        if($finduser->delete()){
           
            //need to redirect to user index page with success session message and payload data 
            return redirect('/user')->with('success','user deleted successfully');
        }

        return back()->withInput()->with('errors','user couldn\'t be deleted');
    }
}
