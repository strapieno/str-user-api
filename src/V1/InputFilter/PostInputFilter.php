<?php
namespace Strapieno\User\Api\V1\InputFilter;

use Zend\InputFilter\Input;

/**
 * Class PostInputFilter
 */
class PostInputFilter extends InputFilter
{
    public function init()
    {
        parent::init();
        $this->addPasswordInput();
    }

    /**
     * @return $this
     */
    protected function addPasswordInput()
    {
        $input = new Input('password');
        // Filter
        $filterManager = $this->getFactory()->getDefaultFilterChain()->getPluginManager();
        $input->getFilterChain()->attach($filterManager->get('stringtrim'));
        // Validator
        $this->add($input);
        return $this;
    }
}