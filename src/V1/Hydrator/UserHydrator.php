<?php

namespace Strapieno\User\Api\V1\Hydrator;

use Matryoshka\Model\Hydrator\Strategy\DateTimeStrategy;
use Strapieno\ModelUtils\Hydrator\DateHystoryHydrator;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;

/**
 * Class UserHydrator
 */
class UserHydrator extends DateHystoryHydrator
{
    /**
     * @param bool $underscoreSeparatedKeys
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
        // Strategy
        $this->addStrategy('birth_date', new DateTimeStrategy());
        // Filter to ignore method
        $this->filterComposite->addFilter(
            'identity',
            new MethodMatchFilter('getIdentity', true),
            FilterComposite::CONDITION_AND
        );
        $this->filterComposite->addFilter(
            'roleId',
            new MethodMatchFilter('getRoleId', true),
            FilterComposite::CONDITION_AND
        );
        $this->filterComposite->addFilter(
            'passwordCript',
            new MethodMatchFilter('getPasswordCript', true),
            FilterComposite::CONDITION_AND
        );
        $this->filterComposite->addFilter(
            'state',
            new MethodMatchFilter('getState', true),
            FilterComposite::CONDITION_AND
        );
    }
}