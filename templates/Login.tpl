{include file="Header.tpl" title="Login" displayNavbar=false}
<form method="POST" action="#">
    <div id="username">
        <span>Username:</span><input type="text" name="username">
    </div>
    <div id="password">
        <span>Password:</span><input type="password" name="password">
    </div>
    <input type="submit" name="login" value="Login">
</form>
{include file="Footer.tpl"}