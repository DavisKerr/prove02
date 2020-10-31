$(document).ready(function(){
  getMessages();
});


function getMessages() 
{
  $.post("../Util/logout.php",
  {
    logout: true
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      document.getElementById('gameMessageWindow').innerHTML = data.messages;
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
    }); 
}