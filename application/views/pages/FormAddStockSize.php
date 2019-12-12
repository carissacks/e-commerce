<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <h4 class="font-weight-bold py-3 mb-0 card-header">Add Product Detail</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                        echo form_open_multipart('AdminHome/addProductDetail');
                        $style = array(
                            'class' => 'form-control'
                        );

                        $size = array(
                            'name' => 'size',
                            'type' => 'text',
                        );

                        $stock = array(
                            'name' => 'stock',
                            'type' => 'number',
                            'min'=> "1",
                            'max'=> "999"
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $attribute_selectlabel = array(
                            'class' => 'custom-select'
                        );

                        $color_value = array(
                            'name' => 'value',
                            'type' => 'hidden',
                            'value' => $_GET['color']
                        );
                        
                        // echo "<div class='form-group row'>";
                            echo '<input type="hidden" name="id_item_colored" value="'.$_GET['id'].'"><br>';
                            echo '<input type="hidden" name="itemID" value="'.$_GET['itemid'].'"><br>';
                            // echo '<input 1type="text" name="color" value="'.$_GET['id'].' - '.$_GET['color'].'" disabled><br>';
                        // echo "</div>";

						echo '<div class="row p-3">';
						echo '<div class="col-2 p-0 m-0 bold bg-pattern-3-dark" style="height: 2em;"><b>ID : </b> '.$_GET['id'].'</div>';
						echo '<div class="col-2 p-0 m-0 bg-pattern-3-dark" style="height: 2em;"><b>Color : </b>'.$_GET['color'].'</div>';
						echo '</div>';

                        echo form_input($color_value, '', $style);

                        // echo "<div class='form-row'>";
						echo "<div class='form-group row col-md-4'>";
							echo form_label('Item Size :',' ',$attribute_label) . form_input('itemsize[]', '', $style);
							echo form_error('itemsize[]','<small class="text-danger">','</small>') . "<br>";
							echo form_label('Item Stock :',' ',$attribute_label) . form_input('itemstock[]', '', $style);
							echo form_error('itemstock[]','<small class="text-danger">','</small>') . "<br>";
						echo "</div>";
                        // echo "</div>"; 

                        echo '<div id="insert-forms"></div>';
                        echo '<br>';

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-3'>";
                                echo '<button class="btn btn-primary" style="padding: 10px; margin: 2px;" type="button" id="btn-add-form"> + Size & Stock </button>';
                                echo '<button class="btn btn-warning" style="padding: 10px; margin: 2px;" type="button" id="btn-reset-forms">Reset</button>';
                                echo '<input type="hidden" id="jumlah-form" value="1">';
                            echo "</div>";
                        echo "</div>";

                        echo '<button type="submit" class="btn btn-primary">Add Product Detail</button>';
                        echo form_close();
                        echo "<div class='demo-inline-spacing mt-3'>";
                    ?>
                </div>
            </div>
            
        </div>
    </div>
    <?php echo $footer; ?>
    <script>
        $(document).ready(function(){ // Ketika halaman sudah diload dan siap
            $("#btn-add-form").click(function(){ 
                var jumlah = parseInt($("#jumlah-form").val());
                var nextform = jumlah + 1;
                
                $("#insert-forms").append(
                    "<div class='form-row'>" + 
                    "<div class='form-label form-group row col-md-4'>" + "<br>" +
                    "Item Size : <input type='text' class='form-control' name='itemsize[]' placeholder="+ '"Input Size"' + ">" + "<br>" +
                    "Item Stock : <input type='text' class='form-control' name='itemstock[]' placeholder="+ '"Input Stock"' + ">" +
                    "<br>" +
                    "</div></div>");
                
                $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
            });
            
            // Buat fungsi untuk mereset form ke semula
            $("#btn-reset-forms").click(function(){
                $("#insert-forms").html(""); // Kita kosongkan isi dari div insert-form
                $("#jumlah-form").val("1");
            });
        });
  </script>
</body>
</html>
