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

use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use Slub\SlubFindExtend\Backend\Solr\SearchHandler;
use Slub\SlubFindFlexibleviews\Domain\Repository\FlexibleviewsRepository;
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
     * @var FlexibleviewsRepository
     */
    protected $flexibleviewsRepository;

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
     * @param FlexibleviewsRepository $flexibleviewsRepository
     */
    public function injectFlexibleviewsRepository(FlexibleviewsRepository $flexibleviewsRepository)
    {
        $this->flexibleviewsRepository = $flexibleviewsRepository;
    }

    /**
     * Slot to build the advanced query
     *
     * @param Query &$query
     * @param array $arguments request arguments
     */
    public function build(&$query, $argumentsIndex, $argumentsDetail = [])
    {

        $flexibleViews = empty($argumentsIndex['flexibleviews']) ? $argumentsDetail['flexibleviews'] : $argumentsIndex['flexibleviews'];

        if ( !empty( $flexibleViews ) && MathUtility::canBeInterpretedAsInteger( $flexibleViews ) ) {
            $flexibleViewUid = MathUtility::forceIntegerInRange( (int) $flexibleViews, 1 );

            $currentView = $this->flexibleviewsRepository->findByUid($flexibleViewUid);

            if ( $currentView === null ) {
                return;
            }

            $query->createFilterQuery('additionalFilter-flexibleview-' . $currentView->getUid())
                ->setQuery($currentView->getQuery());

        }
    }

}
