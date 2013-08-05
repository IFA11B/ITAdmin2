{include file="Header.tpl" title="Add User" displayNavbar=true}
<form method="POST" action="#">
    <div id="username">
        <span>Username:</span><input type="text" name="username">
    </div>
    <div id="password">
        <span>Password:</span><input type="password" name="password">
    </div>
    
    {include file='Privileges.tpl'}
    
    <input type="submit" name="adduser" value="Add User">
</form>
{include file="Footer.tpl"}