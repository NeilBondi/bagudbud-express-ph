
<?php foreach($request as $row) { 
    
    $date = date_create($row['req_date']);
    $xdate = date_format($date, "F j, Y, g:i a");   

?>
<tr class="items" data-label="item-<?php echo $row['req_id']; ?>" style="cursor: pointer;">
    <td>
        <div class="py-2">
            <!-- Recipient name -->
            <h6 class="my-0 text-black"><b><?php echo $row['recepient_name']; ?></b></h6>
            <!-- addres -->
            <p class="my-0"><?php echo $row['recepient_address']; ?></p>
            <!-- Package Price -->
            <h5 class="my-0 text-primary"><?php echo number_format($row['product_price'], 2); ?></h5>
        </div>
    </td>
    <!-- Delivery Fee -->
    <td class="text-center"><?php echo $row['delivery_fee']; ?></td> 
    <!-- Date added -->
    <td class="text-end pe-3 pe-md-4"><?php echo $xdate; ?></td>
</tr>
<?php } ?>