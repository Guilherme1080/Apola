document.addEventListener('DOMContentLoaded', () => {
    const openButtons = document.querySelectorAll('.open-modal');
    const closeButtons = document.querySelectorAll('.close-modal');

    openButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const modalId = e.currentTarget.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.showModal();
            }
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const modalId = e.currentTarget.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.close();
            }
        });
    });

    // Novo código para o botão de "Comprar"
    const buyButton = document.querySelector('.btn_buy_produto');
    const modal2 = document.getElementById('modal-2');
    
    if (buyButton && modal2) {
        buyButton.addEventListener('click', () => {
            modal2.showModal(); // Abre o modal de pedido enviado
        });
    }
});
