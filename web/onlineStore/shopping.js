function addItemToCart(sku, cost, name, num)
{
  var str = "?sku=" + sku + "&name=" + name + "&cost=" + cost + "&num=" + num;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  console.log(str);
  xmlhttp.open("GET", "addCart.php" + str, true);
  xmlhttp.send();
}

function removeFromCart(sku)
{
  var str = "?sku=" + sku;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  console.log(str);
  xmlhttp.open("GET", "removeCart.php" + str, true);
  xmlhttp.send();
  location.reload();
}