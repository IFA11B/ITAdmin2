{include file="Header.tpl" title="Add Components" displayNavbar=true}
<form method="POST" action="#">
    <div id="componentManufacturer">
        <span>Manufacturer:</span><input type="text" name="manufacturer">
    </div>
    <div id="componentPurchaseDate">
        <span>Purchase Date:</span><input type="date" name="purchaseDate">
    </div>
    <div id="componentWarrantyDuration">
        <span>Warranty Duration:</span><input type="number" name="warrantyDuration">
    </div>
    <div id="componentNote">
        <span>Note:</span><textarea name="note" rows="3" cols="32"></textarea>
    </div>
    <div id="componentRoom">
        <span>Select Room:</span>
        <select name="room">
            {foreach $rooms as $room}
                <option value="{$room.id}" title="{$room.note}">{$room.number} - {$room.name}</option>
            {/foreach}
        </select>
        <a href="/{$pathRelative}AddRoom">Add Room</a>
    </div>
    <div id="componentSupplier">
        <span>Select Supplier:</span>
        <select name="supplier">
            {foreach $suppliers as $supplier}
                <option value="{$supplier.id}">{$supplier.name}</option>
            {/foreach}
        </select>
        <a href="/{$pathRelative}AddSupplier">Add Supplier</a>
    </div>
    
    <!-- Now comes the fun part of arbitrary attributes -->
 
	<div id ="componentAttributes">
	    {foreach $attributes as $attribute}
	        <div id="{$attribute.internalName}">
	            <input type="hidden" name="attributes[]" value="{$attribute.id}">
	            <span>{$attribute.name}:</span>
             
                <!-- Even more fun is splitting up data types using static if-elseifs -->
                        
                {if $attribute.dataType == 'string'}
                    <input type="text" name="propertyContent[]">
                {elseif $attribute.dataType == 'number'}
                    <input type="number" name="propertyContent[]">
                {elseif $attribute.dataType == 'date'}
                    <input type="date" name="propertyContent[]">
                {elseif $attribute.dataType == 'eMail'}
                    <input type="email" name="propertyContent[]">
                {elseif $attribute.dataType == 'ip'}
                    <input type="text" name="propertyContent[]" pattern="(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)">
                {elseif $attribute.dataType == 'text'}
                    <textarea rows="3" cols="32" name="propertyContent[]"></textarea>
                {elseif $attribute.dataType == 'enum'}
                    <select name="propertyContent[]">
                        {foreach $attribute.values as $value}
                            <option value="{$value.id}">{$value.content} {$value.unit}</option>
                        {/foreach}
                    </select>
                {/if}
            </div>
        {/foreach}
    </div>
    
    <input type="hidden" name="archetype" value="{$archetype}">
    <input type="submit" name="addcomponent" value="Add Component">
</form>
{include file="Footer.tpl"}