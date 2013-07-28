<!DOCTYPE html>

<html>
    <head>
        <title>Add Supplier</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <form method="POST" action="#">
            <div id="supplierName">
                <span>Supplier Name:</span><input type="text" name="name">
            </div>
            <div id="supplierStreet">
                <span>Supplier Street:</span><input type="text" name="street">
            </div>
            <div id="supplierCity">
                <span>Supplier City:</span><input type="text" name="city">
            </div>
            <div id="supplierZip">
                <span>Supplier ZIP:</span><input type="text" name="zip">
            </div>
            <div id="supplierPhone">
                <span>Supplier Phone:</span><input type="text" name="phone">
            </div>
            <div id="supplierMobile">
                <span>Supplier Mobile:</span><input type="text" name="mobile">
            </div>
            <div id="supplierFax">
                <span>Supplier Fax:</span><input type="text" name="fax">
            </div>
            <div id="supplierEmail">
                <span>Supplier Email:</span><input type="email" name="email">
            </div>
            
            <input type="submit" name="addsupplier" value="Add Supplier">
        </form>
    </body>
</html>