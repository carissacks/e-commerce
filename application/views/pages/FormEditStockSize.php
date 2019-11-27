<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eyecandy</title>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
    <?php 
        echo $script;
        echo $style;  
    ?>
</head>
<body>
    <?php echo $header; ?>
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0 card-header">Add Product Detail</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                        foreach($data as $row){
                            $size = $row['item_size'];
                            $stock = $row['stock'];
                        }
                        echo form_open_multipart('AdminHome/EditProductDetail');
                        $style = array(
                            'class' => 'form-control'
                        );

                        // $picture = array(
                        //     'name' => 'poster',
                        //     'type' => 'file',
                        //     'class' => 'form-label w-100'
                        // );
 
                        $size = array(
                            'name' => 'size',
                            'type' => 'text',
                            'value' => $size
                        );

                        $stock = array(
                            'name' => 'stock',
                            'type' => 'number',
                            'value' => $stock
                        );

                        $buttonadd = array(
                            'class' => 'btn btn-primary',
                            'style' => 'width: 30%;'
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $attribute_selectlabel = array(
                            'class' => 'custom-select'
                        );
                        
                        echo "<div class='form-group row'>";
                            echo '<input type="hidden" name="id_item_colored" value="'.$_GET['id'].'"><br>';
                            echo '<input type="hidden" name="itemID" value="'.$_GET['itemid'].'"><br>';
                            echo '<input type="hidden" name="sizebefore" value="'.$_GET['size'].'"><br>';
                            echo '<input type="text" name="color" value="'.$_GET['id'].' - '.$_GET['color'].'" disabled><br>';
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-4'>";
                                echo form_label('Item Size :',' ',$attribute_label) . form_input($size, '', $style);
                                echo form_label('Item Stock :',' ',$attribute_label) . form_input($stock, '', $style);
                                // echo form_error('itemsizeandstock','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>"; 

                        echo form_submit('Submit', 'Edit Product Size and Stock', $buttonadd);
                        // echo '	<a href="'.base_url('index.php/AdminHome/FormEditProductDetail?itemid='.$_GET['id']).'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
                        echo form_close();
                        echo "<div class='demo-inline-spacing mt-3'>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $footer; ?>

</body>
</html>