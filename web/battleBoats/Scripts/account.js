$(document).ready(function(){
  $('#logoutBtn').click(function(){
    $.post("../util/logout.php",
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
      processUserInfo($data);
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
  });

});

function processUserInfo($data)
{

}

