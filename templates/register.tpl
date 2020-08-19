{* Smarty *}
{include file="rootPageBegin.tpl"}

{include file="wrapperContainerBegin.tpl"}
            <div class="form-container-panel-header">
                <a href="/driverAcademy/index.php" class="logo-form">
                    <img src="content/icons/driving-school.svg"/>
                    <div>Drivers academy</div>
                </a>
            </div>
            <div class="form-container-panel">
                <form method="POST" action="registerUser.php">
                    <p>
                        <input type="text" name="email" placeholder="Email">
                    </p>
                    <p>
                        <input type="text" name="nombre" placeholder="Name">
                    </p>
                    <p>
                        <input type="text" name="apellido" placeholder="Lastname">
                    </p>
                    <p>
                        <input type="text" name="ci" placeholder="Identification">
                    </p>
                    <p>
                        <input type="date" id="start" name="fecha_nacimiento" value="2000-08-20"
                        accept="" max="2000-08-20"  placeholder="Bord date">
                    </p>
                    <p>
                        <input type="text" name="direccion"  placeholder="Address">
                    </p>
                    <p>
                        <input type="password" name="password"  placeholder="Password">
                    </p>
                    <p>
                        <input type="submit" value="Sign up">
                    </p>
                    {if isset($error) }
                        <p class="message-error"><b>{$error}</b></p>   
                    {/if}
                </form>   
            </div>
{include file="wrapperContainerEnd.tpl"}




<div>
    
</div>

{include file="rootPageEnd.tpl"}
