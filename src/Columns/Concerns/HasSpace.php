<?php

namespace Humaidem\FilamentTreeTable\Columns\Concerns;

use Closure;

trait HasSpace
{
    protected int|string|Closure|null $space = null;

    public function space(int|string|Closure|null $space = 1): static
    {
        $this->space = $space;

        return $this;
    }

    public function getSpace(): int|string|null
    {
        return $this->evaluate($this->space);
    }
}
