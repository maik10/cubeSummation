<?php 


namespace App\Http\Controllers;

/**
*  Result Controller
*/
class ResultControllet extends Controller
{
	$matrix = array();

	function __construct()
	{
		
		if( !count($this->matriz)>0 ){

			for ($i=0; $i < 3; $i++) { 

				for ($j=0; $j < 3; $j++) { 

					for ($k=0; $k < 3; $k++) { 

						$this->matrix[$i][$j][$k] = 0;

					}

				}	

			}	

		}

	}

	public function update ($n, $x, $y, $z, $val){

		$x1; $y1;

		while ($z <= $n) {
			
			$x1 = $x;

			while ($x1 <= $n) {
				
				$y1 = $y;

				while ($y1 <= $n) {
					
					$this->matrix[$x1][$y1][$z] += $val;
					$y1 += ($y1 & -$y1);

				}
				$x1 += ($x1 & -$x1);
			}
			$z += ($z & -$z);
		}

	}

	public function calculate_sum ($x, $y, $z) {

		$y1; $x1; $sum = 0;

		while ($z > 0 ) {
			
			$x1 = $x;

			while ($x1 > 0) {
				
				$y1 = $y;

				while ($y1 > 0) {
					
					$sum += $this->matrix[$x1][$y1][$z];

					$y1 -= ($y1 & -$Y1);

				}

				$x1 -= ($x1 & -$x1);

			}

			$z -= ($z & -$z);

		}

		return $sum;

	}

}