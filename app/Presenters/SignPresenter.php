<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class SignPresenter extends Nette\Application\UI\Presenter {

    protected function createComponentSignForm(): Form {

	$form = new Form; // means Nette\Application\UI\Form

	$form->addEmail('email', 'E-mail:')
    ->setRequired('Prosím, vyplňte Vaší emailovou adresu');

	$form->addPassword('password', 'Heslo:')
	->setRequired('Prosím, vyplňte Vaše heslo');
    

	$form->addSubmit('send', 'Přihlásit');
    
	return $form;
}

}
