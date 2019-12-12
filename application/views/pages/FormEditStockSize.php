<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Eyecandy</title>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
    <?php 
        echo $script;
        echo $style;  
    ?>
</head>
<body>
    <?php echo $header; ?>
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0 card-header">Edit Product Detail</h4>
            <div class="card mb-4 p-3">
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
                        
                        $size = array(
                            'name' => 'size',
                            'type' => 'text',
                            'value' => $size
                        );

                        $stock = array(
                            'name' => 'stock',
                            'type' => 'number',
                            'min'=> "1",
                            'max'=> "999",
                            'value' => $stock
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $attribute_selectlabel = array(
                            'class' => 'custom-select'
                        );
                        
                        // echo "<div class='form-group row'>";
						echo '<input type="hidden" name="id_item_colored" value="'.$_GET['id'].'">';
						echo '<input type="hidden" name="itemID" value="'.$_GET['itemid'].'">';
						echo '<input type="hidden" name="sizebefore" value="'.$_GET['size'].'">';
                            // echo '<input class=type="text" name="color" value="'.$_GET['id'].' - '.$_GET['color'].'" disabled>';
						// echo "</div>";
						echo '<div class="row p-3">';
						echo '<div class="col-2 p-0 m-0 bold bg-pattern-3-dark" style="height: 2em;"><b>ID : </b> '.$_GET['id'].'</div>';
						echo '<div class="col-2 p-0 m-0 bg-pattern-3-dark" style="height: 2em;"><b>Color : </b>'.$_GET['color'].'</div>';
						echo '</div>';

						echo "<div class='form-group row col-md-4'>";
							echo form_label('Item Size :',' ',$attribute_label) . form_input($size, '', $style);
							echo form_label('Item Stock :',' ',$attribute_label) . form_input($stock, '', $style);
						echo "</div>";

                        // echo form_submit('Submit', 'Edit Product Size and Stock', $buttonadd);
                        echo '<div class="row pl-3">';
                            echo '<div class="col-1.5">';
                                echo '<button type="submit" class="btn btn-primary">Edit Product Size and Stock</button>';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo '<a href="'.base_url('index.php/AdminHome/FormEditProductDetail?itemid='.$_GET['itemid']).'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
                            echo '</div>';
                        echo '</div>';
                        // echo '	<a href="'.base_url('index.php/AdminHome/FormEditProductDetail?itemid='.$_GET['itemid']).'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
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
