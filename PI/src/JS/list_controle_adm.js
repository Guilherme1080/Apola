// Seleciona todos os botões pela classe
const buttons = document.querySelectorAll('.btn_item_listar_produto');

// Adiciona o evento de clique a cada botão
buttons.forEach(button => {
    button.addEventListener('click', () => {
        console.log(`Botão "${button.textContent}" clicado`);

        // Remove os estilos dos outros botões
        buttons.forEach(btn => {
            btn.style.backgroundColor = '';
            btn.style.color = '';
        });

        // Adiciona os estilos ao botão clicado
        button.style.backgroundColor = '#fafbff';
        button.style.color = '#4A4A4A';
    });
});