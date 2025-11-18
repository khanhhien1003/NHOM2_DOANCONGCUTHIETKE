// src/app.js

document.addEventListener('DOMContentLoaded', () => {
    const addressList = document.getElementById('address-list');
    const addButton = document.getElementById('add-address');
    const addressInput = document.getElementById('address-input');
    const phoneInput = document.getElementById('phone-input');

    addButton.addEventListener('click', () => {
        const address = addressInput.value;
        const phone = phoneInput.value;

        if (address && phone) {
            const listItem = document.createElement('div');
            listItem.className = 'card mb-2';
            listItem.innerHTML = `
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h5 class="mb-2">Địa chỉ</h5>
                            ${address} | (${phone})
                        </div>
                        <div class="col-lg-2 text-end">
                            <button class="btn btn-danger mb-2 px-5" onclick="removeAddress(this)">Xoá</button>
                            <button class="btn btn-primary px-5" onclick="updateAddress(this)">Cập nhật</button>
                        </div>
                    </div>
                </div>
            `;
            addressList.appendChild(listItem);
            addressInput.value = '';
            phoneInput.value = '';
        } else {
            alert('Vui lòng nhập đầy đủ thông tin địa chỉ và số điện thoại.');
        }
    });
});

function removeAddress(button) {
    const addressCard = button.closest('.card');
    addressCard.remove();
}

function updateAddress(button) {
    const addressCard = button.closest('.card');
    const addressText = addressCard.querySelector('h5').nextSibling.textContent.trim();
    const phoneText = addressText.split('|')[1].trim();

    const newAddress = prompt('Cập nhật địa chỉ:', addressText);
    const newPhone = prompt('Cập nhật số điện thoại:', phoneText);

    if (newAddress && newPhone) {
        addressCard.querySelector('h5').nextSibling.textContent = `${newAddress} | (${newPhone})`;
    }
}