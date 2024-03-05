function compararInput() {
    // Pegando o valor do input do email do usuário
    var InputEmail = document.getElementById('InputEmail').value;
    var InputPassword = document.getElementById('InputPassword').value;

    // Definindo uma variável para comparação
    var variavelComparacaoEmail = "teste@gmail.com";
    var variavelComparacaoPassword = "teste123";

    // Comparando o input com a variável
    if (InputEmail === variavelComparacaoEmail && InputPassword === variavelComparacaoPassword) {
        alert("Logado com sucesso!!!");
    } 
    else {
        /////separação informando se está errado o email ou se é a senha
        if(InputEmail != variavelComparacaoEmail){
            alert("Não existe cadastro para este email.");
        }
        else if(InputPassword != variavelComparacaoPassword){
            alert("Senha Invalida");
        }
    }
}