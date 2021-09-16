<?php namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class RevisorController extends Controller {

    /* ----------------------------------Envolver el revisor controller para que funcione--------------------------------------------------- */
    public function __construct() {
        $this->middleware('auth.revisor');
    }

    /* ----------------------------------Envolver el revisor controller para que funcione--------------------------------------------------- */

    public function index() {

        $ad=Ad::where('is_accepted', null) ->orderBy('created_at', 'desc') ->first();
        return view('revisor.home', compact('ad'));
    }

    public function accept($ad_id) {
        return $this->setAccepted($ad_id, true);
    }

    public function reject($ad_id) {
        return $this->setAccepted($ad_id, false);
    }

    private function setAccepted($ad_id, $value) {
        $ad=Ad::find($ad_id);
        $ad->is_accepted=$value;
        $ad->save();
        return redirect()->route('revisor.home');
    }

}
