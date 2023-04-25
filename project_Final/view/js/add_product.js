function addProduct(){
    var productName = document.getElementById("productname").value;
    var productImage= document.getElementById("my_image").value;
    var productPrice= document.getElementById("productprice").value;
    var productDetails= document.getElementById("productdetails").value;

    // if(productName.trim()==""){
    //     alert("Enter Product Name Frist");
    //     return false;
    // }
    if (productName.trim() == "") {
        document.getElementById("productname-error").innerHTML = "Enter Product Name First.js";
        return false;
      } else {
        document.getElementById("productname-error").innerHTML = "";
      }
    if(productImage.trim()==""){
        document.getElementById("product-image-error").innerHTML="Enter Product Image.js";
        return false;
    }else{
        document.getElementById("product-image-error").innerHTML="";
    }
    if(productPrice.trim()==""){
        document.getElementById("product-price-error").innerHTML="Enter Product Price.js";
        return false;
    }else{
        document.getElementById("product-price-error").innerHTML="";
    }
    if(productDetails.trim()==""){
        document.getElementById("product-details-error").innerHTML="Enter Product Details.js";
        return false;
    }else{
        document.getElementById("product-details-error").innerHTML="";
    }
    return true;
}