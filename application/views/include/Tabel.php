    <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Transaction ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
                    $id = $row['id_trans'];
                    echo "<tr>";
                        echo "<td>" . $counter++ . "</td>";
                        echo "<td>" . $row['id_trans'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['UnitPrice'] . "</td>";
                        echo "<td>";
                        echo "<a href='" . base_url("index.php/AdminHome/ShowDetail?id=$id") . "'
                                            style='margin-right:10px;color:rgb(0,200,255);'>";
                        echo "<button class='btn'>";
                        echo "<span class='feather icon-eye'></span>";
                        echo "</button>";
                        echo "</a>";
                        echo "</td>";
                    echo "</tr>";
			    }
		    ?>
        </tbody>
    </table>

    
    