<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eyecandy</title>
    <?php 
        echo $style;
        echo $script;  
    ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".finish").click(function(){
                if(confirm('Do you want to submit ?'))
                {
                    if(confirm('Are you sure ?')){
                        window.location.href = "http://localhost/uaspemweb/index.php/AdminHome/";
                    }
                }
            });
        });
    </script>

</head>
<body>
    <?php echo $header; ?>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Product Detail</h4>
        <?php echo $datatabel; ?>
    </div>
    <div class="container-fluid flex-grow-1 container-p-y">
    <button class="btn btn-secondary finish">Finish</button>
    </div>
    <?php echo $footer; ?>
</body>
</html>