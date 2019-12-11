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
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-0">Today's Order</h4>
        <div class="container">
        <?php echo $datatabel; ?>
        </div>
    </div>
    <?php echo $footer; ?>
</body>
</html>