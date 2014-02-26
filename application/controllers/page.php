<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	
	public function index()
	{
		echo '<script>window.open("'.SERVER_URL.'","_top");</script>';
	}
}

