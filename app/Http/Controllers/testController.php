<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulos;
class testController extends Controller {
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		//
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create(){
		//
	
	}
	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store(){
		//instancia de Nsoap para poder hacer la comnicacion con el servicio web
	    $wsdl = "http://localhost:52420/Sample.asmx?WSDL";
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";
		$ItemList = $client->call('GetDetalle',array('SID' => $ID ));
		//$xml = $client->call('AsString',array('xmlDoc' => $ItemList['GetEmptyBPXmlResponse']));
		$productos = (string)$ItemList['GetDetalleResult'];
		$datos = utf8_encode($productos);
		//echo $ItemList['GetDataFullResult']."";
		//$datos =
		// <alumnos>
				//<alumno nombre='Eveldi' apellido='Ventrue'>
						//<matricula>2525143</matricula>
				//</alumno>
		//</alumnos>";
		$BOM = new \SimpleXMLElement($datos);
		//echo $datos;
		//$numProductos = (int)$BOM->BO->Items->row->count();
		//for ($i=0; $i < $numProductos ; $i++) {
		
		echo "Item Code: ";
		echo $BOM->BO->Items->row->ItemCode;
		echo "<br>";
		echo "Item Name: ";
		echo $BOM->BO->Items->row->ItemName;
		echo "<br>";
		echo "Item Price: ";
		echo ($BOM->BO->Items_Prices->row[0]->Price)*16;
		//}
	}
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id)
	{
		//
	}
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		//
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id)
	{
		//
	}
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{
		//
	}

	public function registro()
	{
		set_time_limit ( 1200 );
		
    	$wsdl = "http://localhost:52420/Sample.asmx?WSDL";
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";

		
		 //datos de stock
		
		$DatosStock = $client->call('getStock',array('SID' => $ID));
		$productos = (string)$DatosStock['getStockResult'];
		$articulos = utf8_encode($productos);
        //*/


	$BOM = new \SimpleXMLElement($articulos);
				       //echo $datos;
	$numProductos = (int)$BOM->BO->OITW->row->count();
    for($i=0; $i<$numProductos; $i++){ 
       
       if(!empty($BOM->BO->OITW->row[$i]->ItemName)) { 

			$articulos =array(
				'id'=>$i,
				'ItemCode'=>(string)$BOM->BO->OITW->row[$i]->ItemCode,
				'ItemName'=>(string)$BOM->BO->OITW->row[$i]->ItemName
			);

            Articulos::create($articulos);
            
            }
		}	
    
	}
}