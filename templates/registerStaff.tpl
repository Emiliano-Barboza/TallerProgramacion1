{* Smarty *}
{include file="basePageBegin.tpl"}

<div>
    <form method="POST" action="registerInstructor.php">
        <p>
            Name: <input type="text" name="nombre">
        </p>
        <p>
            Lastname: <input type="text" name="apellido">
        </p>
        <p>
            Identification: <input type="text" name="ci">
        </p>
        <p>
            Born date: <input type="date" id="start" name="fecha_nacimiento" value="2000-08-20"
            accept="" max="2000-08-20">
        </p>
        <p>
            License expiration date: <input type="date" id="start" name="vencimiento" value="2010-08-20"
            accept="" min="2010-08-20">
        </p>
        <p>
            <input type="submit" value="Regist">
        </p>
        {if isset($error) }
        <p><b>{$error}</b></p>   
        {/if}
    </form>
</div>

{include file="basePageEnd.tpl"}
