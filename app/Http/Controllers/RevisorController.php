<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisorController extends Controller {
/* ----------------------------------Envolver el revisor controller para que funcione--------------------------------------------------- */
    public function __construct() {
        $this->middleware('auth.revisor');
    }
/* ----------------------------------Envolver el revisor controller para que funcione--------------------------------------------------- */

    public function index() {
        
    }

}
