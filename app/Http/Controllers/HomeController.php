<?php namespace App\Http\Controllers;
use Session;
use App\Articulos;
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
        
        //$Articulos = Articulos::All();

        /*
         *datos de conexión
        */
        $wsdl = "http://187.188.85.203:8036/Sample.asmx?WSDL";

        // 192.168.1.12:8036
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";

		/*
		 * datos de stock
		*/
		$DatosStock = $client->call('getStock',array('SID' => $ID));
		$productos = (string)$DatosStock['getStockResult'];
		$datos = utf8_encode($productos);


		return view('home')->with('datos',$datos);
	}

	public function datos($valor){
		$wsdl = "http://187.188.85.203:8036/Sample.asmx?WSDL";
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
		//return view('producto.detalle');
	}

    public function listarProductos(){
    	$articulos = Articulos::paginate(12);
    	
    	/*
    	$wsdl = "http://localhost:52420/Sample.asmx?WSDL";
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";

		
		 //datos de stock
		
		$DatosStock = $client->call('getStock',array('SID' => $ID));
		$productos = (string)$DatosStock['getStockResult'];
		$articulos = utf8_encode($productos);
        //*/

		return view('producto.listar2')->with('datos',$articulos);
    }
}
	