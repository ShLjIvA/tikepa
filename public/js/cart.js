function addToCart() {
    const id = document.getElementById('articleId').innerHTML
    const size = document.getElementById('size').value

    $.ajax({
        url: "/cart",
        method: "POST",
        data: {
            productId: id,
            size: size
        },
        success: function(response) {
            if(response)
                document.getElementById("addBtn").innerHTML = "Added!"
            else
                document.getElementById("addBtn").innerHTML = "You Added already!"
        },
        error: function(xhr) {
            // alert("Došlo je do greške.")
            console.log(xhr.responseText)
        }
    })
}
