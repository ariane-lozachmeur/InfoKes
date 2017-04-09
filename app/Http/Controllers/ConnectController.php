<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\User;
use App\Http\Controller\UserController;
use Cas;

use App\Http\Requests;

class ConnectController extends Controller
{
    public function frankizLogin() {
        if(!isset($_GET['response'])){
          $this->frankiz_do_auth();
        }
        $user = (object) $this->frankiz_get_response();
    	Session::put('user',$user);
        $rights = $user->rights;
        $role = 1;
        if (in_array('restricted', $rights['kes'])) { $role = 2; }
        if (in_array('restricted', $rights['ik'])) { $role = 3; }
    	Session::put('user',$user);
    	Session::put('role',$role);
    	return redirect('')->with('message', "Tu es maintenant connecté en tant que $user->firstname $user->lastname");
    }

    public function casLogin(){
        Cas::authenticate();
        $user = Cas::getCurrentUser();
        $attributes = Cas::getAttributes();
        $name = $user;
        if (isset ($attributes["name"])) {
            $name = $attributes["name"];
        }
        var_dump($attributes);
        die;
    	Session::put('user',$user);
    	Session::put('name',$name);
    	Session::put('role',1);
    	return redirect()->back()->with('message', "Tu es maintenant connecté en tant que $name");
    }

    public function login(Request $request){
    	$input = $request->all();
    	$user = User::where('name',$input['login'])->first();
    	if ($user!= null && $user->password = $input['password']){
    		Session::put('user',$user);
    		Session::put('role',$user->role);
    		return redirect()->back()->with('message', "Tu es maintenant connecté en tant que $user->name");
    	}
    	else{
    		return redirect()->back()->with('message', "Erreur de connection");
    	}
    }

    public function logout(Request $request){
    	Session::flush();
        // Cas::logout();
    	return redirect()->back()->with('message', "Tu as bien été déconnecté.");
    }

    private $FKZ_KEY = "skfI37u6kigI";

    private function frankiz_do_auth(){
      $FKZ_KEY = $this->FKZ_KEY;
      /**
       * Prendre le timestamp permet d'éviter le rejet de la requête
       */
      $timestamp = time();
      /**
       * url de la page de login, doit correspondre *exactement* à celle entrée dans
       * la base de données de Frankiz (définie lors de l'inscription)
       */
      $site = 'http://new.ik.binets.fr/infokes/public/frankizlogin';
      /**
       * Nature de la requête.
       * Fkz renverra ici à la fois les noms de la personne mais aussi ses droits dans différents groupes.
       * Il faut cependant que le site ait les droits sur les informations en question (à définir lors de son inscription).
       */
      $request = json_encode(array('names', 'rights', 'email', 'promo'));

      $hash = md5($timestamp . $site . $FKZ_KEY . $request);

      $remote  = 'https://www.frankiz.net/remote?timestamp=' . $timestamp .
          '&site=' . $site .
          '&hash=' . $hash .
          '&request=' . $request;
       header("Location:" . $remote);
       exit();
    }

    function frankiz_get_response(){
       $FKZ_KEY = $this->FKZ_KEY;
       // Read request
       $timestamp = (isset($_GET['timestamp']) ? $_GET['timestamp'] : 0);
       $response  = (isset($_GET['response'])  ? urldecode($_GET['response'])  : '');
       $hash      = (isset($_GET['hash'])      ? $_GET['hash']      : '');
       $location  = (isset($_GET['location'])  ? $_GET['location']  : '');

       // Frankiz security protocol
       if (abs($timestamp - time()) > 600)
          die("Délai de réponse dépassé. Annulation de la requête");
       if (md5($timestamp . $FKZ_KEY . $response) != $hash)
          die("Session compromise.");

       $response = json_decode($response, true);
       $response['location'] = $location;

       // Set empty fields
       $fields = array('hruid',
         'firstname', 'lastname', 'nickname',
         'promo', 'rights', 'promo');
       foreach ($fields as $k) {
          if (!isset($response[$k]))
          $response[$k] = '';
       }
       return $response;
    }
}
