<?php
namespace App\Model;
use \Nette;

class registerToDatabase 
{

    //Připojení do databáze
    private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

    //vložení dat do db
    public function registerFormSucceeded(\stdClass $data): void {
	
        $this->database->table('registrace')->insert([
    
            'jmeno' => $data->name,
            'prijmeni' => $data->surname,
            'email' => $data->email,
            'heslo' => $data->password,
        ]);
    }

}
