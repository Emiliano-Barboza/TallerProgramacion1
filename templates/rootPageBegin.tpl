{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>{$pageTitle}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {if isset($scriptsSource) }
            {foreach $scriptsSource as $source}
                <script src="{$source}" type="module"></script> 
            {/foreach}
        {/if}
        {if isset($cssSources) }
            {foreach $cssSources as $source}
                <link href="{$source}" rel="stylesheet" type="text/css"/>
            {/foreach}
        {/if}   
    </head>
    <body>        
