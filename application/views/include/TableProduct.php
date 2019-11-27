<table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>ID Item</th>
                <th>Item Name</th>
                <th>Type</th>
                <!-- <th>Description</th> -->
                <th>Selling Price</th>
                <th>Buying Price</th>
                <th>See More</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                // foreach ($items as $row){
                //     $id_item= $row['id_item'];
                //     $id_item_col= $row['id_item_colored'];
                //     $name_item= $row['item_name'];
                //     $color_item= $row['item_color'];
                //     $desc_item= $row['item_desc'];
                //     $price_item= $row['selling_price'];
                //     $photo_item= $row['item_photo'];
                //     $type_item= $row['type_desc'];
                // }
                
                foreach ($items as $row) {
                    echo "<tr>";
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . $row['id_item'] . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['type_desc'] . "</td>";
                    // echo "<td>" . $row['item_desc'] . "</td>";
                    echo "<td>" . $row['selling_price'] . "</td>";
                    echo "<td>" . $row['buying_price'] . "</td>";
                    echo "<td>";
                    
                    ?>
                    <a href="<?=base_url('index.php/AdminHome/Detail/'.$row['id_item_colored'])?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							Details
						</a>
                    <?php
                    echo "</td>";
                    echo "</tr>";
			    }
		    ?>
        </tbody>
    </table>
    

    
    