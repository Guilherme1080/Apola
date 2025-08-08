document.addEventListener("DOMContentLoaded", function () {
    // === MÁSCARA CPF ===
    const cpfInput = document.getElementById('cpf-cad');
    cpfInput.addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');
        if (valor.length > 11) valor = valor.slice(0, 11);
        valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
        valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
        valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        this.value = valor;
    });

    // === MÁSCARA TELEFONE ===
    const telefoneInput = document.getElementById('telefone-cad');
    telefoneInput.addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');
        if (valor.length > 11) valor = valor.slice(0, 11);
        valor = valor.replace(/^(\d{2})(\d)/, '($1) $2');
        valor = valor.replace(/(\d{5})(\d{4})$/, '$1-$2');
        this.value = valor;
    });

    // === MÁSCARA CEP ===
    const cepInput = document.getElementById('cep-cad');
    cepInput.addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');
        if (valor.length > 8) valor = valor.slice(0, 8);
        valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');
        this.value = valor;
    });
});
