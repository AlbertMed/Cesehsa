<?php namespace App\Http\Controllers;
use Session;
class HomeController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(){
		$wsdl = "http://localhost:52420/Sample.asmx?WSDL";
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";

		/*
		* funcion para traer una lista de todos los productos
		 */
		$ItemList = $client->call('GetItemList',array('SID' => $ID ));
		//$xml = $client->call('AsString',array('xmlDoc' => $ItemList['GetEmptyBPXmlResponse']));
		$productos = (string)$ItemList['GetItemListResult'];
		$datos = utf8_encode($productos);

         /*
         * funcion para traer el detalle de cada producto
          */
		$detalle = $client->call('GetDetalle',array('SID' => $ID , 'producto' => $valor));
		$producto = (string)$ItemList['GetDetalleResult'];
		$dato = utf8_encode($producto);

		$data = array(
            'datos' => $datos,
            'detalle' => $dato
        );
		
		return view('home',$data);
	}

	public function datos($valor){
		$wsdl = "http://localhost:52420/Sample.asmx?WSDL";
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";
        /*
          funcion para sacar el detalle de un producto 
         */
		$ItemList = $client->call('GetDetalle',array('SID' => $ID , 'producto' => $valor));
		$productos = (string)$ItemList['GetDetalleResult'];
		$datos = utf8_encode($productos);




		return view('detalle_producto')->with('datos',$datos);
	}


}
	