<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class RegisterPresenter extends Nette\Application\UI\Presenter {

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

}