const filtrosNota = document.querySelectorAll('.filtro-nota');
    const produtosContainer = document.getElementById('produtos-container');

    filtrosNota.forEach(checkbox => {
        checkbox.addEventListener('change', async () => {
      
            filtrosNota.forEach(cb => {
                if (cb !== checkbox) cb.checked = false;
            });

            const selected = [...filtrosNota].find(cb => cb.checked);
            const nota = selected ? parseInt(selected.value) : null;

           
            const urlParams = new URLSearchParams(window.location.search);
            const id_categoria = urlParams.get('id_categoria');

        
            const response = await fetch('../../App/Actions/filtrar_produtos.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nota, id_categoria })
            });

            const data = await response.json();

            produtosContainer.innerHTML = '';

  

          function gerarEstrelas(media) {
            const totalEstrelas = 5;
            let estrelasHtml = '';

            const cheias = Math.floor(media);
            const meia = (media - cheias) >= 0.5 ? 1 : 0;
            const vazias = totalEstrelas - cheias - meia;

            estrelasHtml += '<i class="fa-solid fa-star"></i>'.repeat(cheias);
            estrelasHtml += '<i class="fa-regular fa-star " id="apagada-star"></i>'.repeat(vazias);

            return estrelasHtml;
        }


            

           if (data.status === 'ok') {
            let html = '';

            data.produtos.forEach(prod => {
                const mediaEstrelas = Number(prod.media_notas) || 0;

                html += `
                <div class="card_produto">
                    <div class="icon_favorite">
                        <label class="checkbox-heart">
                            <input class="input-check" type="checkbox" data-id="${prod.id_produto}">
                            <i class="fa-solid fa-heart"></i>
                        </label> 
                    </div>
                    <div class="img_content_produto">
                        <img src="${prod.imagem}" alt="${prod.nome}">
                    </div>
                    <div class="conteudo_card">
                        <div class="nome_card_produto">${prod.nome}</div>
                        <div class="content_star_icon">
                            ${gerarEstrelas(mediaEstrelas)}
                        </div>
                        <div class="preco_card_produto">R$ ${parseFloat(prod.preco).toFixed(2).replace('.', ',')}</div>
                        <div class="btn_content_card_produto">
                            <button data-id="${prod.id_produto}" class="btn_bag_card btn-cart-add">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </button>
                            <a href="./comprar_produto.php?id_produto=${prod.id_produto}" class="btn_buy_card">Comprar</a>
                        </div>
                    </div>
                </div>`;
            });

            produtosContainer.innerHTML = html;
        } else {
            produtosContainer.innerHTML = `<p>${data.mensagem}</p>`;
        }

        });
    });