{* Smarty *}
{include file="rootPageBegin.tpl"}

<div>
    <form method="POST" action="registerUser.php">
        <p>
            Email: <input type="text" name="email">
        </p>
        <p>
            Name: <input type="text" name="nombre">
        </p>
        <p>
            LastName: <input type="text" name="apellido">
        </p>
        <p>
            Identification: <input type="text" name="ci">
        </p>
        <p>
            Born date: <input type="date" id="start" name="fecha_nacimiento" value="2000-08-20"
            accept="" max="2000-08-20">
        </p>
        <p>
            Address: <input type="text" name="direccion">
        </p>
        <p>
            Password: <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Sign up">
        </p>
        {if isset($error) }
        <p><b>{$error}</b></p>   
        {/if}
    </form>
</div>

{include file="rootPageEnd.tpl"}
