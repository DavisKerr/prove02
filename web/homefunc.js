$(function(){
  $("#openBtn").click(function(){
    $("#menu").css("width", "15%");
  });

  $("#closeBtn").click(function(){
    $("#menu").css("width", "0%");
  });
});

function showDate()
{
  var time;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      time = this.responseText;
    }
  };

  xmlhttp.open("GET", "serving.php", true);
  xmlhttp.send();
  document.getElementById("timeStamp").innerHTML = time;
}