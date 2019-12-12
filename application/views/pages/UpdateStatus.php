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
            <h4 class="font-weight-bold py-3 mb-0 card-header">Update Status</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="col-12">
                        <div class="panel panel-default height">
                            <?php 
                                foreach ($shipping as $row):
                                    $name= $row['name'];
                                    $address= $row['address'];
                                    $id_trans = $row['id_trans'];
                            ?>
                            <div class="panel-heading">Billing and Shipping Details : </div>
                            <div class="panel-body">
                                <strong><?= $name?></strong><br>
                                        <?= $address?><br>
                            </div>
                        </div>
                            <?php endforeach;?>
                            <hr>  
                                
                    <?php

                        $status_before = array(
                            'name' => 'statusbefore',
                            'type' => 'hidden',
                            'value' => $statusbefore[0]['status_desc']
                        );
                        
                        echo form_open_multipart('AdminHome/UpdateStatus');
                        $style = array(
                            'class' => 'form-control'
                        );

                        $attribute_label = array(
                            'class' => 'form-label'
                        );

                        $id_trans = array(
                            'name' => 'id_trans',
                            'type' => 'hidden',
                            'value' => $id_trans
                        );

                        echo "<div class='form-row'>";
                            // echo "<div class='form-group row col-md-5 offset-2'>";
                                echo form_input($id_trans, '', $style);
                                echo form_input($status_before, '', $style);
                                echo form_label('Status  :', ' ',$attribute_label);
                                $statuss = 'class="form-control select2"';
                                echo form_dropdown('status', $status, $status_selected, $statuss);
                                echo form_error('status','<small class="text-danger">','</small>');
                            // echo "</div>";
                        echo "</div>";
                    
                        echo '<br>';
                        echo '<div class="row">';
                            echo '<div class="col-1.5">';
                                echo '<button type="submit" class="btn btn-primary">Update Status</button>';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo '<a href="'.base_url('index.php/AdminHome/AllTrasactionsView').'" style="margin-right: 20px;" class="btn btn-danger"> Cancel </a>';
                            echo '</div>';
                        echo '</div>';
                        echo form_close();
                        echo "<div class='demo-inline-spacing mt-3'>";
                    ?>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $footer; ?>
</body>
</html>
