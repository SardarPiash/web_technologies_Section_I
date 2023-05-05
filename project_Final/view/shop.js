function deleteProduct(id) {
    const xhr = new XMLHttpRequest();

    xhr.onload = function() {
        const container = document.getElementById("shop");
        container.innerHTML = xhr.response;
    };

    xhr.open("POST", "../model/shop_db.php?id=" + id);
    xhr.send();
}