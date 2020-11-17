<?php

namespace Evrinoma\CollectorBundle\Manager;

use Evrinoma\UtilsBundle\Rest\RestTrait;

/**
 * Class CollectorManager
 *
 * @package Evrinoma\CollectorBundle\Manager
 */
final class CollectorManager implements CollectorManagerInterface
{
    use RestTrait;

//region SECTION: Fields
    /**
     * @return int
     */
    public function getRestStatus(): int
    {
        return $this->status;
    }
//endregion Getters/Setters
}
