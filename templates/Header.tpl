<!DOCTYPE html>

<html>
    <head>
        <title>{$title}</title>
        <link type="text/css" rel="stylesheet" href="/{$pathRelative}style/style.css">
    </head>
    <body>
        <div id="header">
            <div id="logo">
                <a href="/{$pathRelative}Home">
                    <img src="/{$pathRelative}images/Logo.png" alt="Logo B3 Fürth"/>
                    <span>IT Administration</span>
                </a>
	        </div>
	        {if $displayNavbar == true}
	            {include file="Navbar.tpl"}
	        {/if}
        </div>
        <div id="content">