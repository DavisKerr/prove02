$(document).ready(function(){

  $.post("../Games/userGames.php",
  {
  search: ''
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      updateAll(data);
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
  }); 

  $("#activeSearch").click(function(){
    var search = document.getElementById("activeGameSearch").value;

    if(isValid(search, document.getElementById('activeGameErr')))
    {
     $.post("../Games/userGames.php",
     {
      search: search,
      type: 1
     },
     function(data, status)
     { 
       if(status == 'success')
       {
          updateActive(data);
       }
       else
       {
         alert("Oops! Something happened!");
       }
       
     }); 
    }
  });

  $("#pendingSearch").click(function(){
    var search = document.getElementById("pendingGameSearch").value;

    if(isValid(search, document.getElementById('pendingGameErr')))
    {
     $.post("../Games/userGames.php",
     {
      search: search,
      type: 2
     },
     function(data, status)
     { 
       if(status == 'success')
       {
          updatePending(data);
       }
       else
       {
         alert("Oops! Something happened!");
       }
       
     }); 
    }
  });

  $("#finishedSearch").click(function(){
    var search = document.getElementById("finishedGameSearch").value;

    if(isValid(search, document.getElementById('finishedGameErr')))
    {
     $.post("../Games/userGames.php",
     {
      search: search,
      type: 3
     },
     function(data, status)
     { 
       if(status == 'success')
       {
          updateFinished(data);
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
  document.getElementById('pendingGameErr').innerHTML = '';
  document.getElementById('finishedGameErr').innerHTML = '';
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

function updateActive(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else
  {
    var table = "<tr><th>Game Name</th><th>Date Created</th><th>Type</th><th>Owner</th><th>Opponent</th><th>Play Game</th></tr>";
    table = table + data.active;
    document.getElementById('activeGames').innerHTML = table;
  }
}

function updatePending(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else
  {
    var table = "<tr><th>Game Name</th><th>Date Created</th><th>Type</th><th>Owner</th><th>Game Code</th></tr>";
    table = table + data.pending;
    document.getElementById('pendingGames').innerHTML = table;
  }
}

function updateFinished(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else
  {
    var table = "<tr><th>Game Name</th><th>Date Created</th><th>Type</th><th>Owner</th><th> Opponent </th><th>View Game</th></tr>";
    table = table + data.finished;
    document.getElementById('finishedGames').innerHTML = table;
  }
}

function updateAll(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else
  {
    var table = "<tr><th>Game Name</th><th>Date Created</th><th>Type</th><th>Owner</th><th>Opponent</th><th>Play Game</th></tr>";
    table = table + data.active;
    document.getElementById('activeGames').innerHTML = table;

    table = "<tr><th>Game Name</th><th>Date Created</th><th>Type</th><th>Owner</th><th>Game Code</th></tr>";
    table = table + data.pending;
    document.getElementById('pendingGames').innerHTML = table;

    table = "<tr><th>Game Name</th><th>Date Created</th><th>Type</th><th>Owner</th><th> Opponent </th><th>View Game</th></tr>";
    table = table + data.finished;
    document.getElementById('finishedGames').innerHTML = table;

  }
}