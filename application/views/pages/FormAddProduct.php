<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eyecandy</title>
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
            <div class="card mb-4">
                <div class="card-body">
                <?php 
                    // foreach($type as $tipe){
                    //     $type_name= $tipe['type_desc'];
                    //     echo $tipe['type_desc'];
                    // }
                    ?>
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
                            'type' => 'number'
                        );

                        $sellingprice = array(
                            'name' => 'sellingprice',
                            'type' => 'number'
                        );

                        $buyingprice = array(
                            'name' => 'buyingprice',
                            'type' => 'number'
                        );

                        $buttonadd = array(
                            'class' => 'btn btn-primary',
                            'style' => 'width: 15%;'
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $attribute_selectlabel = array(
                            'class' => 'custom-select'
                        );
                        
                        echo "<div class='form-group row'>";
                                echo form_label('Item ID :',' ',$attribute_label) . form_input('itemid', '', $style);
                                echo form_error('itemid','<small class="text-danger">','</small>') . "<br>";
                        echo "</div>";
                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Item Name :',' ',$attribute_label) . form_input('itemname', '', $style);
                                echo form_error('itemname','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-5 offset-2'>";
                                echo form_label('Item Type  :', ' ',$attribute_label);
                                $dd_provinsi_attribute = 'class="form-control select2"';
                                echo form_dropdown('type', $type, $type_selected, $dd_provinsi_attribute);
                                // echo form_dropdown('itemtype', $type,' ', $attribute_selectlabel);
//                                 echo "<select class='form-control' name='type' id='type'>";
//                                     foreach($type as $tipe){
//                                         echo "<option value=" . $tipe['id_type'] . ">" . $tipe['type_desc'] . "</option>";
//                                     }
//                                 echo "</select>";
                                echo form_error('itemtype','<small class="text-danger">','</small>');
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Item Color :',' ',$attribute_label) . form_input('itemcolor[]', '', $style);
                                echo form_error('itemcolor','<small class="text-danger">','</small>') . "<br>";
                                echo '<div id="insert-form"></div>';
                                echo '<button type="button" id="btn-tambah-form">Tambah Data Form</button>';
                                echo '<button type="button" id="btn-reset-form">Reset Form</button><br><br>';
                                echo '<input type="hidden" id="jumlah-form" value="1">';
                            echo "</div>";

                            // echo "<div class='form-group row col-md-5 offset-2'>";
                            //     echo form_label('Item Size  :', ' ',$attribute_label);
                            //         echo form_dropdown('itemsize', $size,' ', $attribute_selectlabel);
                            //         echo form_error('itemsize','<small class="text-danger">','</small>');
                            // echo "</div>";
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-12'>";
                                echo form_label('Weight :',' ',$attribute_label) . form_input($weight, '', $style);
                                echo form_error('weight','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Selling Price :',' ',$attribute_label) . form_input($sellingprice, '', $style);
                                echo form_error('sellingprice','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-2'>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-5'>";
                                echo form_label('Buying Price :',' ',$attribute_label) . form_input($buyingprice, '', $style);
                                echo form_error('buyingprice','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='form-group row'>";
                        echo form_label('Description :',' ',$attribute_label) . form_textarea($description, ' ', $style);
                        echo form_error('description','<small class="text-danger">','</small>') . "<br>";
                        echo "</div>";

                        echo "<div class='form-group row'>";
                        echo form_label('Care Instruction :',' ',$attribute_label) . form_textarea($careinstruction, ' ', $style);
                        echo form_error('careinstruction','<small class="text-danger">','</small>') . "<br>";
                        echo "</div>";

                        echo "<div class='form-group row'>";
                        echo form_label('Picture   :',' ',$attribute_label) . form_upload($picture, 'picture', '', $style) . "<br><br>";
                        echo "</div>";

                        echo form_submit('Submit', 'Add Product', $buttonadd);
                        echo '	<a href="'.base_url().'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
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
    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
        "<table>" +
        "<tr>" +
        "<td><input type='text' name='itemcolor[]' required></td>" +
        "</tr>" +
        "</table>" +
        "<br><br>");
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>

</body>
</html>