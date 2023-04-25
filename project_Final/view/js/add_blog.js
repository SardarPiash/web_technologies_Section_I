function addBlog(){
    var title = document.getElementById("blog_title").value;
    var image = document.getElementById("product_image").value;
    var blog = document.getElementById("blog").value;

    if(title.trim()==""){
        document.getElementById("blog-error1").innerHTML="Enter Blog Title Please.js";
        return false;
    }else{
        document.getElementById("blog-error1").innerHTML="";
    }
    if(image.trim()==""){
        document.getElementById("blog-error2").innerHTML="Enter Image Please.js";
        return false;
    }else{
        document.getElementById("blog-error2").innerHTML="";
    }
    if(blog.trim()==""){
        document.getElementById("blog-error3").innerHTML="Enter Blog Please.js";
        return false;
    }else{
        document.getElementById("blog-error3").innerHTML="";
    }
}