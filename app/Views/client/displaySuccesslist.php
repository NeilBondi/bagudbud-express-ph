
<?php
    foreach($request as $key){

        $date = date_create($key['cancelsuccess_date']);
        $xdate = date_format($date, "F j, Y, g:i a");
?>
<tr class="items" data-label="item-<?php echo $key['delivery_id'];?>" style="cursor: pointer;">
    <td>
        <div class="d-flex align-items-center py-1 py-xxl-3">
                <div class="request-item-content w-100 ms-4">
                    <div class="left-content">

                        <!-- Delivery man or Recipient -->

                        <p class="text-black fw-bold m-0"><?php echo $key['recepient_name'];?></p>

                        <!-- Recipient Address -->

                        <span class="display-7"><?php echo $key['recepient_address'];?>, <?php echo $key['recepient_municipality'];?></span>
                    </div>

                        <!-- Date cancelled -->

                    <div class="right-content">
                        <span class="display-7"><?php echo $xdate; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr> 

<?php } ?>