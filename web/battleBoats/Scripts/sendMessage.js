$(document).ready(function(){
  $('#sendMessageBtn').click(function(){
    var message = document.getElementById("newMessage").value.trim();
    if(isValid(message))
    {
      $.post("../Util/sendMessage.php",
      {
        message: message
      },
      function(data, status)
      { 
        if(status == 'success')
        {
          if(data.isValid)
          {
            processData(data);
          }
          else
          {
            alert("something went wrong!");
          }
          
        }
        else
        {
          alert("Oops! Something happened!");
        }
      
      }); 
    }
    else
    {
      return false;
    }
  });

});

function isValid(message)
{
  var valid = true;
  var messageErr = document.getElementById("messageErr");
  var pattern1 = RegExp('^[0-9A-z !.?]+$');
  var pattern2 = RegExp('^ +$');

  messageErr.innerHTML = '';

  if(!pattern1.test(message))
  {
    messageErr.innerHTML = "Message must only contain punctuation, letters, numbers, and spaces";
    valid = false;
  }

  if(pattern2.test(message) || message == '')
  {
    messageErr.innerHTML = "Message cannot be blank";
    valid = false;
  }

  return valid;
}

function processData(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else
  { 
    getMessages();
  }
  
}