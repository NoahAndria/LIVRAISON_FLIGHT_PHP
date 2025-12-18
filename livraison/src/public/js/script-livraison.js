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
    const retour = new Map();
    document.querySelectorAll(".product-card").forEach(product_card => {
        const span = product_card.querySelector("span");
        let qtt = 0;
        const id = Number(product_card.children[0].getAttribute("data-id"));
        if(span) {
            qtt = Number(span.textContent);
            retour.set(id, qtt);
            console.log("Qtt: " + qtt);
            console.log("id: " + id);
        } else {
            console.log("Span doesn't exist");
        }
    });
    return retour;
}
var form = document.getElementById("form-livraison");
function handleLivraison() {
    var xhr = new XMLHttpRequest();
    var formData = new FormData(form);
    const mapIdQtt = getAllProductsQtt();
    mapIdQtt.forEach((value, key) => {
        formData.append(key, value);
    });
    xhr.addEventListener("load", function(){
        const response = JSON.parse(xhr.responseText);
        if(response.status === "success") {
            window.location.href = "/";
        } else {
            console.log("transaction failed");
        }
    });
    xhr.open("POST", "/traitement_livraison");
    xhr.send(formData);
}
window.addEventListener("load", function() {
    document.querySelectorAll(".product-button").forEach(button => {
        button.addEventListener("click", function() {
            const id = button.getAttribute("data-id");
            addQtt(id);
            getAllProductsQtt();
        });
    });
    document.querySelectorAll(".delete-product-button").forEach(button => {
        button.addEventListener("click", function() {
            const id = button.getAttribute("data-id");
            removeQtt(id);
            getAllProductsQtt();
        });
    });
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        handleLivraison();
    });
});