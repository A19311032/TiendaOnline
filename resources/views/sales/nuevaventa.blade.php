@extends('layouts.cms')

@section('title', 'Nueva Venta')

@section('header', 'Nueva Venta')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/ventas">Ventas</a></li>
        <li class="breadcrumb-item"><a href="#">Nueva Venta</a></li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-md-7">
        <h4>Cliente</h4>

        <hr style="width: 50%; margin-left: 0; border-width: 3px;">



        <form action="{{route('venta.create')}}" method="post">
            @csrf



            <select name="customer_id" id="customer_id" class="" onchange="showCustomerInfo()">
                @foreach ($users as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

            <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modalagregar"><i
                    class="fas fa-user-plus">
                </i>
                
            </button> -->

            <br>
            <br>
            <div id="customer-info"></div>
            <br>

            <!-- Productos -->
            <h4>Productos</h4>
            <hr style="width: 60%; margin-left: 0; border-width: 3px;">
            <div>
                <input type="text" id="searchInput" placeholder="Buscar producto..." />
            </div>
            <br>
            <div class="row">
                @foreach ($products as $pro)
                <div class="col-md-4 product-item">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pro->name }}</h5>
                            <h5>$ {{ $pro->price }}</h5>
                            <input type="checkbox" data-product-id="{{ $pro->id }}" class="product-checkbox"
                                name="selected_products[{{ $pro->id }}]" />
                            <input type="number" data-product-id="{{ $pro->id }}" class="product-quantity small-input"
                                min="1" value="1" name="amount[{{ $pro->id }}]" />
                            <input type="hidden" name="product_id[{{ $pro->id }}]" value="{{ $pro->id }}">
                            <input type="hidden" name="price[{{ $pro->id }}]" value="{{ $pro->price }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <hr style="margin-left: 0; border-width: 3px;">
    </div>

    <div class="col-md-5">
        <h4>Resumen</h4>
        <hr style="width: 60%; margin-left: 0; border-width: 3px;">
        <div id="selected-products-summary">
            <!-- Selected products' summary will be displayed here -->
        </div>

        <hr style="margin-left: 0; border-width: 3px;">
        <p>Total: <span id="total-price" name="">$ 0.00</span></p>

        <hr style="margin-left: 0; border-width: 3px;">

        <h4>Método de Pago</h4>
        <hr style="width: 60%; margin-left: 0; border-width: 3px;">
        <div>
            <div>
                <input type="radio" id="paymentCash" name="method" value="1" required>
                <label for="paymentCash">Efectivo</label>
            </div>
            <div>
                <input type="radio" id="paymentDebit" name="method" value="2">
                <label for="paymentDebit">Tarjeta de Credito/Debito</label>
            </div>
            <div>
                <input type="radio" id="paymentCredit" name="method" value="3">
                <label for="paymentCredit">Transferencia</label>
            </div>

            <div id="cashPaymentForm" style="display: none;">
                <label for="cashAmount">Dio:</label>
                <input type="number" id="cashAmount" step="0.01" min="0">
                <p>Cambio: <span id="change">$ 0.00</span></p>
            </div>

            <button type="submit" class="btn btn-success">Agregar Venta</button>
        </div>

    </div>

</div>

</form>









<script>
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    const productQuantities = document.querySelectorAll('.product-quantity');
    const summaryDiv = document.getElementById('selected-products-summary');
    const totalPriceSpan = document.getElementById('total-price');
    const paymentCashCheckbox = document.getElementById('paymentCash');
    const cashPaymentForm = document.getElementById('cashPaymentForm');
    const cashAmountInput = document.getElementById('cashAmount');
    const changeSpan = document.getElementById('change');


    productCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const productId = checkbox.getAttribute('data-product-id');
            const quantityInput = document.querySelector(
                `.product-quantity[data-product-id="${productId}"]`);
            quantityInput.disabled = !checkbox.checked;
            updateSelectedProductsSummary();
        });
    });

    cashAmountInput.addEventListener('input', () => {
        const cashAmount = parseFloat(cashAmountInput.value);
        const totalPrice = parseFloat(totalPriceSpan.textContent.slice(2));
        const change = cashAmount - totalPrice;
        changeSpan.textContent = `$ ${change.toFixed(2)}`;
    });

    paymentCashCheckbox.addEventListener('change', () => {
        cashPaymentForm.style.display = paymentCashCheckbox.checked ? 'block' : 'none';
        if (!paymentCashCheckbox.checked) {
            cashAmountInput.value = '';
            changeSpan.textContent = '$ 0.00';
        }
    });

    productQuantities.forEach(quantityInput => {
        quantityInput.addEventListener('input', () => {
            updateSelectedProductsSummary();
        });
    });

    function updateSelectedProductsSummary() {
        const selectedProducts = [];
        let totalPrice = 0;

        productCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const productId = checkbox.getAttribute('data-product-id');
                const quantityInput = document.querySelector(
                    `.product-quantity[data-product-id="${productId}"]`);
                const card = checkbox.closest('.product-item').querySelector('.card-title');
                const name = card.textContent;
                const price = parseFloat(card.nextElementSibling.textContent.split('$ ')[1]);
                const quantity = parseInt(quantityInput.value);
                const subtotal = price * quantity;

                selectedProducts.push({
                    name,
                    price,
                    quantity,
                    subtotal
                });

                totalPrice += subtotal;
            }
        });

        const summaryHTML = selectedProducts.map(product => `
        <p>${product.name} - Cantidad: ${product.quantity} - Subtotal: $ ${product.subtotal.toFixed(2)}</p>
    `).join('');

        summaryDiv.innerHTML = summaryHTML;
        totalPriceSpan.textContent = `$ ${totalPrice.toFixed(2)}`;
    }
</script>

<script>
    function showCustomerInfo() {
        var customerId = document.getElementById("customer_id").value;
        var customerInfoDiv = document.getElementById("customer-info");

        // Aquí debes realizar una solicitud AJAX para obtener la información del cliente
        // Puedes utilizar librerías como jQuery o Fetch API para hacer esto

        // Ejemplo utilizando Fetch API
        fetch(`/get-customer-info/${customerId}`)
            .then(response => response.json())
            .then(data => {
                // Rellenar el div con la información del cliente
                customerInfoDiv.innerHTML = `
                <h4>Información del Cliente</h4>
                <p>Nombre: ${data.name}</p>
                <p>Email: ${data.email}</p>
                <p>Phone ${data.phone}</p>
            `;
            })
            .catch(error => {
                console.error("Error al obtener la información del cliente", error);
                customerInfoDiv.innerHTML = ""; // Limpiar el contenido en caso de error
            });
    }
</script>

<script>
    // Obtener el campo de búsqueda y todos los elementos de producto
    const searchInput = document.getElementById('searchInput');
    const productItems = document.querySelectorAll('.product-item');

    // Agregar un event listener para detectar cambios en el campo de búsqueda
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();

        // Iterar a través de los elementos de producto y mostrar/ocultar en función del término de búsqueda
        productItems.forEach(function (item) {
            const productName = item.querySelector('.card-title')
                .textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

<style>
    .product-cards-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        /* Espacio entre las tarjetas */
    }

    .product-card {
        border: 1px solid #ccc;
        padding: 10px;
        width: calc(33.33% - 20px);
        /* Ajusta el ancho según tus necesidades */
        box-sizing: border-box;
    }

    .small-input {
        width: 50px;
        /* Ajusta el tamaño según tus necesidades */
    }
</style>
@endsection