<html>

<label>password :
    <input name="password" id="password" type="password" onkeyup='check();' />
</label>
<br>
<label>confirm password:
    <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
    <span id='message'></span>
</label>

</html>

<script>
 var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'matching';
      } else {
      		document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'not matching';
      }
  }



    </script>