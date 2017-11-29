<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <title>form</title>
    </head>
    <body>
        <form id="myphotoform" action="form.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group">
                    <label for="name"><b>NAME</b></label>
                    <input type="text" class="form-control" placeholder="enter name" name="name"> 
                </div>
                <div class="form-group">
                    <label for="class"><b>CLASS</b></label>
                    <input type="text" class="form-control" name="class">
                </div>
                <div class="form-group">
                    <label for="city"><b>CITY</b></label>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="form-group">
                    <label for="image"><b>IMAGE</b></label>
                    <input type="file" class="form-control" name="photo">
                </div>
                <button type="submit" class="btn btn-danger">SUBMIT</button>
            </div>                
        </form>
        
         <div id="result" style="height: 100px;border:2px solid #000;">
            
        </div>
        
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/popper.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            /* Attach a submit handler to the form */
$("#myphotoform").submit(function(event)
{
     var ajaxRequest;
    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get from elements values */
  //  var values = $(this).serialize();
 var formData = new FormData(this);
    /* Send the data using post and put the results in a div */
    /* I am not aborting previous request because It's an asynchronous request, meaning 
       Once it's sent it's out there. but in case you want to abort it  you can do it by  
       abort(). jQuery Ajax methods return an XMLHttpRequest object, so you can just use abort(). */
       ajaxRequest= $.ajax({
            url: "form.php",
            type: "post",
            
            data: formData,
             cache: false,
        contentType: false,
        processData: false
        });

      /*  request cab be abort by ajaxRequest.abort() */

     ajaxRequest.done(function (response, textStatus, jqXHR){
          // show successfully for submit message
          //$("#result").html('Submitted successfully');
          $("#result").html(response);
     });

     /* On failure of request this function will be called  */
     ajaxRequest.fail(function (){
       // show error
       $("#result").html('There is error while submit');
     });
 });
            </script>
    </body>
</html>
