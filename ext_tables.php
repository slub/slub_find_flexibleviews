<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('slub_find_flexibleviews', 'Configuration/TypoScript', 'Find Flexible Views');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_slubfindflexibleviews_domain_model_flexibleviews', 'EXT:slub_find_flexibleviews/Resources/Private/Language/locallang_csh_tx_slubfindflexibleviews_domain_model_flexibleviews.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_slubfindflexibleviews_domain_model_flexibleviews');

    }
);
