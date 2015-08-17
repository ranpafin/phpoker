<?php

namespace Hands\Search;

use Card\HandInterface;

interface HandSearchInterface
{
    /**
     * @param HandInterface $hand
     *
     * @return HandInterface|null
     */
    public function find(HandInterface $hand);
}
