{include file="Header.tpl" title="Add Room" displayNavbar=true}
<form method="POST" action="#">
    <div id="roomNumber">
        <span>Room Number:</span><input type="number" name="number">
    </div>
    <div id="roomName">
        <span>Room Name:</span><input type="text" name="name">
    </div>
    <div id="roomNote">
        <span>Room Name:</span><textarea rows="3" cols="32" name="note"></textarea>
    </div>
    
    <input type="submit" name="addroom" value="Add Room">
</form>
{include file="Footer.tpl"}