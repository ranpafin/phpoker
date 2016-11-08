<?php declare(strict_types=1);

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
