function compararInput() {
    // Pegando o valor do input do email do usuário
    var InputEmail = document.getElementById('InputEmail').value;
    var InputPassword = document.getElementById('InputPassword').value;

    // Definindo uma variável para comparação
    var variavelComparacaoEmail = "teste@gmail.com";
    var variavelComparacaoPassword = "teste123";

    // Comparando o input com a variável
    if (InputEmail === variavelComparacao | InputPassword === variavelComparacaoPassword) {
        alert("O input é igual à variável de comparação.");
        alert("O input é igual à variável de comparação.");
    } else {
        alert("O input é diferente da variável de comparação.");
        console.log('O input é diferente da variável de comparação.');
    }
}
