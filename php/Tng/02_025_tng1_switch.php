<?php
// 1등 금상, 2등 은상, 3등 동상, 4등 장려상 그 외는 노력상

$rank = 1;
$award ="";

// switch($rank) {
// 	case 1:
// 		$award = "금상";
// 		break;
// 	case 2:
// 		$award = "은상";
// 		break;
// 	case 3:
// 		$award = "동상";
// 		break;
// 	case 4:
// 		$award = "장려상";
// 		break;
// 	default:
// 		$award = "노력상";
// 		break;
// }


if($rank === 1){
	$award = "금상";
}
else if($rank === 2){
	$award = "은상";
}
else if($rank === 3){
	$award = "동상";
}
else if($rank === 4){
	$award = "장려상";
}
else {
	$award = "노력상";
}

echo $award;

?>