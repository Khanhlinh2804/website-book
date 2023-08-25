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
// hihi 
 // Gán sự kiện onchange cho danh sách "city"
    document.getElementById('citySelect').onchange = function() {
        var selectedCity = this.value;
        
        // Gửi yêu cầu Ajax để lấy danh sách các quận dựa trên city_id đã chọn
        fetch(`/get-districts/${selectedCity}`)
            .then(response => response.json())
            .then(districts => {
                // Xóa các phần tử cũ trong danh sách "district"
                document.getElementById('districtSelect').innerHTML = '';
                
                // Thêm các phần tử mới vào danh sách "district" dựa trên kết quả Ajax
                districts.forEach(district => {
                    var option = document.createElement('option');
                    option.value = district.id;
                    option.innerText = district.name;
                    document.getElementById('districtSelect').appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    };


    


