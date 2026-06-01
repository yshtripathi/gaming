<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use App\User;
use Illuminate\Support\Facades\Hash;
class TestController extends Controller
{
    public function test1() {
    $user= User::findorfail(1);
    $user->password=Hash::make('123456');
    
if($user->save())
{
return 'saved';
}
   }
}
