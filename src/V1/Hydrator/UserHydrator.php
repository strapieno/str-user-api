<?php

namespace Strapieno\User\Api\V1\Hydrator;

use Matryoshka\Model\Hydrator\Strategy\DateTimeStrategy;
use Strapieno\ModelUtils\Hydrator\DateHystoryHydrator;

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
        $this->addStrategy('date_created', new DateTimeStrategy);
        // Filter to ignore method
        $this->filterComposite->addFilter(
            'identity',
            new MethodMatchFilter('getIdentity', true),
            FilterComposite::CONDITION_AND
        );
    }
}