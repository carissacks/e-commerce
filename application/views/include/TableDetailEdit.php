<table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>ID Item Colored</th>
                <th>Item Color</th>
                <th>Item Stock</th>
                <th>Item Size</th>
                <th>Edit Size and Stock</th>
                <th>Delete</th>
                <!-- <th>Edit Photo</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . $row['id_item_colored'] . "</td>";
                    echo "<td>" . $row['item_color'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td>" . $row['item_size'] . "</td>";
                    echo "<td>";
                    echo "<a href='" . base_url("index.php/AdminHome/FormEditProductStock?id=" . $row['id_item_colored'] . '&color=' . $row['item_color']) . '&itemid=' . $_GET['itemid'] . '&size=' . $row['item_size'] . "'
                    style='margin-right:10px;color:rgb(0,200,255);'><button>Edit Size and Stock</button></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='" . base_url("index.php/AdminHome/DeleteProductStock?id=" . $row['id_item_colored'] . '&itemID=' . $_GET['itemid'] . '&size=' . $row['item_size']) . "'
                    style='margin-right:10px;color:rgb(0,200,255);'><button>Delete</button></a>";
                    echo "</td>";
                    // echo "<td>";
                    // echo "<a href='" . base_url("index.php/AdminHome/FormEditPhoto?id=" . $row['id_item_colored'] . '&color=' . $row['item_color']) . '&itemid=' . $_GET['itemid'] ."'
                    // style='margin-right:10px;color:rgb(0,200,255);'><button>Edit Photo</button></a>";
                    // echo "</td>";
                    // echo form_open_multipart('AdminHome/AddPhoto');
                    // echo '<input type="hidden" name="id_item_colored" value="'.$row['id_item_colored'].'">';
                    // echo '<input type="hidden" name="item_id" value="'.$_GET['id'].'">';
                    // echo "<span>";
                    // echo form_upload($poster_attr);
                    // echo form_submit('','Add Photo');
                    // echo "</span>";
                    // echo form_close(); 
                    echo "</tr>";
			    }
		    ?>
        </tbody>
    </table>
    

    
    