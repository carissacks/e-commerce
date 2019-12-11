<div class="container card mb-4">
    <br>
    <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Transaction ID</th>
                <th>User Name</th>
                <th>Email User</th>
                <th>Status</th>
                <th>Transaction Date</th>
                <th>Update Status</th>
                <th>See More</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                foreach ($data as $row) {
                    $id = $row['id'];
                    $id_status = $row['id_status'];
                    echo "<tr>";
                        echo "<td>" . $counter++ . ".</td>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . "<a href='" . base_url("index.php/AdminHome/FormUpdateStatus?id=$id&status=$id_status")."'
                            class='btn btn-info' style='margin-right:10px;'>Update Status</a>" . "</td>";
                        echo "<td>";
                        echo "<a href='" . base_url("index.php/AdminHome/showDetailTransaction?id=$id") . "'
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
    <br>
</div>


    
    