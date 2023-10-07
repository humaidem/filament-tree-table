<?php

namespace Humaidem\FilamentTreeTable\Actions\Contracts;

use Humaidem\FilamentTreeTable\TreeTable;

interface HasTreeTable
{
    public function treeTable(TreeTable $treeTable): static;
}
