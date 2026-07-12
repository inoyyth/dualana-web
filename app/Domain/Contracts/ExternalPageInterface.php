<?php

namespace App\Domain\Contracts;

use Illuminate\Contracts\Support\Arrayable;

interface ExternalPageInterface extends Arrayable
{
    /**
     * Get the page ID.
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get the Advanced Custom Fields (ACF) data.
     *
     * @return array
     */
    public function getAcf(): array;
}
