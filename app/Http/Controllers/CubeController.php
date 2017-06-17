<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\processPostRequest;

class CubeController extends Controller
{
    //

	public function index(){

		return view('cube.commandline');

	}

	public function process (processPostRequest $request) {

		Session::put('lq', $request->command);
		
		$parts = explode(' ', $request->command);

		$action = $parts[0][0];

		if($action == 'U'){

			$x = (int)$parts[1];
			$y = (int)$parts[2];
			$z = (int)$parts[3];
			$w = (int)$parts[4];
			$response = $this->update_matrix($x,$y,$z,$w);

		}elseif($action == 'Q'){
			$x1 = (int)$parts[1];
			$y1 = (int)$parts[2];
			$z1 = (int)$parts[3];
			$x2 = (int)$parts[4];
			$y2 = (int)$parts[5];
			$z2 = (int)$parts[6];

			$response = $this->query_matrix($x1,$y1,$z1,$x2,$y2,$z2);

		}else{

			if(count($parts)==2){

				$response = $this->create_matrix();

			}

		}

		return view('cube.commandline', ['response' => $response, 'lq' => Session::get('lq') ]);

	}

	private function create_matrix(){

		Session::put('data', array());

		return 'Creado';

	}

	private function update_matrix($x,$y,$z,$w){
		
		$data = Session::get('data');
		$data["$x,$y,$z"] = $w;
		Session::put('data', $data);

		return 'Actualizado';

	}

	private function query_matrix($x1,$y1,$z1,$x2,$y2,$z2){

		$data = Session::get('data');
		$sum = 0;
		foreach($data as $key=>$v){
			$parts = explode(",",$key);
			$x = (int)$parts[0];
			$y = (int)$parts[1];
			$z = (int)$parts[2];
			if(     $x >= $x1 && $x <= $x2 && 
				$y >= $y1 && $y <= $y2 && 
				$z >= $z1 && $z <= $z2)
			{
				$sum += $v;
			}
			
		}
		return $sum;

	}

}
