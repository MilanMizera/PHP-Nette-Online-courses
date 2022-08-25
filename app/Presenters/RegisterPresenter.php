<?php

declare(strict_types=1);

namespace App\Presenters;

use \Nette;
use Nette\Application\UI\Form;
use App\Model\registerToDatabase;


final class RegisterPresenter extends Nette\Application\UI\Presenter {

    private $registerToDatabase;

    public function __construct (registerToDatabase $registerToDatabase) {

        $this->registerToDatabase=$registerToDatabase;
      
    }

    //vytvoření registračního formulář
    protected function createComponentRegisterForm(): Form {

        $form = new Form; // means Nette\Application\UI\Form

        $form->addText('name', 'Jméno:')
            ->setRequired('Prosím, vyplňte Vaše jméno');

        $form->addText('surname', 'Příjmení:')
            ->setRequired('Prosím, vyplňte Vaše příjmení');

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Prosím, vyplňte Vaší emailovou adresu');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Prosím, vyplňte Vaše heslo');

        $form->addCheckbox('agree', 'Souhlasím se zpracováním osobních údajů')
            ->setRequired('Je potřeba souhlasit s osobníma údajema')
            ->setHtmlAttribute('class','register_check');
        
        $form->addSubmit('send', 'Registrovat');
        
        $form->onSuccess[] = [$this, 'onFormSucceeded'];

        return $form;
    }
public function onFormSucceeded(\stdClass $data) 
{
    $this->registerToDatabase->registerFormSucceeded($data);
    $this->flashMessage('Úspěšně jste se registroval/a', 'success');
    $this->redirect('this');

}
}