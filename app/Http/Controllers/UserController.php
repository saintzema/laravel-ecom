<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use function Pest\Laravel\delete;

class UserController extends Controller
{

public function showCreateNewUserForm(){
        return view('createUser');
    }
public function aboutPage(){
    return view("about");
}

public function storeUserData(Request $req){
        // return $req-> input('email')
$req -> validate([
    'first_name' => 'required|string',
    'last_name' => 'required|string',
    'email' => 'required|unique:users,email',
    'password' => 'required|min:6'],
);

$userModel = new User();
$userModel->first_name = $req->first_name;
$userModel->last_name = $req->last_name;
$userModel->email = $req->email;
$userModel->password = $req->password;
$userModel->save();

return redirect(route('show_users'))->with('success', "New User Created Successfully");    }

public function contact(){
    return view("contact");
}

public function showUsers(){

        return view('showUsers', [
            'users'=>User::latest()->get()
        ]);
    }

    public function deletedUser(User $user){
        $user -> delete();
        return redirect()->back()->with("success", "User has been deleted successfully");
    }

    public function editUser(User $user){

        return view("editUser", compact('user'));
}

public function updateUser(User $user, Request $req){
        $req->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'email|unique:users,email|required',
            'password' => 'required|min:6'
        ]);

        $user -> update([
            'first_name' => $req -> first_name,
            'last_name' => $req -> last_name,
            'email' => $req -> email,
        ]);

        return redirect(route("show_users"))->with("success", "User successfully updated");
}
}
