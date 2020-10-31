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
      alert(JSON.stringify(data));
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

}

