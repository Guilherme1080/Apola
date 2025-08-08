// Seleciona as miniaturas e a imagem principal
const thumbnails = document.querySelectorAll('.thumbnail');
const mainImage = document.getElementById('main-image');
const zoomResult = document.getElementById('zoom-result');

// Troca a imagem principal ao passar o mouse sobre as miniaturas
thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('mouseover', (event) => {
        const newImageSrc = event.target.getAttribute('data-image');
        mainImage.src = newImageSrc; // Atualiza a imagem principal
    });
});

// thumbnail.addEventListener('click', () => {
//     // Remove a classe 'selected' de todas as miniaturas
//     thumbnails.forEach(t => t.classList.remove('selected'));
    
//     // Adiciona a classe 'selected' à miniatura clicada
//     thumbnail.classList.add('selected');
// });

// Função para exibir o efeito de zoom
mainImage.addEventListener('mousemove', function (e) {
    const rect = mainImage.getBoundingClientRect(); // Pega a posição da imagem
    const x = e.clientX - rect.left; // Posição do mouse dentro da imagem
    const y = e.clientY - rect.top;

    // Calculando a posição de fundo da área de zoom
    const zoomX = (x / mainImage.width) * 100;
    const zoomY = (y / mainImage.height) * 100;

    zoomResult.style.display = 'block'; // Mostra a área de zoom
    zoomResult.style.backgroundImage = `url(${mainImage.src})`; // Aplica a imagem de fundo
    zoomResult.style.backgroundPosition = `${zoomX}% ${zoomY}%`; // Posiciona a lupa
});

// Esconde a área de zoom quando o mouse sai da imagem
mainImage.addEventListener('mouseleave', function () {
    zoomResult.style.display = 'none';
});







