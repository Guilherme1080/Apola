

<?php


$categorias = Categoria::buscarCategoriaLimit("status_categoria = 'a' ",'BY RAND()',4);




?>



<footer>
        <div class="container-footer">
            <div class="row-footer">
                <div class="footer-col">
                    <h4>Loja</h4>
                    <ul>
                        <li><a href="./SobreNos.php">Sobre Nós</a></li>
                        <li><a href="./produto_personalizado.php">Produtos Personalizados</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Categorias</h4>
                    <ul>
                        <?php

                        foreach ($categorias as $categoria) {
                            echo '

                            <li><a href="./categorias.php?id_categoria='. $categoria->id_categoria .'" >'.$categoria->nome.'</a></li>

                        ';
                        }

                        ?>

                    </ul>
                </div>
                <div class="footer-col contato-footer">
                    <h4>Contato</h4>
                    <ul>
                    <li>
                        <a href="https://wa.me/5567992934537" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp"></i>
                        <p>(67) 99293-4537</p>
                        </a>
                    </li>

                    <li>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=apolasuporte@gmail.com" target="_blank" rel="noopener noreferrer">
                        <i class="fa-regular fa-envelope"></i>
                        <p>apolasuporte@gmail.com</p>
                    </a>

                    </li>

                        <!-- <li><a href="#"><i class="fa-brands fa-whatsapp"></i><p>(67) 992934537</p></a></li>
                        <li><a href="#"><i class="fa-regular fa-envelope"></i><p>contato@apola.com</p></a></li> -->
                    </ul>
                </div>
                 <div class="footer-col">
                    <h4>Redes Sociais</h4>
                        <div class="link-social-media">
                            <a href="https://www.instagram.com/seu_usuario" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://www.pinterest.com/seu_usuario" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-pinterest-p"></i>
                             </a>
                            <a href="https://www.facebook.com/seu_usuario" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </div> 
                </div>

                </div>
            </div>
        </div>
    </footer>
        <!-- ... seu código do footer aqui ... -->

        </footer>

<!-- Aqui você cola o script JS -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.number_dados_sobre');

    const options = {
        threshold: 0.6 // 60% visível para iniciar
    };

    const startCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const speed = 100;

        const updateCount = () => {
            const current = +counter.innerText;
            const increment = Math.ceil(target / speed);

            if (current < target) {
                counter.innerText = current + increment;
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target + '+';
            }
        };

        updateCount();
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                startCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, options);

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
</script>

</body>

</html>

</body>

</html>