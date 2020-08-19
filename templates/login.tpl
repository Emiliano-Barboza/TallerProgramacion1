{* Smarty *}
{include file="rootPageBegin.tpl"}

<div>
    <form method="POST" action="loginUser.php">
        <p>
            User <input type="text" name="user">
        </p>
        <p>
            Password <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
        {if isset($error) }
        <p><b>{$error}</b></p>   
        {/if}
        <p>
            <div>Need sign up?</div>
            <a href="register.php">Sign up</a>
        </p>
    </form>
</div>

{include file="rootPageEnd.tpl"}
