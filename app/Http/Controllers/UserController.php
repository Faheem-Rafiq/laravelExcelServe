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
        return Inertia::render('Users', [
            'name' => "Faheem",
        ]);
    }
 
    public function import(Request $request){
        Excel::import(new ImportUser,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
