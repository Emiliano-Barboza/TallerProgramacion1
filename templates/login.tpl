{* Smarty *}
{include file="rootPageBegin.tpl"}

<div class="wrapper">
    <div class="wrapper-container">
        <div class="wrapper-form-container">
            <div class="form-container-panel-header">
                <a href="/driverAcademy/index.php" class="logo-form">
                    <img src="content/icons/driving-school.svg"/>
                    <div>Drivers academy</div>
                </a>
            </div>
            <div class="form-container-panel">
                <form method="POST" action="loginUser.php">
                    <p>
                        <input type="text" name="user" placeholder="User">
                    </p>
                    <p>
                        <input type="password" name="password" placeholder="Password">
                    </p>
                    <p>
                        <input type="submit" value="Login">
                    </p>
                    {if isset($error) }
                    <p><b>{$error}</b></p>   
                    {/if}
                </form>    
            </div>
            <div class="form-container-panel-footer">
                <p>
                    <div>Need sign up?</div>
                    <a href="register.php">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</div>


{include file="rootPageEnd.tpl"}
