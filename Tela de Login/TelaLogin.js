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
        ////Aqui seria direcionado para a proxima pagina 
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

function senha() {
    // Oculta a div com o id "FormLogin"
    document.getElementById('FormLogin').style.display = 'none';
        document.getElementById('FormEqueciaSenha').style.display = 'block';
}

function enviosenha() {
    // Oculta a div com o id "FormLogin"
    var InputEmailReset = document.getElementById('InputEmailReset').value;
    var variavelComparacaoEmail = "teste@gmail.com";
    
    if (InputEmailReset === variavelComparacaoEmail) {
        alert("Foi enviado para seu Email sua nova senha !!!");
        location.reload();
    } 
    else{
        alert("Não existe cadastro para este email.");
        location.reload();
    }
}
