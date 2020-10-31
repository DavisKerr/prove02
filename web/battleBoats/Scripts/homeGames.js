$(document).ready(function(){

  $("#activeSearch").click(function(){
    var search = document.getElementById("myGameSearch").value;

    if(isValid(search, document.getElementById('activeGameErr')))
    {
     $.post("../Games/homeGames.php",
     {
      search: search,
      type: 1
     },
     function(data, status)
     { 
       if(status == 'success')
       {
          processData(data);
       }
       else
       {
         alert("Oops! Something happened!");
       }
       
     }); 
    }
  });

  $("#publicSearch").click(function(){
    var search = document.getElementById("publicGameSearch").value;

    if(isValid(search, document.getElementById('publicGameErr')))
    {
     $.post("../Games/homeGames.php",
     {
      search: search,
      type: 2
     },
     function(data, status)
     { 
       if(status == 'success')
       {
          processData(data);
       }
       else
       {
         alert("Oops! Something happened!");
       }
       
     }); 
    }
  });

  $("#privateSearch").click(function(){
    var search = document.getElementById("privateGameSearch").value;

    if(isValid(search, document.getElementById('privateGameErr')))
    {
     $.post("../Games/homeGames.php",
     {
      search: search,
      type: 3
     },
     function(data, status)
     { 
       if(status == 'success')
       {
          processData(data);
       }
       else
       {
         alert("Oops! Something happened!");
       }
       
     }); 
    }
  });
});

function resetErr()
{
  document.getElementById('activeGameErr').innerHTML = '';
  document.getElementById('publicGameErr').innerHTML = '';
  document.getElementById('privateGameErr').innerHTML = '';
}

function isValid(search, errMsg)
{
  var valid = true;
  var pattern1 = RegExp('^[0-9A-z ]+$');
  var pattern2 = RegExp('^ +$');

  resetErr();

  if(!pattern1.test(search))
  {
    errMsg.innerHTML = "Search must only contain letters, numbers, and spaces";
    valid = false;
  }

  if(pattern2.test(search))
  {
    errMsg.innerHTML = "Search cannot be blank";
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
    alert(JSON.stringify(data));
  }
  
}