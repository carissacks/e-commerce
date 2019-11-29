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
			$id = $row['id_item'];
	?>
    <?php endforeach;?>
    
    <!-- form add color  -->
    <?php
        echo form_open_multipart('AdminHome/AddNewColor');
        $coloring = array(
            'name' => 'color',
            'type' => 'text'
        );
        $show = array(
            'name' => 'show',
            'type' => 'hidden',
            'value' => '1'
        );
        $id_item = array(
            'name' => 'itemid',
            'type' => 'hidden',
            'value' => $_GET['itemid']
        );
        $style = array(
            'class' => 'form-control'
        );
        $buttonadd = array(
            'class' => 'btn btn-primary',
            'style' => 'width: 30%;'
        );
        $attribute_label = array(
            'class' => 'form-label'
        );
        echo "<div class='form-row'>";
            echo "<div class='form-group row col-md-4'>";
                echo form_label('Insert New Color :',' ',$attribute_label);
                echo form_input($coloring, '', $style);
                echo form_input($id_item, '', $style);
                echo form_input($show, '', $style);
                echo "<br>";
                echo "<br>";
                echo form_submit('Submit', 'Add Color', $buttonadd);
                echo form_close();
            echo "</div>";
        echo "</div><br>"; 
    ?>
    <!-- end form -->


    <!-- Form add more stock and size -->
        <?php
            $id = $_GET['itemid'];
            echo "<h2>---- Add More Size and Stock ----</h2>";
            echo form_open_multipart('AdminHome/AddMoreSizeAndStock');
            $style = array(
                'class' => 'form-control'
            );

            $iditem = array(
                'name' => 'id_item',
                'type' => 'hidden',
                'value' => $_GET['itemid']
            );

            $size = array(
                'name' => 'size',
                'type' => 'text'
            );

            $stock = array(
                'name' => 'stock',
                'type' => 'number'
            );

            $buttonadd = array(
                'class' => 'btn btn-primary',
                'style' => 'width: 30%;'
            );

            $attribute_label = array(
                'class' => 'form-label'
            );

            echo "<div class='form-row'>";
                echo "<div class='form-group row col-md-4'>";
                    echo form_input($iditem, '', $style);
                    echo form_label('Choose Color :',' ',$attribute_label);
                    $colors = 'class="form-control select2"';
                    echo form_dropdown('color', $color, $color_selected, $colors);
                echo "</div>";
            echo "</div>"; 

            echo "<div class='form-row'>";
                echo "<div class='form-group row col-md-4'>";
                    echo form_label('Item Size :',' ',$attribute_label) . form_input($size, '', $style);
                    echo form_label('Item Stock :',' ',$attribute_label) . form_input($stock, '', $style);
                    // echo form_error('itemsizeandstock','<small class="text-danger">','</small>') . "<br>";
                echo "</div>";
            echo "</div>"; 

            echo form_submit('Submit', 'Add Size and Stock', $buttonadd);
            echo form_close();
        ?>
    <!-- end form  -->
    <br>
    <button class="btn btn-secondary finish"> <a href="<?=base_url("index.php/AdminHome/FormEditPhoto?id=$id")?>">Go to Update Photo</a></button>
    <!-- <br><br><br><button class="btn btn-secondary finish"> <a href="http://localhost/uaspemweb/index.php/AdminHome/"> Finish Updating</a></button> -->
    </div>
    <?php echo $footer; ?>
</body>
</html>