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
            <h4 class="font-weight-bold py-3 mb-0 card-header">Add Product Detail</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                        echo form_open_multipart('AdminHome/addProductDetail');
                        $style = array(
                            'class' => 'form-control'
                        );

                        $picture = array(
                            'name' => 'poster',
                            'type' => 'file',
                            'class' => 'form-label w-100'
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
                            'style' => 'width: 15%;'
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $attribute_selectlabel = array(
                            'class' => 'custom-select'
                        );
                        
                        echo "<div class='form-group row'>";
                            echo '<input type="hidden" name="id_item_colored" value="'.$_GET['id'].'"><br>';
                            // echo '<input type="text" name="color" value="" disabled><br>';
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-4'>";
                                echo form_label('Item Size :',' ',$attribute_label) . form_input('itemsize[]', '', $style);
                                echo form_label('Item Stock :',' ',$attribute_label) . form_input('itemstock[]', '', $style);
                                echo form_error('itemcolor','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";

                        echo '<div id="insert-form"></div>';

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-3'>";
                                echo '<button style="padding: 10px; margin: 2px;" type="button" id="btn-tambah-form"> + Size & Stock </button>';
                                echo '<button style="padding: 10px; margin: 2px;" type="button" id="btn-reset-forms">Reset</button>';
                                echo '<input type="hidden" id="jumlah-form" value="1">';
                            echo "</div>";
                        echo "</div>";
                        
                        // echo "<div class='form-group row'>";
                        // echo form_label('Picture   :',' ',$attribute_label) . form_upload($picture, 'picture[]', '', $style) . "<br><br>";
                        // echo "</div>";

                        // echo '<div id="insert-form2"></div>';

                        // echo "<div class='form-row'>";
                        //     echo "<div class='form-group row col-md-3'>";
                        //         echo '<button style="padding: 10px; margin: 2px;" type="button" id="btn-tambah-form2"> + Photo </button>';
                        //         echo '<button style="padding: 10px; margin: 2px;" type="button" id="btn-reset-forms2">Reset</button>';
                        //         echo '<input type="hidden" id="jumlah-form2" value="1">';
                        //     echo "</div>";
                        // echo "</div>";

                        echo form_submit('Submit', 'Add Product Detail', $buttonadd);
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
    $("#btn-tambah-form").click(function(){ 
      var jumlah = parseInt($("#jumlah-form").val());
      var nextform = jumlah + 1;
      
      $("#insert-form").append(
        "<div class='form-row'>" + 
        "<div class='form-group row col-md-4'>" + 
        "Item Size : <input type='text' class='form-control' name='itemsize[]' placeholder="+ '"Type Size"' + ">" + 
        "Ttem Stock : <input type='text' class='form-control' name='itemstock[]' placeholder="+ '"Type Stock"' + ">" +
        "</div></div>");
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-forms").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1");
    });

//     $("#btn-tambah-form2").click(function(){ 
//       var jumlah2 = parseInt($("#jumlah-form2").val());
//       var nextform2 = jumlah2 + 1;
      
//       $("#insert-form2").append(
//         "<div class='form-row'>" + 
//         "<div class='form-group row col-md-4'>" + 
//         "<input type='file' class='form-control' name='picture[]'>" + 
//         "</div></div>");
      
//       $("#jumlah-form2").val(nextform2); // Ubah value textbox jumlah-form dengan variabel nextform
//     });
    
//     // Buat fungsi untuk mereset form ke semula
//     $("#btn-reset-forms2").click(function(){
//       $("#insert-form2").html(""); // Kita kosongkan isi dari div insert-form
//       $("#jumlah-form2").val("1");
//     });
//   });
  </script>

</body>
</html>