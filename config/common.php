<?php
	function CalculateConsistencyIndex($eigenMax, $ordo){
		return number_format((number_format($eigenMax, 2, '.', '') - $ordo) / ($ordo - 1), 2, '.', '');
	}
	
	function CalculateConsistencyRatio($consistencyIndex, $ratioIndex){
		return number_format(($consistencyIndex/$ratioIndex) * 100, 2, '.', '');
	}
	
	function GetRandomIndex($ordo) {
		switch ($ordo) {
			case 1 : return "0";
			break;
			case 2 : return "0";
			break;
			case 3 : return "0.58";
			break;
			case 4 : return "0.9";
			break;
			case 5 : return "1.12";
			break;
			case 6 : return "1.24";
			break;
			case 7 : return "1.32";
			break;
			case 8 : return "1.41";
			break;
			case 9 : return "1.46";
			break;
			case 10 : return "1.49";
			break;			
		}
	}
	
	function ConsistencyRatioValidator($consistencyRatio) {
		if ($consistencyRatio > 10) {
			return "(Tidak Konsistent)";
		}
		else {
			return "(Konsisten)";
		}
	}
?>