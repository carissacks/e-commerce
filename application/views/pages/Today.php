<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Eyecandy</title>
    <?php 
        echo $style;
        echo $script;  
    ?>
</head>
<body>
    <?php echo $header; ?>
    <div class="container-fluid">
        <h4 class="font-weight-bold p-5 mb-0">Today's Order</h4>
        <?php echo $datatabel; ?>
    </div>
    <?php echo $footer; ?>
</body>
</html>
