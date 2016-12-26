<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/profile.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/price.js"></script>
	<title>
		<?php
			$gr=$_GET['g'];
			$us=$_GET['u'];
			if ($gr=='0') { $bdsel='all_users';} else {$bdsel='g_users';}
			$query=$this->db->query("SELECT * FROM $bdsel WHERE u_id='$us'");
	    foreach ($query->result() as $row)
	    {
	      echo $row->u_name;
	    }
		?>
	</title>
</head>
<body>
	<div class="info">

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$gr=$_GET['g'];
	$us=$_GET['u'];

	$uid=$this->session->userdata('u_id');
	$gid=$this->session->userdata('g_id');
	if ($gr==$gid && $us==$uid) {header("Location: https://millcloud.ru/Profile");}
		else {
	if ($gr=='0') { $bdsel='all_users';} else {$bdsel='g_users';}
	$query=$this->db->query("SELECT * FROM $bdsel WHERE u_id='$us'");
	foreach ($query->result() as $row)
	{
		$u_name=$row->u_name;
		$u_position=$row->u_position;
		$u_email=$row->u_email;
		$u_phone=$row->u_phone;
		$u_skype=$row->u_skype;
		$u_icq=$row->u_icq;
		$u_linkedin=$row->u_linkedin;
		$avatar=$row->avatar;
		$ava=$row->avatar;

		$uid=$this->session->userdata('u_id');
		$table=$uid.'_friends';
		$query=$this->db->query("SELECT * FROM $table WHERE friend_id='$us'");
		if ($query->num_rows()>0) {
			$info= '<img src="https://millcloud.ru/Users/'.$gr.'/'.$us.'/'.$ava.'" class="avatar"/>'
			.'<a href="https://millcloud.ru/Partners?delfriend='.$us.'">Удалить из партнёров</a>'
			."<p>".$u_name."</p>"."<p>".$u_position."</p>"."<p>Email: ".'<a href="mailto:'.$u_email.'">'.$u_email."</a></p>"
			."<p>Телефон: ".$u_phone."</p>"
			."<p>Skype: ".'<a href="skype:'.$u_skype.'">'.$u_skype."</a></p>"
			."<p>Icq: ".$u_icq."</p>"."<p>linked In: ".$u_linkedin."</p>";
			echo $info;
		}
		else {
		$info= '<img src="https://millcloud.ru/Users/'.$gr.'/'.$us.'/'.$ava.'" class="avatar"/>'
		.'<a href="https://millcloud.ru/Partners?addfriend='.$us.'">+ Добавить в партнеры</a>'
		."<p>".$u_name."</p>"."<p>".$u_position."</p>"."<p>Email: ".'<a href="mailto:'.$u_email.'">'.$u_email."</a></p>"
		."<p>Телефон: ".$u_phone."</p>"
		."<p>Skype: ".'<a href="skype:'.$u_skype.'">'.$u_skype."</a></p>"
		."<p>Icq: ".$u_icq."</p>"."<p>linked In: ".$u_linkedin."</p>";
		echo $info;
		}
	}
}
?>
</div>

</body>
</html>
