<table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>ID Item Colored</th>
                <th>Item Color</th>
                <th>Add Stock and Size</th>
                <th>Upload Photo</th>
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
                    echo "<td>" . "<a href='" . 
                    base_url("index.php/AdminHome/FormAddProductDetail?id=" . $row['id_item_colored'] . '&color=' . $row['item_color']) . '&itemid=' . $_GET['id'] ."'
                    style='margin-right:10px;color:rgb(0,200,255);'><button>+size and stock</button></a>" . "</td>";
                    echo "<td>";
                    echo form_open_multipart('AdminHome/AddPhoto');
                    echo '<input type="hidden" name="id_item_colored" value="'.$row['id_item_colored'].'">';
                    echo '<input type="hidden" name="item_id" value="'.$_GET['id'].'">';
                    echo "<span>";
                    echo form_upload($poster_attr);
                    echo form_submit('','Add Photo');
                    echo "</span>";
                    echo form_close(); 
                    echo "</td>";
                    echo "</tr>";
			    }
		    ?>
        </tbody>
    </table>
    

    
    