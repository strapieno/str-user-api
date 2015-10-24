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
            ->addUEmailInput()
            ->addUFirstNameInput()
            ->addULastNameInput();
    }

    /**
     * @return $this
     */
    protected function addUserNameInput()
    {
        $input = new Input('user_name');
        // Filter
        $filterManager = $this->getFactory()->getInputFilterManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addUEmailInput()
    {
        $input = new Input('email');
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $validatorManager = $this->getFactory()->getDefaultValidatorChain()->getPluginManager();
        $input->getValidatorChain()->attach($validatorManager->get('emailaddress'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addUFirstNameInput()
    {
        $input = new Input('first_name');
        // Filter
        $filterManager = $this->getFactory()->getInputFilterManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }

    /**
     * @return $this
     */
    protected function addULastNameInput()
    {
        $input = new Input('last_name');
        // Filter
        $filterManager = $this->getFactory()->getInputFilterManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));

        $this->add($input);
        return $this;
    }
}