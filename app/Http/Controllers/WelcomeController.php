<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wsdl = "http://localhost:52420/Sample.asmx?WSDL";
			$client = new \nusoap_client($wsdl, true);
			$idLogin = $client->call('Login');
			$ID = $idLogin['LoginResult']."";
			$ItemList = $client->call('GetItemList',array('SID' => $ID ));
			$productos = (string)$ItemList['GetItemListResult'];
			$dato = utf8_encode($productos);
		    return view('home')->with('datos',$dato);

	}

}
