<?php

namespace App\Http\Controllers;

class PawnController
{
    public function __construct()
    {
    }

    public function index() {
        return view('pawn.pawn');
    }
}
