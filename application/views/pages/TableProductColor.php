<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Eyecandy</title>
    <?php 
        echo $style;
        echo $script;  
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function(){
            $(".finish").click(function(){
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to be in this form anymore!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-success',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Finish!",
                    cancelButtonText: "Cancel!"
                    }).then((result) => {
                        if (result.value) {
                            swal('Finished!', 'Your new product has been saved!', 'success')
                            window.location.href = "http://localhost/uaspemweb/index.php/AdminHome/";
                        }
                    });
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
    <button class="btn btn-info finish">Finish</button>
    </div>
    <?php echo $footer; ?>
</body>
</html>
