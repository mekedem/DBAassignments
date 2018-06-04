<?php
/**
*mvc demo for SE assignment
**/
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <link rel="stylesheet" type="text/css" href="boot/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="boot/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="boot/css/font-awesome.min.css">
</head>

<body>

<div id="headir" class="jumbotron"><h4>EDIT AND POST BLOGS HERE</h4></div>
<div id="sectional">
    <form id="saveForm" onsubmit="return false;">
        <label>title</label>
        <br>
    <textarea id="title" class="form form-control" rows="1" placeholder="insert title" required="true"></textarea>
    <br>
    <label>description</label>
    <textarea id="description" class="form form-control" rows="7" required="true" placeholder="write paragraphs of your blog here"></textarea>
    <br>
    <label>date</label>
        <br>
    <textarea id="date" class="form form-control" rows="1" placeholder="insert date" required="true"></textarea>
<div>
    <br>
<button id="upload" class="btn btn-success">POST</button>
</div>

</form>
</div>
    <div id="message">

    </div>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
        $('#upload').click(function () {

            if ($("#saveForm").valid()) {

                var submittedData = {
                    "title": $('#title').val(),
                    "description": $('#description').val(),
                    "date": $('#date').val()
                };
                $.ajax({
                    url: '../controller/fileuploadcontroller.php',
                    data: submittedData,
                    method: 'POST',
                    success: function (response){
                        if(response == ""){
                            console.log(response);
                            $("#message").html("successfully uploaded your post");
                            $("#title").html("");
                            $("#description").html("");
                            $("#date").html("");
                        }
                        else{
                            console.log(response);
                             $("#message").html("successfully uploaded your post");
                             $("#title").html("");
                             $("#description").html("");
                             $("#date").html("");
                            
                        }
                        
                    },
                    error: function (error) {
                         $("#mes").html("Cannot connect to server");
                        // console.log(error);
                    }
                });
            }
            else {
                $("#message").css("color", "red");
                $("#message").html("Please fill the form correctly");
                // console.log("in else");
                setTimeout(function () {
                    $("#message").html("");
                }, 10000);
            }
        });

    });


</script>

</body>

</html>