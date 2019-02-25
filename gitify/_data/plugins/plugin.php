id: 6
source: 3
name: plugin
plugincode: "switch ($modx->event->name) {\n    case \"OnLoadWebDocument\":\n        if ($modx->context->key == \"mgr\") {\n            return;\n        }\n        if (is_object($modx->resource) && $modx->resource->id && $modx->resource->template) {\n            $data = $modx->cacheManager->get('templates/settings/' . $modx->resource->template);\n            if (!$data) {\n                if ($template = $modx->resource->getOne('Template')) {\n                    $data = $template->getProperties();\n                    $modx->cacheManager->set('templates/settings/' . $modx->resource->template, $data, $modx->getOption('cache_expires'));\n                }\n            }\n            if (is_array($data) && count($data)) {\n                $modx->setPlaceholders($data, 'template.');\n                if ($data['login'] && !$modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendErrorPage();\n                } elseif ($data['auth'] && !$modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendErrorPage();\n                } elseif ($data['noauth'] && $modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendErrorPage();\n                } elseif ($data['authredirect'] && $modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendRedirect($modx->makeUrl($modx->getOption('page_profile'), '', '', 'full'));\n                }\n            }\n        }\n        break;\n    case \"OnMODXInit\":\n        if ($modx->context->key == \"mgr\") {\n            $modx->lexicon->load('extension:manager');\n            return;\n        }\n        if ($modx->getOption('development_mode')) {\n            $modx->cacheManager->refresh();\n        }\n        $modx->lexicon->load('extension:web');\n        break;\n    case \"OnBeforeCacheUpdate\":\n        if (!$obj = $modx->getObject('modSystemSetting', array('key' => 'site_file_version'))) {\n            $obj = $modx->newObject('modSystemSetting');\n            $obj->fromArray(array(\n                'key' => 'site_file_version',\n                'xtype' => 'textfield',\n                'namespace' => 'core',\n                'area' => 'site',\n                'editedon' => null,\n            ), '', true);\n        }\n        $obj->set('value', substr(md5(time()), 0, 12));\n        $obj->save();\n        break;\n    case \"pdoToolsOnFenomInit\":\n        $fenom->addModifier('round', function ($input, $length = 2) {\n            return round($input, $length);\n        });\n        $fenom->addModifier('float', function ($input) {\n            return (float)$input;\n        });\n        break;\n}"
properties: 'a:0:{}'
static: 1
static_file: plugin.php
content: "switch ($modx->event->name) {\n    case \"OnLoadWebDocument\":\n        if ($modx->context->key == \"mgr\") {\n            return;\n        }\n        if (is_object($modx->resource) && $modx->resource->id && $modx->resource->template) {\n            $data = $modx->cacheManager->get('templates/settings/' . $modx->resource->template);\n            if (!$data) {\n                if ($template = $modx->resource->getOne('Template')) {\n                    $data = $template->getProperties();\n                    $modx->cacheManager->set('templates/settings/' . $modx->resource->template, $data, $modx->getOption('cache_expires'));\n                }\n            }\n            if (is_array($data) && count($data)) {\n                $modx->setPlaceholders($data, 'template.');\n                if ($data['login'] && !$modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendErrorPage();\n                } elseif ($data['auth'] && !$modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendErrorPage();\n                } elseif ($data['noauth'] && $modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendErrorPage();\n                } elseif ($data['authredirect'] && $modx->getAuthenticatedUser($modx->context->key)) {\n                    $modx->sendRedirect($modx->makeUrl($modx->getOption('page_profile'), '', '', 'full'));\n                }\n            }\n        }\n        break;\n    case \"OnMODXInit\":\n        if ($modx->context->key == \"mgr\") {\n            $modx->lexicon->load('extension:manager');\n            return;\n        }\n        if ($modx->getOption('development_mode')) {\n            $modx->cacheManager->refresh();\n        }\n        $modx->lexicon->load('extension:web');\n        break;\n    case \"OnBeforeCacheUpdate\":\n        if (!$obj = $modx->getObject('modSystemSetting', array('key' => 'site_file_version'))) {\n            $obj = $modx->newObject('modSystemSetting');\n            $obj->fromArray(array(\n                'key' => 'site_file_version',\n                'xtype' => 'textfield',\n                'namespace' => 'core',\n                'area' => 'site',\n                'editedon' => null,\n            ), '', true);\n        }\n        $obj->set('value', substr(md5(time()), 0, 12));\n        $obj->save();\n        break;\n    case \"pdoToolsOnFenomInit\":\n        $fenom->addModifier('round', function ($input, $length = 2) {\n            return round($input, $length);\n        });\n        $fenom->addModifier('float', function ($input) {\n            return (float)$input;\n        });\n        break;\n}"

-----


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