<?php
namespace Strapieno\User\Api\V1\InputFilter;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter as ZendInputFilter;

/**
 * Class PostInputFilter
 */
class InputFilter extends ZendInputFilter
{
    public function init()
    {
        $this->addUserNameInput()
            ->addEmailInput()
            ->addFirstNameInput()
            ->addLastNameInput()
            ->addBirthDate()
        ;
    }

    /**
     * @return $this
     */
    protected function addUserNameInput()
    {
        $input = new Input('user_name');
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('user-usernamealreadyexist'));
        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addEmailInput()
    {
        $input = new Input('email');
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('emailaddress'));
        $input->getValidatorChain()->attach($validatorManager->get('user-emailalreadyexist'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addFirstNameInput()
    {
        $input = new Input('first_name');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addLastNameInput()
    {
        $input = new Input('last_name');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addBirthDate()
    {
        $input = new Input('birth_date');
        $input->setRequired(false);
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('date'));

        $this->add($input);
        return $this;
    }
}