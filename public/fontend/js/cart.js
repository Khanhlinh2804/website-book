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

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantityDisplay');
        var currentQuantity = parseInt(quantityInput.value);

        if (currentQuantity > 1) {
            currentQuantity--;
            quantityInput.value = currentQuantity;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantityDisplay');
        var currentQuantity = parseInt(quantityInput.value);

        currentQuantity++;
        quantityInput.value = currentQuantity;
    }


    // hihi 


    document.getElementById('province').addEventListener('change', function () {
        var provinceId = this.value;
        
        // Gửi yêu cầu Ajax để lấy danh sách huyện dựa trên provinceId
        axios.get('/get-districts/' + provinceId)
            .then(function (response) {
                var districtSelect = document.getElementById('district');
                districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
                
                response.data.forEach(function (district) {
                    var option = document.createElement('option');
                    option.value = district.id;
                    option.innerText = district.name;
                    districtSelect.appendChild(option);
                });
            })
            .catch(function (error) {
                console.error(error);
            });
    });



