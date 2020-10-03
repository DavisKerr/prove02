function addItemToCart(sku)
{
  var str = sku;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.onreadystatechange == 4 && this.status == 200){
      console.log(this.responseText);
    }
    else
    {
      console.log("Failed!");
    }
  };
  console.log(str);
  xmlhttp.open("GET", "addCart.php?sku=" + str, true);
  xmlhttp.send();
}