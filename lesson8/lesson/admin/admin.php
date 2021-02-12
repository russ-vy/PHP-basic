
<div class='container'>
<?php

?>
    <ul class="nav nav-tabs" id="tabs">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Orders</a>
        </li>
    </ul>

<?php
    include "tab-products.php";
    include "tab-users.php";
    include "tab-orders.php";
?>

</div>
