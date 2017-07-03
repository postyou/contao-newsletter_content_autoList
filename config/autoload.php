<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'postyou',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'postyou\ContentAutoList' => 'system/modules/newsletter_content_autoList/elements/ContentAutoList.php',
	'postyou\HookController'  => 'system/modules/newsletter_content_autoList/elements/HookController.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'nl_autoList' => 'system/modules/newsletter_content_autoList/templates',
));
