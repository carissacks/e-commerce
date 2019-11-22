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
            <h4 class="font-weight-bold py-3 mb-0 card-header">Edit Product</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                        echo form_open_multipart('AdminHome/EditProduct');
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

                            echo "<div class='form-group row col-md-2'>";
                            echo "</div>";

                            echo "<div class='form-group row col-md-5'>";
                                $array = array();
                                foreach($itemtype as $row ){
                                    $type[] = $row->type_desc;
                                }
                                echo form_label('Item Type  :', ' ',$attribute_label);
                                echo form_dropdown('itemtype', $type,' ', $attribute_selectlabel);
                                echo form_error('itemtype','<small class="text-danger">','</small>') . "<br>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group row'>";
                                echo form_label('Item Color :',' ',$attribute_label) . form_input('itemcolor', '', $style);
                                echo form_error('itemcolor','<small class="text-danger">','</small>') . "<br>";
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

                        echo form_submit('Submit', 'Update Product', $buttonadd);
                        echo '	<a href="'.base_url().'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
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