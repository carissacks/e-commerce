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
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_color'] . "</td>";
                    echo '<td><img src="' . base_url('/asset/images/' . $row['type_desc'] . "/" . $row['item_photo']) . '" width="180" height="auto"/></td>';
                    echo "<td>";

                    echo form_open_multipart('AdminHome/EditProductPhoto');
                    echo '<input type="hidden" name="oldphoto" value="'.$row['item_photo'].'">';
                    echo '<input type="hidden" name="itemid" value="'.$row['id_item'].'">';
                    echo '<input type="hidden" name="id_item_colored" value="'.$row['id_item_colored'].'">';
                    // echo '<input type="hidden" name="item_id" value="'.$_GET['id'].'">';
                    echo "<span>";
                    echo form_upload($poster_attr);
                    echo form_submit('','Update Photo');
                    echo "</span>";
                    echo form_close(); 
                    // echo "<a href='" . base_url("index.php/AdminHome/EditProductPhoto?id=$id") . "'
                    //                         style='margin-right:10px;color:rgb(0,200,255);'><button>Edit Photo</button></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='" . base_url("index.php/AdminHome/DeleteProductPhoto?iditem=$iditem&id=$id") . "'
                                            style='margin-right:10px;color:rgb(0,200,255);'><button>Delete Photo</button></a>";
                    echo "</td>"; 
                    echo "</tr>";
			    }
		    ?>
        </tbody>
    </table>
    <br><br><br><button class="btn btn-secondary finish"> <a href="<?=base_url("index.php/AdminHome/EditProductPhoto")?>"> Finish </a></button>
    

    
    