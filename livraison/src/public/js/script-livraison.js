function addQtt(id) {
    const div_product = document.getElementById("div-product" + id);
    if(div_product) {
        const span = document.getElementById("quantity-"+id);
        if(span) {
            let currentQtt = span.textContent;
            currentQtt = Number(currentQtt) + 1;
            span.innerText = currentQtt;
        } else {
            const span = document.createElement("span");
            span.textContent = 1;
            span.setAttribute("id", "quantity-"+id);
            div_product.appendChild(span);
            console.log("span doesn't");
        }
    } else {
        alert("No existing products yet!");
    }
}
function removeQtt(id) {
    const div_product = document.getElementById("div-product" + id);
    if(div_product) {
        const span = document.getElementById("quantity-"+id);
        if(span) {
            let currentQtt = span.textContent;
            currentQtt = Number(currentQtt) - 1;
            if(currentQtt == 0) {
                div_product.removeChild(span);
                return;
            }
            span.innerText = currentQtt;
        } else {
            alert("Product id " + id +" not added yet");
            return;
        }
    } else {
        alert("No existing products yet!");
    }
}
function getAllProductsQtt() {
    
}
var form = document.getElementById("form-livraison");
function handleLivraison() {
    var xhr = new XMLHttpRequest();
    var formData = new FormData(form);
    
}
window.addEventListener("load", function() {
    document.querySelectorAll(".product-button").forEach(button => {
        button.addEventListener("click", function() {
            const id = button.getAttribute("data-id");
            addQtt(id);
        });
    });
    document.querySelectorAll(".delete-product-button").forEach(button => {
        button.addEventListener("click", function() {
            const id = button.getAttribute("data-id");
            removeQtt(id);
        });
    });
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        handleLivraison();
    });
});