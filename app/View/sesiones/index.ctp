<script type="text/javascript">
	
function getCook(cookiename) {
  // Get name followed by anything except a semicolon
  var cookiestring=RegExp(""+cookiename+"[^;]+").exec(document.cookie);
  // Return everything after the equal sign
  return unescape(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./,"") : "");
  }

//Sample usage
var cookieValue = getCook('session_id');

allCookies = document.cookie;

alert(cookieValue);

alert(allCookies);


</script>

<?php 

print_r($_COOKIE);

?>