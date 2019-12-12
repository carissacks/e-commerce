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
    <div class="container card mb-4">
        <div class="container-fluid flex-grow-1 container-p-y">
            <?php
                echo $Detail;
            ?>
        </div>
    </div>
    <?php echo $footer; ?>
</body>
</html>
