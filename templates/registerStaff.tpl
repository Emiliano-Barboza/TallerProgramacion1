{* Smarty *}
{include file="basePageBegin.tpl"}

<div>
    <form method="POST" action="registerInstructor.php">
        <p>
            Nombre: <input type="text" name="nombre">
        </p>
        <p>
            Apellido: <input type="text" name="apellido">
        </p>
        <p>
            C.I.: <input type="text" name="ci">
        </p>
        <p>
            Fecha nacimiento: <input type="date" id="start" name="fecha_nacimiento" value="2000-08-20"
            accept="" max="2000-08-20">
        </p>
        <p>
            Vencimiento licencia: <input type="date" id="start" name="vencimiento" value="2010-08-20"
            accept="" min="2010-08-20">
        </p>
        <p>
            <input type="submit" value="Registrar">
        </p>
        {if isset($error) }
        <p><b>{$error}</b></p>   
        {/if}
    </form>
</div>

{include file="basePageEnd.tpl"}
