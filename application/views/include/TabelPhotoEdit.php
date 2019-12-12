<div class="container card mb-4 p-4">
	<div class="table-responsive">
		<table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Item Name</th>
                    <th>Item Color</th>
                    <th>Item Photo</th>
                    <th>Edit Photo</th>
                    <th>Delete Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $buttonadd = array(
                    'class' => 'btn btn-primary',
                    'style' => 'width: 30%;'
                );

                    $counter = 1;
                    foreach ($photo as $row) {
                        // $type = $row['type_desc'];
                        $iditem = $row['id_item'];
                        $id = $row['item_photo'];
                        echo "<tr>";
                        echo "<td>" . $counter++ . ".</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['item_color'] . "</td>";
                        echo '<td><img src="' . base_url('/asset/images/' . $row['type_desc'] . "/" . $row['item_photo']) . '" width="180" height="auto"/></td>';
                        echo "<td>";

                        echo form_open_multipart('AdminHome/EditProductPhoto');
                        echo '<input type="hidden" name="oldphoto" value="'.$row['item_photo'].'">';
                        echo '<input type="hidden" name="itemid" value="'.$row['id_item'].'">';
                        echo '<input type="hidden" name="id_item_colored" value="'.$row['id_item_colored'].'">';
                        echo "<span>";
                        echo form_upload($poster_attr);
                        echo "<br>";
                        echo '<button type="submit" class="btn btn-primary">Update Photo</button>';
                        echo "</span>";
                        echo form_close(); 
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='" . base_url("index.php/AdminHome/DeleteProductPhoto?iditem=$iditem&id=$id") . "'
                                                class='btn btn-danger' style='margin-right:10px;'> Delete Photo </a>";
                                                
                        echo "</td>"; 
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
