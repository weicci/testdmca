<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	//create a new controller
	//the authenticated user
	//\App\User|null
	protected $user;
	//Is the user signed in?
	//\App\User|null	
	protected $signedIn;
	public function __construct()
	{
		$this->user = $this->signedIn = \Auth::user();
	}

}
