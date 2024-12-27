<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalsController extends Controller
{
  public function index()
  {
    return view ('approvals.index');
  }
}
