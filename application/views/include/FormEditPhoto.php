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
            <h4 class="font-weight-bold py-3 mb-0">Photo Edit</h4>
            <?php echo $datatabel; ?>

    <!-- Form add more stock and size -->
            <?php
                foreach($photo as $row){
                    $desc = $row['type_desc'];
                }
                $id = $_GET['id'];
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

                
                    echo "<div class='card mb-4'>";
                        echo "<div class='card-header'>";
                            echo "<h6 class='card-header-title mb-0'>Add More Photo</h6>";
                        echo "</div>";
                            echo "<div class='card-body'>";
                                echo "<dl>";
                                    echo "<dd>";
                                    echo form_label('Choose Color :',' ',$attribute_label);
                                    echo form_input($iditem, '', $style);
                                    echo form_input($type_desc, '', $style);
                                    echo form_label(' ',' ',$attribute_label);
                                    $colors = 'class="form-control select2"';
                                    echo form_dropdown('color', $color, $color_selected, $colors);
                                    echo "<br>";

                                    echo '<div class="row">';
                                        echo '<div class="col-3">';
                                            echo form_upload($poster_attr);
                                        echo '</div>';
                                    echo '</div>';
                                    echo form_close();
                                    echo "</span>";
                                    echo form_close();
                                    echo "</dd>";
                                echo "</dl>";
                            echo "</div>";
                    echo "</div>";
            ?>
    <!-- end form  -->
            <a href="<?=base_url("index.php/AdminHome/")?>" style="margin-right: 20px;" class="btn btn-info"> Finish Updating </a>
            <br>
        </div>
    <?php echo $footer; ?>
</body>
</html>