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
        $this->addStrategy('date_created', new DateTimeStrategy);
        parent::__construct($underscoreSeparatedKeys);
    }
}