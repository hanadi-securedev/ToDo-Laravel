   document.addEventListener('DOMContentLoaded', function() {
            // Delete confirmation
            const deleteModal = document.querySelector('.delete-confirm');
            const confirmBtn = deleteModal?.querySelector('.confirm-btn');
            const cancelBtn = deleteModal?.querySelector('.cancel-btn');
            let currentForm = null;

           document.querySelectorAll('.actions form').forEach(form => {
                form.addEventListener('submit', function (e) {
                 e.preventDefault();

        const confirmed = confirm('Are you sure you want to delete this item?');

                 if (confirmed) {
                    this.submit();
                             }
          });
       });


            confirmBtn?.addEventListener('click', function() {
                if (currentForm) {
                    const listItem = currentForm.closest('li');
                    listItem.style.animation = 'slideOut 0.4s ease';
                    
                    setTimeout(() => {
                        currentForm.submit();
                    }, 400);
                }
            });

            cancelBtn?.addEventListener('click', function() {
                deleteModal.classList.remove('active');
                currentForm = null;
            });

            deleteModal?.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    deleteModal.classList.remove('active');
                    currentForm = null;
                }
            });

            // Add slideOut animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideOut {
                    to {
                        opacity: 0;
                        transform: translateX(100%);
                    }
                }
            `;
            document.head.appendChild(style);

            // Form validation enhancement
            const titleInputs = document.querySelectorAll('input[name="title"]');
            titleInputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim().length > 0) {
                        this.classList.remove('is-invalid');
                        const errorSpan = this.parentElement.querySelector('.error');
                        if (errorSpan) {
                            errorSpan.style.display = 'none';
                        }
                    }
                });

                input.addEventListener('blur', function() {
                    if (this.value.trim().length === 0) {
                        this.classList.add('is-invalid');
                    }
                });
            });

            // Checkbox animation
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const listItem = this.closest('li');
                    if (listItem) {
                        if (this.checked) {
                            listItem.style.animation = 'none';
                            setTimeout(() => {
                                listItem.classList.add('completed');
                            }, 10);
                        } else {
                            listItem.classList.remove('completed');
                        }
                    }
                });
            });

            // Add ripple effect to buttons
            document.querySelectorAll('.btn, .actions a, .actions button, form button').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.5);
                        left: ${x}px;
                        top: ${y}px;
                        pointer-events: none;
                        animation: ripple 0.6s ease-out;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Add ripple animation
            const rippleStyle = document.createElement('style');
            rippleStyle.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(rippleStyle);

            // Auto-focus first input
            const firstInput = document.querySelector('input[type="text"]');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 100);
            }

            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Escape to close modal
                if (e.key === 'Escape' && deleteModal.classList.contains('active')) {
                    deleteModal.classList.remove('active');
                    currentForm = null;
                }
            });
        });