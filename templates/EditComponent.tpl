{include file="Header.tpl" title="Edit Components" displayNavbar=true}
<form method="POST" action="#">
    <div id="componentManufacturer">
        <span>Manufacturer:</span><input type="text" name="manufacturer" value="{$component.manufacturer}">
    </div>
    <div id="componentPurchaseDate">
        <span>Purchase Date:</span><input type="date" name="purchaseDate"  value="{$component.purchaseDate}">
    </div>
    <div id="componentWarrantyDuration">
        <span>Warranty Duration:</span><input type="number" name="warrantyDuration" value="{$component.warrantyDuration}">
    </div>
    <div id="componentNote">
        <span>Note:</span><textarea name="note" rows="3" cols="32">{$component.note}</textarea>
    </div>
    <div id="componentRoom">
        <span>Select Room:</span>
        <select name="room">
            {foreach $rooms as $room}
                <option value="{$room.id}" title="{$room.note}" {if $room.id == $component.room} selected {/if}>{$room.number} - {$room.name}</option>
            {/foreach}
        </select>
    </div>
    <div id="componentSupplier">
        <span>Select Supplier:</span>
        <select name="supplier">
            {foreach $suppliers as $supplier}
                <option value="{$supplier.id}" {if $supplier.id == $component.supplier} selected {/if}>{$supplier.name}</option>
            {/foreach}
        </select>
    </div>
    
    <!-- Now comes the fun part of arbitrary attributes -->
    
    <div id ="componentProperties">
        {foreach $properties as $property}
            <div id="{$property.internalName}">
                <input type="hidden" name="properties[]" value="{$property.id}">
                <span>{$property.name}:</span>
                
                <!-- Even more fun is splitting up data types using static if-elseifs -->
                
                {if $property.dataType == 'string'}
                    <input type="text" name="propertyContent[]" value="{$property.content}">
                {elseif $property.dataType == 'number'}
                    <input type="number" name="propertyContent[]"  value="{$property.content}">
                {elseif $property.dataType == 'date'}
                    <input type="date" name="propertyContent[]" value="{$property.content}">
                {elseif $property.dataType == 'eMail'}
                    <input type="email" name="propertyContent[]" value="{$property.content}">
                {elseif $property.dataType == 'ip'}
                    <input
                        type="text"
                        name="propertyContent[]"
                        pattern="(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)"
                        value="{$property.content}">
                {elseif $property.dataType == 'text'}
                    <textarea rows="3" cols="32" name="propertyContent[]">{$property.content}</textarea>
                {elseif $property.dataType == 'enum'}
                    <select name="propertyContent[]">
                        {foreach $property.values as $value}
                            <option value="{$value.id}" {if $property.content == $value.id} selected {/if}>{$value.content} {$value.unit}</option>
                        {/foreach}
                    </select>
                {/if}
            </div>
        {/foreach}
    </div>
    
    <input type="hidden" name="id" value="{$component.id}">
    <input type="submit" name="editcomponent" value="Edit Component">
</form>
{include file="Footer.tpl"}