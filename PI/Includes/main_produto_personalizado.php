<main>
    <div class="container_produto_personazalizado">

     <section class="Banner_Sobre_Nos">
         <div class="shape_sobre"></div>
         <div class="content_banner_sobre_nos">
             <img class="img_sobre_banner" src="../src/imagens/SobreMim/Giant Panda – Amigurumi Crochet Pattern.jpg" alt="">
             <div class="content_coteudo_banner_sobre">
                 <h4 class="text_top_sobre">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                 <h5 class="text_bottom_sobre">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h4>
                 <button class="btn_sobre"> <a href="">Conheça</a></button>
             </div>
         </div>
     </section>
     <section class="container_items_produto_personalizado">
         <div class="card_produto_personalizado">
             <i class="fa-regular fa-clipboard"></i>
             <h6 class="name_card_item_personalizado">Pedido</h6>
         </div>
         <div class="card_produto_personalizado">
             <i class="fa-solid fa-paint-roller"></i>
             <h6 class="name_card_item_personalizado">Produção</h6>
         </div>
         <div class="card_produto_personalizado">
             <i class="fa-solid fa-truck-front"></i>
             <h6 class="name_card_item_personalizado">Envio</h6>
         </div>
         <div class="card_produto_personalizado">
             <i class="fa-solid fa-box"></i>
             <h6 class="name_card_item_personalizado">Entregue</h6>
         </div>
     </section>

     <form class="container_form_produto_personalizado">
         <div class="container_personalizado">
             <h1 class="title-quadro_personalizado">Descriçao</h1>
             <div class="quadro">
                     <p class="descricao-quadro">Descreva as características específicas do seu pedido, incluindo formas, materiais, desenhos, cores e quaisquer detalhes adicionais que você gostaria de incorporar.</p>
                 <textarea class="insert-text" placeholder="Escreva aqui..."></textarea>
             </div>
         </div>
         <div class="container_personalizado">
             <h1 class="title-quadro_personalizado">Imagens</h1>
             <div class="quadro">
                 <p class="descricao-quadro">Forneça imagens de referência que possam ajudar na criação do seu produto personalizado, destaquando detalhes visuais importantes que você deseje incorporar.</p>
                 <div class="quadro-ex-img">
                      <div class="box-insert-image">
                         <div class="custom-file-upload">
                             <input type="file" id="file-upload" class="insert-image" accept="image/*" multiple>
                             <label for="file-upload">Adicionar imagem</label>
                         </div>
                         <div class="container_img_anex">
                             <div id="image-preview" class="image-preview"></div>
                             <div id="alert" class="alert"></div>
                         </div>
                     </div> 
                     <script>
                         const fileUpload = document.getElementById('file-upload');
                         const imagePreview = document.getElementById('image-preview');
                         const alertDiv = document.getElementById('alert');
                 
                         fileUpload.addEventListener('change', function() {
                             const files = Array.from(fileUpload.files);
                             const currentFiles = imagePreview.querySelectorAll('.preview-image').length;
                             // Limpa o alerta anterior
                             alertDiv.textContent = '';
     
                 
                             // Verifica se o total de arquivos (atual + novos) excede 4
                             if (currentFiles + files.length > 4){
                                 alertDiv.textContent = 'Você só pode selecionar até 4 imagens.';
                                 fileUpload.value = '';
                                 // let msg = 'Você só pode selecionar até 4 imagens';
                                 // alert(msg);
                                 
                                 return;
                                 
                             }
                 
                             // Limpa as pré-visualizações anteriores
                             Array.from(files).forEach(file => {
                                 const reader = new FileReader();
                                 reader.onload = function(e) {
                                     // Cria um contêiner para a imagem e o botão de remoção
                                     const container = document.createElement('div');
                                     container.classList.add('image-container');
                 
                                     // Cria a imagem
                                     const img = document.createElement('img');
                                     img.src = e.target.result;
                                     img.classList.add('preview-image');
                 
                                     // Cria o botão de remoção
                                     const removeButton = document.createElement('button');
                                     removeButton.classList.add('remove-button');
                                     removeButton.textContent = '×';
                                     removeButton.onclick = function() {
                                         imagePreview.removeChild(container);
                                     };
                 
                                     // Adiciona a imagem e o botão ao contêiner
                                     container.appendChild(img);
                                     container.appendChild(removeButton);
                                     imagePreview.appendChild(container);
                                 };
                                 reader.readAsDataURL(file);
                             });
                         });
                     </script>
                 </div>
             </div>
         </div>
         <div class="box-button">
         <div data-modal="modal-1" class="btn-finalizar open-modal"><a href=""></a>Finalizar Pedido</div>

         <dialog id="modal-1">
             <div class="modal_header">
               <button class="close-modal" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
             </div>
             <div class="modal_body">
               <h5 class="title_modal_zap">Pedido Realizado!</h5>
               <div class="text_modal_zap">Segue o link do nosso WhatsApp para realizar o pagamento. Entraremos em contato em breve.</div>
               <div class="conatiner_item_modal_link_zap">
                 <div class="item_modal_link_zap">
                   <i class="fa-brands fa-whatsapp"></i>
                   <a href="#">67 991924837</a>
                 </div>
               </div>  
             </div>
           </dialog>
           <script src="../src/JS/modal.js"></script>
         </div>

     </form>
 
     
    </div>
 </main>
 