<?php
	if(ISSET($_GET['status']))
	{
		?>
			
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
			<script  type='text/javascript'>
				swal('Uploaded!', 'Your photo has been uploaded!', 'success')
			</script>
		<?php
	}
?>

<div class="container card mb-4 p-4">
	<div class="table-responsive">
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
                        echo "<td>" . $counter++ . ".</td>";
                        echo "<td>" . $row['id_item_colored'] . "</td>";
                        echo "<td>" . $row['item_color'] . "</td>";
                        echo "<td>" . "<a href='" . 
                        base_url("index.php/AdminHome/FormAddProductDetail?id=" . $row['id_item_colored'] . '&color=' . $row['item_color']) . '&itemid=' . $_GET['id'] ."'
                        class='btn btn-primary' style='margin-right:10px;'>+size and stock</a>" . "</td>";
                        echo "<td>";
                        echo form_open_multipart('AdminHome/AddPhoto');
                        echo '<input type="hidden" name="color" value="'.$row['item_color'].'">';
                        echo '<input type="hidden" name="id_item_colored" value="'.$row['id_item_colored'].'">';
                        echo '<input type="hidden" name="item_id" value="'.$_GET['id'].'">';
                        echo "<span>";
                        echo form_upload($poster_attr);
                        echo "<br>";
                        echo '<button type="submit" class="btn btn-primary">Add Photo</button>';
                        echo "</span>";
                        echo form_close(); 
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
	</div>
</div>
    

    
    