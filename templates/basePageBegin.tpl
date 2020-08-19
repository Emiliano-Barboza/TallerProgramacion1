{* Smarty *}
{include file="rootPageBegin.tpl"}

<div>
    <header>
        <div>
            <a href="/driverAcademy/index.php" class="logo">
                <img src="content/icons/driving-school.svg"/>
                <div>Drivers academy</div>
            </a>
            {if isset($user) }
            <nav>
                <ul class="nav">
                  <li>
                      <a href="#">{$user.full_name}</a>
                      <ul class="sub-menu">
                        {if $user.is_admin }
                        <li><a href="registerStaff.php">Add instructor</a></li>
                        <li><a href="confirmClients.php">Approve clients</a></li>
                        <li><a href="confirmLicenses.php">Confirma licenses</a></li>
                        <li><a href="bookings.php">Intructors</a></li>
                        {/if}
                        <li><a href="/driverAcademy/logout.php">Logout</a></li>
                      </ul>
                  </li>
                </ul>
            </nav>
            {else}
                <a href="/driverAcademy/login.php" class="session-menu">Login</a>
            {/if}
            
        </div>
    </header>
    <main>
