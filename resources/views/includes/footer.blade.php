
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchProducts();
    });

    function fetchProducts() {
        fetch("/api/products")
        .then(response => response.json())
        .then(data => {
            let productList = document.getElementById("productList");
            productList.innerHTML = "";
            data.forEach(product => {
                productList.innerHTML += `
                    <tr>
                        <td>${product.id}</td>
                        <td>${product.name}</td>
                        <td>${product.price}</td>
                        <td>${product.stock}</td>
                        <td>
                            <button onclick="editProduct(${product.id}, '${product.name}', ${product.price}, ${product.stock})" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button onclick="deleteProduct(${product.id})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
            });
        });
    }


    document.getElementById("addProductForm").addEventListener("submit", function(event) {
        event.preventDefault();
        let id = document.getElementById("productId").value; 
        let name = document.getElementById("name").value;
        let price = document.getElementById("price").value;
        let stock = document.getElementById("stock").value;

        let method = id ? "PUT" : "POST"; 
        let url = id ? `/api/products/${id}` : "/api/products";

        fetch(url, {
            method: method,
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, price, stock })
        })
        .then(response => response.json())
        .then(data => {
            fetchProducts(); 
            document.getElementById("addProductForm").reset(); 
            document.getElementById("productId").value = ""; 
            document.getElementById("submitButton").textContent = "Add Product"; 
        });
    });


    function deleteProduct(id) {
        fetch(`/api/products/${id}`, { method: "DELETE" })
            .then(() => fetchProducts());
        }

        function editProduct(id, name, price, stock) {
        document.getElementById("productId").value = id; 
        document.getElementById("name").value = name;
        document.getElementById("price").value = price;
        document.getElementById("stock").value = stock;
        
        document.getElementById("submitButton").textContent = "Update Product"; 
    }

</script>

</body>
</html>