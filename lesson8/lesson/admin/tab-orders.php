<?php
    $q = "
        select
            o.id
            ,o.fio
            ,u.login        email
            ,o.phone
            ,o.address
            ,o.add_time
            ,o.num_order
            ,o.id_status
        from
            ordered             o
            join user           u on u.id = o.id_user
        order by
            id_status
            ,o.id_user
            ,add_time desc
    ";
    $orders = dbquery($q);
    $statusList = dbquery("select * from status");

    function selected($list, $val){
        $select = "<select class='form-select'>";
        foreach ($list as $item){
            extract($item);
            $select .= "
              <option value='$id' {($id == $val ? 'selected' : '')}>$title</option>
            ";
        }
        $select .= "</select>";
        return $select;
    }
?>

<div id="orders" style="display: block">

    <table class="table" id="orderTable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col" colspan="2">Address</th>
            <th scope="col">Time</th>
            <th scope="col" colspan="2">Status</th>
        </tr>
        </thead>
        <tbody>
<?php
    $count = count($orders);
    if ($count)
        for ($i = 0; $i < $count; $i++){
            $row = $i + 1;
            extract($orders[$i]);
            echo "
            <tr>
                <th scope='row'>$row</th>
                <td>$fio</td>
                <td><input type='text' value='$phone' data-id='phone'/></td>
                <td>$email</td>
                <td colspan='2'><textarea class='form-control' rows='2' data-id='address'>$address</textarea></td>
                <td>$add_time</td>
                <td>" . selected($statusList, $id_status) ."</td>
                <td><a href='#' data-id='$id'>Update</a></td>
            </tr>
            <tr style='display: none'>
                <td colspan='8'>
                    <deteils>
                        <summary>Products</summary>
                        
                    </deteils>
                </td>
            </tr>
        ";
        }
?>
        </tbody>
    </table>

</div>