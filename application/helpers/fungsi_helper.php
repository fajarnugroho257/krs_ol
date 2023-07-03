<?php
function cek_login($level = null)
{
	$ci = get_instance();
	$userdata = $ci->session->userdata('login_session');
	if ($userdata['role'] != $level) {
		redirect('404');	
	}
}

?>