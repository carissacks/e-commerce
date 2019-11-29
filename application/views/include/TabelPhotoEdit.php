<table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Item Photo</th>
                <th>Edit Photo</th>
                <th>Delete Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                foreach ($photo as $row) {
                    $id = $row['item_photo'];
                    echo "<tr>";
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . $row['item_photo'] . "</td>";
                    echo "<td>";
                    echo "<a href='" . base_url("index.php/AdminHome/EditProductPhoto?id=$id") . "'
                                            style='margin-right:10px;color:rgb(0,200,255);'><button>Edit Photo</button></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='" . base_url("index.php/AdminHome/DeleteProductPhoto?id=$id") . "'
                                            style='margin-right:10px;color:rgb(0,200,255);'><button>Delete Photo</button></a>";
                    echo "</td>"; 
                    echo "</tr>";
			    }
		    ?>
        </tbody>
    </table>
    

    
    