<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class RegisterPresenter extends Nette\Application\UI\Presenter {

    //Připojení do databáze
    private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

    //vytvoření registračního formulář
    protected function createComponentRegisterForm(): Form {

	$form = new Form; // means Nette\Application\UI\Form

    $form->addText('name', 'Jméno:')
    ->setRequired('Prosím, vyplńte Vaše jméno');

    $form->addText('surname', 'Příjmení:')
    ->setRequired('Prosím, vyplńte Vaše příjmení');

	$form->addEmail('email', 'E-mail:')
    ->setRequired('Prosím, vyplńte Vaší emailovou adresu');

	$form->addPassword('password', 'Heslo:')
		->setRequired('Prosím, vyplńte Vaše heslo');

        $form->addCheckbox('agree', 'Souhlasím se zpracováním osobních údajů')
        ->setRequired('Je potřeba souhlasit s osobníma údajema')
        ->setHtmlAttribute('class','register_check');
    
	$form->addSubmit('send', 'Registrovat');
    
    $form->onSuccess[] = [$this, 'registerFormSucceeded'];

	return $form;
    }

    //vložení dat do db
    public function registerFormSucceeded(\stdClass $data): void {
	
	$this->database->table('registrace')->insert([

		'jmeno' => $data->name,
		'prijmeni' => $data->surname,
		'email' => $data->email,
        'heslo' => $data->password,
	]);

	$this->flashMessage('Úspěšně jste se registroval/a', 'success');
	$this->redirect('this');
}


}