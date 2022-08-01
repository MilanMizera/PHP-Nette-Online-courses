<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class RegisterPresenter extends Nette\Application\UI\Presenter {

    protected function createComponentRegisterForm(): Form {

	$form = new Form; // means Nette\Application\UI\Form

    $form->addText('name', 'Jméno:');

    $form->addText('surname', 'Příjmení:');

	$form->addEmail('email', 'E-mail:')
    ->setRequired();

	$form->addPassword('password', 'Heslo:')
		->setRequired();

        $form->addCheckbox('agree', 'Souhlasím se zpracováním osobních údajů')
        ->setRequired('Je potřeba souhlasit s osobníma údajema');
    
	$form->addSubmit('send', 'Přihlásit');
    
	return $form;
}
}