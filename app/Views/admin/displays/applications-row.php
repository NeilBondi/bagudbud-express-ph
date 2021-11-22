
<?php foreach($data as $row) { 
    
    $date = date_create($row['apply_Date']);
    $xdate = date_format($date, "F j, Y, g:i a");   

?>
<tr>
    <td><?= $row['delP_ID'] ?></td>
    <td><?= $row['delP_fName'] . " " . $row['delP_lName'] ?></td>
    <td><?= $row['delP_Email'] ?></td>
    <td><?= $row['vehicle_Type'] ?></td>
    <td><?= $xdate ?></td>
    <td>
        <div class="d-flex justify-content-center align-items-center">
            <button class="hire-now btn btn-primary me-2"><i class="bi bi-person-plus"></i></button>
            <button class="delete-item btn btn-danger"><i class="bi bi-trash"></i></button>
        </div>
    </td>
</tr>
<?php } ?>