<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'nombre' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 * 
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data){

        $wsdl = "http://localhost:52420/Sample.asmx?WSDL";
       $client = new \nusoap_client($wsdl, true);
      

		//create client object
        
        $name  =$data['nombre'];        
		$telefono = $data['telefono'];
		$email = $data['email'];
		
        $idLogin = $client->call('Login');

        $ID = $idLogin['LoginResult']."";
        
        $numsima = $client->call('getfinalLead',array('id' => $ID));
        $result1 = $numsima['getfinalLeadResult'];
        $numLead = $client->call('SumLead',array('Lead'=>$result1));
        $result2 = $numLead['SumLeadResult'];
		
		$resultAddBP = $client->call('AddLead',array('id' => $ID,
		                                     'cardCode'=> $result2,			                                 
			                                  'name'=>$name, 			                                
			                                 'tel' => $telefono,
			                                 'email' => $email
			                                 ));
		
		 $result = $resultAddBP['AddLeadResult']."";

        
            $user = User::create([
			'nombre' => $data['nombre'],
			'email' => $data['email'],
			'telefono' =>$data['telefono'],
			'password' => bcrypt($data['password']),
			'sapResultado' => $result,
		]);

            $userActivo = User::firstOrCreate(['email' => $data['email']]);            
            $user->sapResultado = $result;
            $user->save();
		return $user;
	}

}
