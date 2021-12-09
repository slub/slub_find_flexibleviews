<?php
namespace Slub\SlubFindFlexibleviews\Slots;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with TYPO3 source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use Slub\SlubFindExtend\Backend\Solr\SearchHandler;
use Solarium\QueryType\Select\Query\Query;


/**
 * Slot implementation before the
 *
 * @category    Slots
 * @package     TYPO3
 */
class AdvancedQuery
{

    /**
     * Contains the settings of the current extension
     *
     * @var array
     * @api
     */
    protected $settings;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @return void
     */
    public function injectConfigurationManager(ConfigurationManagerInterface $configurationManager) {
        $this->configurationManager = $configurationManager;
        $this->settings = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
    }

    /**
     * Slot to build the advanced query
     *
     * @param Query &$query
     * @param array $arguments request arguments
     */
    public function build(&$query, $arguments)
    {

        $queryParameter = trim(is_array($arguments['q']['default']) ? $arguments['q']['default'][0] : $arguments['q']['default']);
        $originalQueryParameter = $queryParameter;

        $settings = $this->settings['components'];

        if ($settings) {

            if (strlen($queryParameter) > 0) {

                $query->setQuery($querystring);

            } else {

            }
        }

    }

}
