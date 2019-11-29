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
        <h4 class="font-weight-bold py-3 mb-0">Photo Edit</h4>
        <?php echo $datatabel; ?>
    </div>

    <div class="container-fluid flex-grow-1 container-p-y">
    <!-- Form add more stock and size -->
    <?php
            foreach($photo as $row){
                $desc = $row['type_desc'];
            }
            $id = $_GET['id'];
            echo "<h2>---- Add More Photo ----</h2>";
            echo form_open_multipart('AdminHome/AddMorePhoto');
            $style = array(
                'class' => 'form-control'
            );

            $type_desc = array(
                'name' => 'type_desc',
                'type' => 'hidden',
                'value' => $desc
            );

            $iditem = array(
                'name' => 'id_item',
                'type' => 'hidden',
                'value' => $_GET['id']
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
                    echo form_input($type_desc, '', $style);
                    echo form_label('Choose Color :',' ',$attribute_label);
                    $colors = 'class="form-control select2"';
                    echo form_dropdown('color', $color, $color_selected, $colors);
                echo "</div>";
            echo "</div>"; 

            echo "<span>";
            echo form_upload($poster_attr);
            echo "<br>";
            echo form_submit('Submit', 'Upload More Photo', $buttonadd);
            echo "</span>";
            echo form_close();
        ?>
    <!-- end form  -->
    
    <br>
    <br><button class="btn btn-secondary finish"> <a href="http://localhost/uaspemweb/index.php/AdminHome/"> Finish Updating</a></button>
    </div>
    <?php echo $footer; ?>
</body>
</html>