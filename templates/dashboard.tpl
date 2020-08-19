{* Smarty *}
{include file="basePageBegin.tpl"}
<div>
    <header>
        <div>
            <a href="/driverAcademy/index.php" class="logo">Academia de choferes</a>
            {if isset($user) }
            <nav>
                <ul class="nav">
                  <li>
                      <a href="#">{$user.full_name}</a>
                      <ul class="sub-menu">
                        {if $user.is_admin }
                        <li><a href="registerStaff.php">Alta instructor</a></li>
                        <li><a href="confirmClients.php">Aprobación clientes</a></li>
                        <li><a href="confirmLicenses.php">Confirmación libretas</a></li>
                        <li><a href="#">Instructores</a></li>
                        {/if}
                        <li><a href="/driverAcademy/logout.php">Cerrar sesióm</a></li>
                      </ul>
                  </li>
                </ul>
            </nav>
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
