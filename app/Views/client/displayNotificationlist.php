
<?php
    foreach($request as $row){

        $date = date_create($row['ndate']);
        $xdate = date_format($date, "F j, Y, g:i a");   
    
?>
<tr class="items" data-label="item-1" style="cursor: pointer;">
    <td>
        <div class="d-flex align-items-center py-1 py-xxl-3">
            <div class="location-icon bg-primary ms-3" style="height: 10px; width:10px"></div>
            <div class="request-item-content w-100 ms-4">
                <div class="left-content">
                    <p class="text-black fw-bold m-0"><?php echo $row['sender'];?></p>
                    <span class="display-7"><?php echo $xdate?></span>
                </div>
            </div>
        </div>
    </td>
</tr> 
<?php
    }
?>