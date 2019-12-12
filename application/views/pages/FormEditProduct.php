<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Eyecandy</title>
    <script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
    <?php 
        echo $style;
        echo $script; 
        foreach ($details as $row){
			$id_item= $row['id_item'];
            $name_item= $row['item_name'];
			$desc_item= $row['item_desc'];
			$price_item= $row['selling_price'];
			$buying_item= $row['buying_price'];
			$weight_item= $row['weight'];
			$care_ins= $row['care_ins'];
			$id_item_colored = $row['id_item_colored'];
		}
    ?>
</head>
<body>
    <?php echo $header; ?>
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0 card-header">Edit Product</h4>
            <div class="card mb-4 p-3">
                <div class="card-body">
                    <?php
                        $type_before = array(
                            'name' => 'typebefore',
                            'type' => 'hidden',
                            'value' => $typebefore[0]['type_desc']
                        );

                        $id_item = $_GET['id_item'];
                        $id_item_colored = $_GET['id'];
                        echo form_open_multipart('AdminHome/EditProduct');
                        $style = array(
                            'class' => 'form-control'
                        );
                        
                        $idItemColored = array(
                            'name' => 'itemidcolored',
                            'type' => 'hidden',
                            'value' => $id_item_colored
                        );

                        $itemid = array(
                            'name' => 'itemid',
                            'type' => 'hidden',
                            'value' => $id_item
                        );

                        $itemname = array(
                            'name' => 'itemname',
                            'type' => 'text',
                            'value' => $name_item
                        );

                        $description = array(
                            'name' => 'description',
                            'type' => 'text',
                            'value' => $desc_item
                        );

                        $careinstruction = array(
                            'name' => 'careinstruction',
                            'type' => 'text',
                            'value' => $care_ins
                        );

                        $weight = array(
                            'name' => 'weight',
                            'type' => 'number',
                            'value' => $weight_item
                        );

                        $sellingprice = array(
                            'name' => 'sellingprice',
                            'type' => 'number',
                            'value' => $price_item
                        );

                        $buyingprice = array(
                            'name' => 'buyingprice',
                            'type' => 'number',
                            'value' => $buying_item
                        );

                        // $buttonadd = array(
                        //     'type' => 'button',
                        //     'class' => 'btn btn-primary',
                        //     'style' => 'width: 15%;'
                        // );

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
                                echo form_input($idItemColored, '', $style);
                                echo form_input($itemid, '', $style);
                        echo "</div>";

                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-5'>";
                                echo form_input($type_before, '', $style);
                                echo form_label('Item Name :',' ',$attribute_label) . form_input($itemname, '', $style);
                                echo form_error('itemname','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-5 offset-2'>";
                                echo form_label('Item Type  :', ' ',$attribute_label);
                                $types = 'class="form-control select2"';
                                echo form_dropdown('type', $type, $type_selected, $types);
                                echo form_error('type','<small class="text-danger">','</small>');
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='form-row'>";
                            echo "<div class='form-group row col-md-12'>";
                                echo form_label('weight :',' ',$attribute_label) . form_input($weight, '', $style);
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
                        echo "</div>";

                        echo "<div class='form-group row'>";
                        echo form_label('Care Instruction :',' ',$attribute_label) . form_textarea($careinstruction, ' ', $style);
                        echo "</div>";

                        // echo form_submit('Submit', 'Edit Product', $buttonadd);
                        echo '<div class="row">';
                            echo '<div class="col-1">';
                                echo '<button type="submit" class="btn btn-primary">Submit</button>';
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

</body>
</html>
