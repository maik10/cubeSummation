<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\processPostRequest;

class CubeController extends Controller
{
    //

	public function index(){

		return view('cube.commandline');

	}

	public function process (processPostRequest $request) {

		$lines = explode(' ', $request->command);
		dd( $lines );

	}

}
