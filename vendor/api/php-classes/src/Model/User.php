<?php

namespace Api\Seas\Model;

use \Api\Seas\DB\Sql;
use \Api\Seas\Model;

class User extends Model {

    const SESSION = "User";
	const SECRET = "HcodePhp7_Secret";
	const SECRET_IV = "HcodePhp7_Secret_IV";
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const SUCCESS = "UserSucesss";

	public static function getFromSession()	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {

			$user->setData($_SESSION[User::SESSION]);
		}

		return $user;
    } //FIM DO MÉTODO "getFromSession"

    public static function checkLogin($perfil = Perfil::Administrador) {

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		) {
			//Não está logado
			return false;
		} else {

			if ($perfil == Perfil::Administrador && $_SESSION[User::SESSION]['idperfil'] ==  Perfil::Administrador) {

				return true;
			} else if ($perfil == Perfil::Administrador) {

				return true;
			} else {

				return false;
			}
		}
	}//FIM DO MÉTODO "checkLogin"

    public static function login($login, $password)	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.idperson = b.idperson WHERE a.deslogin = :LOGIN", array(
			":LOGIN" => $login
		)); // resultado de consulta no banco 
		
		if (count($results) === 0) {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];

		if (password_verify($password, $data["despassword"]) === true) {

			$user = new User();

			$data['nome'] = utf8_encode($data['nome']);

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;
		} else {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}
	}// FIM DO MÉTODO LOGIN

	public static function verifyLogin($perfil = Perfil::Administrador)
	{

		if (!User::checkLogin($perfil)) {

			if ($perfil == Perfil::Administrador) {
				header("Location: /index");
			} else {
				header("Location: /");
			}
			exit;
		}
	}
	
	public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;
	}

	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;
	}

	public static function clearError()
	{
		$_SESSION[User::ERROR] = NULL;
	}

} // FIM DA CLASSE "USER"