<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="main">
        <div id="header">
          <h1>PHP & Ajax Serialize Form</h1>
        </div>
    
        <div id="table-data">
          <form id="submit_form">  
            <table width="100%" cellpadding="10px">
              <tr>
                <td width="150px"><label>Name</label></td>
                <td><input type="text" name="fullname" id="fullname" /></td>
              </tr>
              <tr>
                <td><label>Age</label></td>
                <td><input type="number" name="age" id="age" /></td>
              </tr>
              <tr>
                <td><label>Gender</label></td>
                <td>
                  <input type="radio" name="gender" value="male" /> Male  
                  <input type="radio" name="gender" value="female" /> Female
                </td>
              </tr>
              <tr>
                <td><label>Country</label></td>
                <td>
                  <select name="country">
                     <option value="ind">India</option>
                     <option value="pk">Pakistan</option>
                     <option value="ban">Bangladesh</option>
                     <option value="ne">Nepal</option>
                     <option value="sl">Srilanka</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td><input type="button" name="submit" id="submit" value="Submit" /></td>
              </tr>
            </table>
          </form>  
          <div id="response"></div>  
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $("#submit").on("click", function(){
            var name = $("#fullname").val();
            var age = $("#age").val();
            if(name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')){
              $('#response').fadeIn();
              $('#response').removeClass('success-msg').addClass('error-msg').html("All feilds are required");
            }else{
              // $('#response').html($("#submit_form ").serialize());
              $.ajax({
                url:"save-form.php",
                type:"POST",
                data: $("#submit_form").serialize(),
                beforesend: function(){
                  $('#response').fadeIn();
                  $('#response').removeClass('success-msg error-msg').addClass('process-msg').html("Loading response...");
                }
                success: function(data){
                  $("#submit_form").trigger("reset"); // if form is save then form data is reset then we can use trigger method
                  $('#response').fadeIn();
                  $('#response').removeClass('error-msg').addClass('success-msg').html(data);
                  setTimeout(function(){
                    $('#response').fadeOut("slow");
                  }, 4000);
                }
              });
            }
          });
        });
      </script>
</body>
</html>