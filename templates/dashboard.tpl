{* Smarty *}
{include file="basePageBegin.tpl"}
<div>
    <header>
        <div>
            <a href="/driverAcademy/index.php" class="logo">Academia de choferes</a>
            {if isset($user) }
                <div class="dropdown">
                    <button class="dropbtn">Dropdown
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="#">Link 1</a>
                      <a href="#">Link 2</a>
                      <a href="#">Link 3</a>
                    </div>
                </div>
            {else}
                <a href="/driverAcademy/login.php" class="session-menu">Inicio sesión</a>
            {/if}
            
        </div>
    </header>
    <nav>TODO CREATE NAVBAR</nav>
    <main>
        {include file="calendar.tpl"}

    </main>
</div>

{include file="basePageEnd.tpl"}
