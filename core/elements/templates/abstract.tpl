<!DOCTYPE html>
<html lang="{$_modx->config.cultureKey}">
<head>
    <meta charset="UTF-8">
    <base href="{'site_url'|config}">

    <title>{if ''|resource:'tv.seo_title'}{''|resource:'tv.seo_title'}{else}{''|resource:'pagetitle'}{/if}</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="{''|resource:'tv.seo_keywords'}">
    <meta name="description" content="{''|resource:'tv.seo_description'}">

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style/style.css?v={'site_file_version'|config}">

    {block 'head'}{/block}
</head>
<body>
    {block 'page'}
        <div class="wrapper">
            {block "header"}
            <header></header>
            {/block}
            <main>
                {block 'content'}{/block}
            </main>
            {block "footer"}
            <footer></footer>
            {/block}
        </div>
    {/block}

    {block 'body-end'}{/block}

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {block 'scripts'}{/block}

    <script src="/assets/js/dev-script.js?v={'site_file_version'|config}"></script>
</body>
</html>