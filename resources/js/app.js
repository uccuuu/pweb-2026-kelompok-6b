import './bootstrap';


document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('qrModal');
    const closeButton = document.getElementById('closeQrModal');

    if (!modal) return;

    const modalSubtitle = document.getElementById('modalSubtitle');
    const modalName = document.getElementById('modalName');
    const modalPic = document.getElementById('modalPic');
    const modalUnit = document.getElementById('modalUnit');

    document.querySelectorAll('.js-open-qr').forEach((button) => {
        button.addEventListener('click', () => {
            modalSubtitle.textContent = `Kode Barang: ${button.dataset.code}`;
            modalName.textContent = button.dataset.name;
            modalPic.textContent = button.dataset.pic;
            modalUnit.textContent = button.dataset.unit;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    const closeModal = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };

    closeButton?.addEventListener('click', closeModal);

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.damage-action').forEach((button) => {
        button.addEventListener('click', () => {
            const text = button.textContent.trim();

            if (text === 'Validasi Admin') {
                button.classList.remove('bg-secondary', 'text-on-secondary');
                button.classList.add('bg-primary-container', 'text-on-primary-container');
                button.textContent = 'Tervalidasi ✓';
            }

            if (text === 'Tandai Sedang Diperbaiki') {
                button.classList.remove('bg-surface-container-highest');
                button.classList.add('bg-secondary-fixed', 'text-on-secondary-fixed');
                button.textContent = 'Dalam Penanganan';
            }
        });
    });
});
