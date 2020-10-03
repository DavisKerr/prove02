function addItemToCart(sku, name, cost, qnt)
{
  var extension = "?sku=" + sku + "&name=" + name + "&cost=" + cost + "&qnt" + qnt;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.onreadystatechange == 4 && this.status == 200){
      console.log(this.responseText);
    }
  };
  xmlhttp.open("GET", "addCart.php" + extension, true);
  xmlhttp.send()
}