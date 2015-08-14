<?php

namespace Hands;

use Card\HandInterface;

/**+
 * Interface HandMatcherInterface
 * @package Hands
 */
interface HandMatcherInterface
{
    /**
     * @param HandInterface $hand
     *
     * @return bool
     */
    public function match(HandInterface $hand);
}
