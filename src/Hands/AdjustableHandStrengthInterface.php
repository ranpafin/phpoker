<?php declare(strict_types=1);

namespace Hands;

/**+
 * Interface HandMatcherInterface
 * @package Hands
 */
interface AdjustableHandStrengthInterface
{
    /**
     * @return int
     */
    public function getMultiplier() : int;
}
