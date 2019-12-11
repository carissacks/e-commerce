<div class="container card mb-4">
    <br>
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
                </tr>
            </thead>
            <tbody>
                <?php
                    $counter = 1;
                    foreach ($data as $row) {
                        $id_item= $row['id_item'];
                        echo "<tr>";
                        echo "<td>" . $counter++ . ".</td>";
                        echo "<td>" . $row['id_item_colored'] . "</td>";
                        echo "<td>" . $row['item_color'] . "</td>";
                        echo "<td>" . $row['stock'] . " pcs</td>";
                        echo "<td>" . $row['item_size'] . "</td>";
                        echo "<td>";
                        echo "<a href='" . base_url("index.php/AdminHome/FormEditProductStock?id=" . $row['id_item_colored'] . '&color=' . $row['item_color']) . '&itemid=' . $id_item . '&size=' . $row['item_size'] . "'
                        class='btn btn-primary' style='margin-right:10px;'>Edit Size and Stock</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='" . base_url("index.php/AdminHome/DeleteProductStock?id=" . $row['id_item_colored'] . '&itemID=' . $id_item . '&size=' . $row['item_size']) . "'
                        class='btn btn-danger' style='margin-right:10px;'>Delete</a>";
                        echo "</td>"; 
                        echo "</tr>";
                    }
                ?>
            </tbody>
    </table>
    <br>
</div>


    
    