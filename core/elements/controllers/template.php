{set $properties['tpl'] = $_modx->getPlaceholder('template.tpl')}
{if empty($properties['tpl'])}
{set $properties['tpl'] = "default"}
{/if}
{include "file:templates/tpl/{$properties['tpl']}.tpl"}