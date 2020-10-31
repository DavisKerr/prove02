$(document).ready(function(){
  $('#logoutBtn').click(function(){
    alert('CLICKED!');
    $.post("../Util/logout.php",
    {
      logout: true
    },
    function(data, status)
    { 
      if(status == 'success')
      {
        window.location.replace("./landing.php");
      }
      else
      {
        alert("Oops! Something happened!");
      }
      
      }); 
  });

  $.post("../account/accountInfo.php",
  {
    logout: true
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      processUserInfo(data);
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
  });

});

function processUserInfo(data)
{
  if(data.success)
  { 
    document.getElementById("userData").innerHTML = data.userInfo;
  }
  else
  {
    document.getElementById("userData").innerHTML = "<p> Unable to display data </p>";
  }
  
}

