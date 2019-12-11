<div class="container card mb-5 p-3 px-4">
    <table id="datatables" class="table table-striped mb-4 pr-4 pl-3" cellspacing="0" width="100%">
		<thead class="thead-light">
			<tr>
				<th>No.</th>
				<th>ID Item</th>
				<th>Item Name</th>
				<th>Size</th>
				<th>Type</th>
				<th>Selling Price</th>
				<th>Buying Price</th>
				<th>See More</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($items as $row) {
				$counter = 1;
					echo "<tr>";
					echo "<td>" . $counter++ . ".</td>";
					echo "<td>" . $row['id_item'] . "</td>";
					echo "<td>" . $row['item_name'] . " - " . $row['item_color'] . "</td>";
					echo "<td>" . $row['item_size'] . "</td>";
					echo "<td>" . $row['type_desc'] . "</td>";
					echo "<td>" . $row['selling_price'] . "</td>";
					echo "<td>" . $row['buying_price'] . "</td>";
					echo "<td>";
							
					?>
					<a href="<?=base_url('index.php/AdminHome/DetailRestore/'.$row['id_item_colored'])?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							Details
						</a>
					<?php
					echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
    </table>
</div>
