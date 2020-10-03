function addItemToCart(sku)
{
  var str = sku;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  console.log(str);
  xmlhttp.open("GET", "addCart.php?sku=" + str, true);
  xmlhttp.send();
}