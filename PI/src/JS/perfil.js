// Função para exibir o modal
function mostrarModal() {
    document.getElementById("modalSucesso").style.display = "block";
  
    // Esconde automaticamente após 3 segundos (opcional)
    setTimeout(() => {
      fecharModal();
    }, 3000);
  }
  
  // Função para fechar o modal
  function fecharModal() {
    document.getElementById("modalSucesso").style.display = "none";
  }
  
 
