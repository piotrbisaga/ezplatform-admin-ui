<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzPlatformAdminUi\Behat\BusinessContext;

use Behat\Behat\Context\Context;
use EzSystems\Behat\Core\Behat\ArgumentParser;
use EzSystems\EzPlatformAdminUi\Behat\PageElement\UniversalDiscoveryWidget;

class UDWContext implements Context
{
    private $argumentParser;
    /**
     * @var \EzSystems\EzPlatformAdminUi\Behat\PageElement\UniversalDiscoveryWidget
     */
    private $universalDiscoveryWidget;

    public function __construct(ArgumentParser $argumentParser, UniversalDiscoveryWidget $universalDiscoveryWidget)
    {
        $this->argumentParser = $argumentParser;
        $this->universalDiscoveryWidget = $universalDiscoveryWidget;
    }

    /**
     * @When I select content :pathToContent through UDW
     */
    public function iSelectContent(string $pathToContent): void
    {
        $pathToContent = $this->argumentParser->replaceRootKeyword($pathToContent);

        $this->universalDiscoveryWidget->verifyIsLoaded();
        $this->universalDiscoveryWidget->selectContent($pathToContent);
    }

    /**
     * @When I select content root node through UDW
     */
    public function iSelectRootNodeContent(): void
    {
        $rootContentName = $this->argumentParser->replaceRootKeyword('root');
        $this->iSelectContent($rootContentName);
    }

    /** @When I close the UDW window */
    public function iCloseUDW(): void
    {
        $this->universalDiscoveryWidget->cancel();
    }

    /** @When I confirm the selection in UDW */
    public function iConfirmSelection(): void
    {
        $this->universalDiscoveryWidget->confirm();
    }
}
