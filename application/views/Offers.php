<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$query = $this->db->get('test_offer');
	if ($query->num_rows()!=0){
		echo '<style type="text/css">.offerdiv{display:inline-block; margin:30px 20px 20px 10px; min-height: 300px; min-width: 500px; background:#fff;border: 1px solid #D0D0D0; box-shadow: 0 0 8px #D0D0D0;}</style><div class="offerdiv">';
		foreach ($query->result_array() as $row)
		{
			echo '</br><a style="color:#00acf8; font-family: Arial, sans-serif; margin:20px 10px 10px 20px;" href="https://millcloud.ru/Out?time_offer='.$row['time_offer'].'" target="_blank">'.$row['time_offer'].'</a></br>';
		}
		echo '</div>';
	}
	else {
		echo '<style type="text/css">.offerdiv{display:inline-block; margin: 30px 20px 20px 20px; min-height: 300px; min-width: 500px; background:#fff;border: 1px solid #D0D0D0; box-shadow: 0 0 8px #D0D0D0; color:#ddd; font-weight: bolder; font-size: 24pt; font-family: Arial, sans-serif;}</style><div class="offerdiv"></br>Исходящих предложений пока нет</div>';
	}


?>
