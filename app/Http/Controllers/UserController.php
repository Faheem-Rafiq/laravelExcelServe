<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;
use Inertia\Inertia;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function importView(Request $request){
        $data = User::all();
        return Inertia::render('Users', [
           'users' => $data,
        ]);
    }
 
    public function import(Request $request){
        Excel::import(new ImportUser,
                      $request->file('file')->store('files'));
        return to_route('user');
    }
 
    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
