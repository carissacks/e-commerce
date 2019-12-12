<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Eyecandy</title>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
    <?php 
        echo $style;
        echo $script;  
    ?>
</head>
<body>
    <?php echo $header; ?>
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0 card-header">Add Product</h4>
            <div class="card mb-4 p-4">
                <div class="card-body">
                    <?php
                        echo form_open_multipart('AdminHome/addProduct');
                        $style = array(
                            'class' => 'form-control'
                        );

                        $description = array(
                            'name' => 'description',
                            'type' => 'text'
                        );

                        $careinstruction = array(
                            'name' => 'careinstruction',
                            'type' => 'text'
                        );

                        $picture = array(
                            'name' => 'poster',
                            'type' => 'file',
                            'class' => 'form-label w-100'
                        );

                        $weight = array(
                            'name' => 'weight',
                            'type' => 'number',
                            'min'=> "10",
                            'max'=> "999"
                        );
                    
                        $sellingprice = array(
                            'name' => 'sellingprice',
                            'type' => 'number',
                            'min'=> "10000",
                            'max'=> "9999999"
                        );

                        $buyingprice = array(
                            'name' => 'buyingprice',
                            'type' => 'number',
                            'min'=> "10000",
                            'max'=> "9999999"
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $attribute_selectlabel = array(
                            'class' => 'custom-select'
                        );

                        $button_add_color = array(
                            'name' => 'buttoncolor',
                            'id' => 'btn-tambah-form',
                            "type" => 'button',
                            'value' => 'true',
                            'class'=>'btn btn-primary btn-sm icon-plus-circle'
                        );
                        
                        echo "<div class='form-group row'>";
                                echo form_label('Item ID :',' ',$attribute_label) . form_input('itemid', set_value('itemid'), $style);
                                echo form_error('itemid','<small class="text-danger">','</small>') . "<br>";
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Item Name :',' ',$attribute_label) . form_input('itemname', set_value('itemname'), $style);
                                echo form_error('itemname','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-5 offset-2'>";
                                echo form_label('Item Type  :', set_value('type'),$attribute_label);
                                $types = 'class="form-control select2"';
                                echo form_dropdown('type', $type, $type_selected, $types);
                                echo form_error('type','<small class="text-danger">','</small>');
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-4'>";
                                echo form_label('Item Color :',' ',$attribute_label) . form_input('itemcolor[]', set_value('itemcolor[]'), $style);
                                echo form_error('itemcolor[]','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";

                        echo '<div id="insert-form"></div>';

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-3'>";
                                echo '<button class="btn btn-primary" style="padding: 10px; margin: 2px;" type="button" id="btn-tambah-form"> + Color </button>';
                                echo '<button class="btn btn-warning" style="padding: 10px; margin: 2px;" type="button" id="btn-reset-forms">Reset</button>';
                                echo '<input type="hidden" id="jumlah-form" value="1">';
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-12'>";
                                echo form_label('Weight :',' ',$attribute_label) . form_input($weight, set_value('weight'), $style);
                                echo form_error('weight','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Selling Price :',' ',$attribute_label) . form_input($sellingprice, set_value('sellingprice'), $style);
                                echo form_error('sellingprice','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-2'>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Buying Price :',' ',$attribute_label) . form_input($buyingprice, set_value('buyingprice'), $style);
                                echo form_error('buyingprice','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='form-group row'>";
                        echo form_label('Description :',' ',$attribute_label) . form_textarea($description, set_value('description'), $style);
                        echo form_error('description','<small class="text-danger">','</small>') . "<br>";
                        echo "</div>";

                        echo "<div class='form-group row'>";
                        echo form_label('Care Instruction :',' ',$attribute_label) . form_textarea($careinstruction, set_value('careinstruction'), $style);
                        echo form_error('careinstruction','<small class="text-danger">','</small>') . "<br>";
                        echo "</div>";

                        echo '<div class="row">';
                            echo '<div class="col-1.5">';
                                echo '<button type="submit" class="btn btn-primary">Add Product</button>';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo '<a href="'.base_url('index.php/AdminHome').'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
                            echo '</div>';
                        echo '</div>';
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
    $("#btn-tambah-form").click(function(){ 
      var jumlah = parseInt($("#jumlah-form").val());
      var nextform = jumlah + 1;
      
      $("#insert-form").append(
        "<div class='form-row'>" + 
        "<div class='form-group row col-md-4'>" + 
        "<input type='text' class='form-control' name='itemcolor[]' placeholder="+ '"Type Color"' + ">" + 
        "</div></div>");
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-forms").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1");
    });
  });
  </script>

</body>
</html>
