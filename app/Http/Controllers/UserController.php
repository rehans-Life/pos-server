<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $req)
    {
        $user = new User();

        try {
            $res = $user->addUser($req->all());
            // Returning true or false as to weather if the data
            // has been inserted into the database or not.
            return ["inserted" => $res];
        } catch (\Throwable $th) {
            return ["inserted" => false];
        }

    }

    public function checkEmail(Request $req)
    {
        $user = new User();

        $res = $user->getUserWithEmail($req->all());

        if (count($res) == 0) {
            return ["exists" => false];
        } else {
            return ["exists" => true];
        }
    }

    public function checkUser(Request $req)
    {
        $user = new User();

        $res = $user->getUser($req->all());

        if (count($res) == 0) {
            return ["exists" => false];
        } else {
            return ["exists" => true];
        }
    }
}