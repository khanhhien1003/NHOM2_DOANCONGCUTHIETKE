// src/app.js

const API_BASE = 'http://localhost:3000/api/addresses';

document.addEventListener('DOMContentLoaded', () => {
    const addressList = document.getElementById('address-list');
    const addBtn = document.getElementById('add-address');
    const saveBtn = document.getElementById('save-address');
    const search = document.getElementById('search');

    const nameInput = document.getElementById('name-input');
    const phoneInput = document.getElementById('phone-input');
    const addressInput = document.getElementById('address-input');
    const idInput = document.getElementById('input-id');

    let addresses = [];

    // UI helpers: loader + toast
    function showLoader(){
        const el = document.getElementById('loader-overlay');
        if(el) el.classList.remove('d-none');
    }
    function hideLoader(){
        const el = document.getElementById('loader-overlay');
        if(el) el.classList.add('d-none');
    }

    function showToast(message, type='success'){
        const container = document.getElementById('toast-container');
        if(!container) return;
        const toast = document.createElement('div');
        const kind = type === 'success' ? 'success' : 'danger';
        toast.className = `toast align-items-center text-bg-${kind} border-0`;
        toast.setAttribute('role','alert');
        toast.setAttribute('aria-live','assertive');
        toast.setAttribute('aria-atomic','true');
        toast.innerHTML = `<div class="d-flex"><div class="toast-body">${message}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>`;
        container.appendChild(toast);
        const bs = new bootstrap.Toast(toast, { delay: 3000 });
        bs.show();
        toast.addEventListener('hidden.bs.toast', ()=> toast.remove());
    }

    async function fetchAddresses(){
        showLoader();
        try{
            const res = await fetch(API_BASE);
            addresses = await res.json();
            render(addresses);
        }catch(err){
            addressList.innerHTML = '<div class="alert alert-danger">Không thể kết nối tới backend.</div>';
            console.error(err);
            showToast('Không thể kết nối tới backend','danger');
        }finally{
            hideLoader();
        }
    }

    function render(list){
        const q = search.value.trim().toLowerCase();
        const filtered = list.filter(a => {
            if(!q) return true;
            return (a.name||'').toLowerCase().includes(q) || (a.address||'').toLowerCase().includes(q) || (a.phone||'').includes(q);
        });

        if(filtered.length === 0){
            addressList.innerHTML = '<div class="text-center text-muted py-5">Không có địa chỉ.</div>';
            return;
        }

        addressList.innerHTML = filtered.map(a => cardHtml(a)).join('\n');
        // attach listeners
        document.querySelectorAll('.btn-delete').forEach(b=>b.addEventListener('click', onDelete));
        document.querySelectorAll('.btn-edit').forEach(b=>b.addEventListener('click', onEdit));
    }

    function cardHtml(a){
        return `
        <div class="card address-card mb-3" data-id="${a.id}">
          <div class="card-body d-flex align-items-center">
            <div class="flex-grow-1">
              <div class="d-flex align-items-center mb-1">
                <h5 class="mb-0 me-2">${escapeHtml(a.name)}</h5>
                <span class="badgesmall bg-light meta">${escapeHtml(a.phone)}</span>
              </div>
              <div class="meta">${escapeHtml(a.address)}</div>
            </div>
            <div class="actions ms-3 d-flex flex-column">
              <button class="btn btn-sm btn-primary mb-2 btn-edit">Cập nhật</button>
              <button class="btn btn-sm btn-danger btn-delete">Xoá</button>
            </div>
          </div>
        </div>`;
    }

    function escapeHtml(s){
        if(!s) return '';
        return String(s).replace(/[&<>"']/g, function(m){return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":"&#39;"}[m];});
    }

    async function onDelete(e){
        const card = e.target.closest('.address-card');
        const id = card.dataset.id;
        if(!confirm('Bạn có chắc muốn xoá địa chỉ này?')) return;
        showLoader();
        try{
            const res = await fetch(`${API_BASE}/${id}`, { method: 'DELETE' });
            if(!res.ok){ throw new Error('delete failed'); }
            addresses = addresses.filter(a=>a.id!==id);
            render(addresses);
            showToast('Xoá thành công','success');
        }catch(err){
            console.error(err);
            showToast('Xoá thất bại','danger');
        }finally{ hideLoader(); }
    }

    function onEdit(e){
        const card = e.target.closest('.address-card');
        const id = card.dataset.id;
        const item = addresses.find(a=>a.id===id);
        if(!item) return;
        idInput.value = item.id;
        nameInput.value = item.name;
        phoneInput.value = item.phone;
        addressInput.value = item.address;
        const modal = new bootstrap.Modal(document.getElementById('addressModal'));
        document.getElementById('addressModalLabel').textContent = 'Cập nhật địa chỉ';
        modal.show();
    }

    // save (create or update)
    saveBtn.addEventListener('click', async ()=>{
        const id = idInput.value;
        const payload = { name: nameInput.value.trim(), phone: phoneInput.value.trim(), address: addressInput.value.trim() };
        if(!payload.name || !payload.phone || !payload.address){ showToast('Vui lòng nhập đầy đủ thông tin','danger'); return; }
        showLoader();
        try{
            if(id){
                const res = await fetch(`${API_BASE}/${id}`, { method: 'PUT', headers:{'Content-Type':'application/json'}, body: JSON.stringify(payload) });
                if(!res.ok) throw new Error('update failed');
                const updated = await res.json();
                addresses = addresses.map(a=> a.id===id?updated:a);
                showToast('Cập nhật thành công','success');
            }else{
                const res = await fetch(API_BASE, { method: 'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify(payload) });
                if(!res.ok) throw new Error('create failed');
                const created = await res.json();
                addresses.push(created);
                showToast('Thêm thành công','success');
            }
            // close modal
            const modalEl = document.getElementById('addressModal');
            const modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
            // reset
            idInput.value = '';
            nameInput.value = '';
            phoneInput.value = '';
            addressInput.value = '';
            render(addresses);
        }catch(err){console.error(err); showToast('Lưu thất bại','danger');}
        finally{ hideLoader(); }
    });

    // open modal for create
    addBtn.addEventListener('click', ()=>{
        idInput.value = '';
        nameInput.value = '';
        phoneInput.value = '';
        addressInput.value = '';
        document.getElementById('addressModalLabel').textContent = 'Thêm địa chỉ';
    });

    search.addEventListener('input', ()=> render(addresses));

    // initial load
    fetchAddresses();
});