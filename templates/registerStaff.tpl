{* Smarty *}
{include file="basePageBegin.tpl"}
{include file="wrapperContainerBegin.tpl"}
        <div class="form-container-panel-header">
            <div>Add an instructor</div>
        </div>
        <div class="form-container-panel">
            <form method="POST" action="registerInstructor.php">
                <p>
                    <input type="text" name="nombre" placeholder="Name">
                </p>
                <p>
                    <input type="text" name="apellido" placeholder="Lastname">
                </p>
                <p>
                    <input type="text" name="ci" placeholder="identification">
                </p>
                <p>
                    <input type="date" id="start" name="fecha_nacimiento" value="2000-08-20"
                    accept="" max="2000-08-20" placeholder="Born date">
                </p>
                <p>
                    <input type="date" id="start" name="vencimiento" value="2010-08-20"
                    accept="" min="2010-08-20"  placeholder="License expiration date">
                </p>
                <p>
                    <input type="submit" value="Add">
                </p>
                {if isset($error) }
                <p><b>{$error}</b></p>   
                {/if}
            </form>   
        </div>

{include file="wrapperContainerEnd.tpl"}
{include file="basePageEnd.tpl"}
