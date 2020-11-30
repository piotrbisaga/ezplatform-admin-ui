<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzPlatformAdminUi\Behat\PageElement\Table;

interface TableInterface
{
    public function isEmpty(): bool;

    public function hasElement(array $elementData): bool;

    public function hasElementOnCurrentPage(array $elementData): bool;

    public function getTableRow(array $elementData);
}