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
        // $buttonadd = array(
        //     'class' => 'btn btn-primary',
        //     'style' => 'width: 30%;'
        // );
        $attribute_label = array(
            'class' => 'form-label'
        );
        
        echo "<div class='p-r-50 p-t-5 p-lr-0-lg'>";
				echo "<div class='card'>";
                    echo "<div class='card-header'>";
                        echo "<h6 class='card-header-title mb-0'>Add More Color</h6>";
                    echo "</div>";
                        echo "<div class='card-body'>";
                            echo "<dl>";
                                echo "<dd>";
                                echo form_label('Insert New Color :',' ',$attribute_label);
                                echo form_input($coloring, '', $style);
                                echo form_input($id_item, '', $style);
                                echo form_input($show, '', $style);
                                echo "<br>";
                                echo "<br>";
                                // echo form_submit('Submit', 'Add Color', $buttonadd);
                                echo '<div class="row">';
                                    echo '<div class="col-3">';
                                        echo '<button type="submit" class="btn btn-primary">Add Color</button>';
                                    echo '</div>';
                                echo '</div>';
                                echo form_close();
                                echo "</dd>";
                            echo "</dl>";
                        echo "</div>";
				echo "</div>";
            echo "</div>";
    ?>
    <!-- end form -->


    <!-- Form add more stock and size -->
        <?php
            $id = $_GET['itemid'];
            echo "<br>";
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

            // $buttonadd = array(
            //     'class' => 'btn btn-primary',
            //     'style' => 'width: 30%;'
            // );

            $attribute_label = array(
                'class' => 'form-label'
            );

            echo "<div class='p-r-50 p-t-5 p-lr-0-lg'>";
				echo "<div class='card'>";
                    echo "<div class='card-header'>";
                        echo "<h6 class='card-header-title mb-0'>Add More Size and Stock</h6>";
                    echo "</div>";
                        echo "<div class='card-body'>";
                            echo "<dl>";
                                echo "<dd>";
                                    echo form_input($iditem, '', $style);
                                    echo form_label('Choose Color :',' ',$attribute_label);
                                    $colors = 'class="form-control select2"';
                                    echo form_dropdown('color', $color, $color_selected, $colors);
                                echo "</dd>";
								echo "<dd>";
                                    echo form_label('Item Size :',' ',$attribute_label) . form_input($size, '', $style);
                                    echo form_label('Item Stock :',' ',$attribute_label) . form_input($stock, '', $style);
								echo "</dd>";
                            echo "</dl>";
                            // echo form_submit('Submit', 'Add Size and Stock', $buttonadd);
                            echo '<div class="row">';
                                echo '<div class="col-3">';
                                    echo '<button type="submit" class="btn btn-primary">Size and Stock</button>';
                                echo '</div>';
                            echo '</div>';
                            echo form_close();
                        echo "</div>";
				echo "</div>";
            echo "</div>";
        ?>
    <!-- end form  -->
    <br>
        <a href="<?=base_url("index.php/AdminHome/FormEditPhoto?id=$id")?>" style="margin-right: 20px;" class="btn btn-info"> Go to Update Photo </a>
    </div>
    <?php echo $footer; ?>
</body>
</html>