{* Smarty *}
{include file="basePageBegin.tpl"}

<div>
    <form method="POST" action="loginUser.php">
        <p>
            Usuario <input type="text" name="user">
        </p>
        <p>
            Clave <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Iniciar">
        </p>
        {if isset($error) }
        <p><b>{$error}</b></p>   
        {/if}
        <p>
            <div>Quieres registrarte?</div>
            <a href="register.php">Registrarse</a>
        </p>
    </form>
</div>

{include file="basePageEnd.tpl"}
