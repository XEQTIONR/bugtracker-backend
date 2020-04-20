<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IssueType;

class IssueTypeController extends Controller
{
    //

    public function index(){

        return IssueType::all();

    }
}
