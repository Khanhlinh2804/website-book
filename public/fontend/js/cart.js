// chọn 3 trong 1 
    const paymentMethods = document.querySelectorAll('.payment-method');
    const proceedButton = document.getElementById('proceed-button');

    paymentMethods.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            paymentMethods.forEach((cb) => {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
            proceedButton.disabled = !document.querySelector('.payment-method:checked');
        });
    });


// tăng giảm san phẩm

    function decreaseQuantity(itemId) {
        const quantityInput = document.getElementById('quantityDisplay' + itemId);
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }

    function increaseQuantity(itemId) {
        const quantityInput = document.getElementById('quantityDisplay' + itemId);
        let currentQuantity = parseInt(quantityInput.value);
        quantityInput.value = currentQuantity + 1;
    }



