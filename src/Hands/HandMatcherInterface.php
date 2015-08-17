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
     * @return Score|null
     */
    public function match(HandInterface $hand);
}
