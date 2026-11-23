
import './bootstrap';

// QR Modal
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

// Damage Report Actions
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

// Smooth Page Navigation
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[href]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const url = new URL(link.href, window.location.origin);

            if (
                url.origin !== window.location.origin ||
                link.target === '_blank' ||
                link.hasAttribute('download') ||
                link.getAttribute('href').startsWith('#') ||
                event.ctrlKey ||
                event.metaKey ||
                event.shiftKey ||
                event.altKey ||
                url.href === window.location.href
            ) {
                return;
            }

            event.preventDefault();

            document.body.classList.add('page-leaving');

            setTimeout(() => {
                window.location.href = url.href;
            }, 200);
        });
    });
});


// Custom Dropdown Filters
document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('[data-filter]');

    function closeDropdown(dropdown) {
        const options = dropdown.querySelector('.filter-options');
        const arrow = dropdown.querySelector('.filter-arrow');
        const trigger = dropdown.querySelector('.filter-trigger');

        options.classList.add('hidden');
        arrow.classList.remove('rotate-180');
        trigger.setAttribute('aria-expanded', 'false');
    }

    dropdowns.forEach((dropdown) => {
        const trigger = dropdown.querySelector('.filter-trigger');
        const options = dropdown.querySelector('.filter-options');
        const arrow = dropdown.querySelector('.filter-arrow');
        const label = dropdown.querySelector('.filter-label');
        const hiddenInput = dropdown.querySelector('input[type="hidden"]');

        // Buka atau tutup dropdown
        trigger.addEventListener('click', () => {
            const isOpen = !options.classList.contains('hidden');

            // Tutup dropdown lainnya
            dropdowns.forEach((item) => closeDropdown(item));

            if (!isOpen) {
                options.classList.remove('hidden');
                arrow.classList.add('rotate-180');
                trigger.setAttribute('aria-expanded', 'true');
            }
        });

        // Pilih opsi
        dropdown.querySelectorAll('.filter-option').forEach((option) => {
            option.addEventListener('click', () => {
                const value = option.dataset.value;
                const text = option.textContent.trim();

                hiddenInput.value = value;
                label.textContent = text;

                closeDropdown(dropdown);

                // Terapkan filter melalui form
                const form = dropdown.closest('form');

                if (form) {
                    form.submit();
                }
            });
        });
    });

    // Tutup ketika mengeklik area di luar dropdown
    document.addEventListener('click', (event) => {
        dropdowns.forEach((dropdown) => {
            if (!dropdown.contains(event.target)) {
                closeDropdown(dropdown);
            }
        });
    });
});

