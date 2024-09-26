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
    'name' => 'required|string',
    'email' => 'required|unique:users,email',
    'password' => 'required|min:6'],
);

$userModel = new User();
$userModel->name = $req->name;
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
            'name' => 'string|required',
            'email' => 'email|unique:users,email|required',
            'password' => 'required|min:6'
        ]);

        $user -> update([
            'name' => $req -> name,
            'email' => $req -> email,
        ]);

        return redirect(route("show_users"))->with("success", "User successfully updated");
}
}
