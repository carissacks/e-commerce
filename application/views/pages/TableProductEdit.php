<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eyecandy</title>
    <?php 
        echo $style;
        echo $script;  
    ?>

</head>
<body>
    <?php echo $header; ?>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Product Detail</h4>
        <?php echo $datatabel; ?>
    </div>
    <div class="container-fluid flex-grow-1 container-p-y">
    <?php foreach ($data as $row):
			$id = $row['id_item_colored'];
	?>
    <?php endforeach;?>
    <button class="btn btn-secondary finish"> <a href="<?=base_url("index.php/AdminHome/FormEditPhoto?id=$id")?>"> Finish </a></button>
    </div>
    <?php echo $footer; ?>
</body>
</html>