<?php

namespace Humaidem\FilamentTreeTable\Columns\Concerns;

use Humaidem\FilamentTreeTable\Columns\Layout\Component;

trait BelongsToLayout
{
    protected ?Component $layout = null;

    public function layout(?Component $layout): static
    {
        $this->layout = $layout;

        return $this;
    }

    public function getLayout(): ?Component
    {
        return $this->layout;
    }
}
