<?php
switch ($modx->event->name) {
    case "OnLoadWebDocument":
        if ($modx->context->key == "mgr") {
            return;
        }
        if (is_object($modx->resource) && $modx->resource->id && $modx->resource->template) {
            $data = $modx->cacheManager->get('templates/settings/' . $modx->resource->template);
            if (!$data) {
                if ($template = $modx->resource->getOne('Template')) {
                    $data = $template->getProperties();
                    $modx->cacheManager->set('templates/settings/' . $modx->resource->template, $data, $modx->getOption('cache_expires'));
                }
            }
            if (is_array($data) && count($data)) {
                $modx->setPlaceholders($data, 'template.');
                if ($data['login'] && !$modx->getAuthenticatedUser($modx->context->key)) {
                    $modx->sendErrorPage();
                } elseif ($data['auth'] && !$modx->getAuthenticatedUser($modx->context->key)) {
                    $modx->sendErrorPage();
                } elseif ($data['noauth'] && $modx->getAuthenticatedUser($modx->context->key)) {
                    $modx->sendErrorPage();
                } elseif ($data['authredirect'] && $modx->getAuthenticatedUser($modx->context->key)) {
                    $modx->sendRedirect($modx->makeUrl($modx->getOption('page_profile'), '', '', 'full'));
                }
            }
        }
        break;
    case "OnMODXInit":
        if ($modx->context->key == "mgr") {
            $modx->lexicon->load('extension:manager');
            return;
        }
        if ($modx->getOption('development_mode')) {
            $modx->cacheManager->refresh();
        }
        $modx->lexicon->load('extension:web');
        break;
    case "OnBeforeCacheUpdate":
        if (!$obj = $modx->getObject('modSystemSetting', array('key' => 'site_file_version'))) {
            $obj = $modx->newObject('modSystemSetting');
            $obj->fromArray(array(
                'key' => 'site_file_version',
                'xtype' => 'textfield',
                'namespace' => 'core',
                'area' => 'site',
                'editedon' => null,
            ), '', true);
        }
        $obj->set('value', substr(md5(time()), 0, 12));
        $obj->save();
        break;
    case "pdoToolsOnFenomInit":
        $fenom->addModifier('round', function ($input, $length = 2) {
            return round($input, $length);
        });
        $fenom->addModifier('float', function ($input) {
            return (float)$input;
        });
        break;
}