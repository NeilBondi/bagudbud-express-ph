
<?php
    foreach($result as $row){

        $date = date_create($row['accepted_date']);
        $xdate = date_format($date, "F j, Y, g:i a");

?>
<tr class="items" data-label="item-<?php echo $row['req_id'];?>" style="cursor: pointer;">
    <td>
        <div class="d-flex align-items-center py-1 py-xxl-3">
            <div class="location-icon bg-primary">
                <i class="bi bi-geo-alt-fill display-5"></i>
            </div>
            <div class="request-item-content w-100 ms-4">
                <div class="left-content">
                    <span class="display-7">Pickup Point</span>
                    <p class="text-black fw-bold"><?php echo $row['recepient_address'].', '.$row['recepient_municipality'];?></p>
                </div>
                <div class="right-content">
                    <span><?php echo $xdate; ?></span>
                </div>
            </div>
        </div>
    </td>
</tr> 
<?php } ?>