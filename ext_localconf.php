<?php
defined('TYPO3_MODE') or die();

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\SignalSlot\Dispatcher');

// register routing configs
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['routing']['aspects']['SlubCatalogId'] = \Slub\SlubFindExtend\Routing\Aspect\SlubCatalogId::class;

// Hook into \Subugoe\Find\Controller
$signalSlotDispatcher->connect(
    'Subugoe\Find\Controller\SearchController',
    'indexActionBeforeSelect',
    'Slub\SlubFindFlexibleviews\Slots\AdvancedQuery',
    'build',
    false
);

$cacheKey = 'find_flexibleviews';
if( !is_array( $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][ $cacheKey ] ) ){
    $cacheConfig =  $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][ $cacheKey ] = array();
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][ $cacheKey ]['frontend'] = 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend';
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][ $cacheKey ]['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend';
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][ $cacheKey ]['options'] = array();
}
