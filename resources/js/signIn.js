// Adicionar um listener de evento para o formulário de login
document.getElementById("login-form").addEventListener("submit", function (event) {
    // Prevenir o envio do formulário
    event.preventDefault();

    // Obtem os valores do formulário
    var username = document.getElementById("username").value;
    var password = document.getElementById("pass").value;

    // Criar um objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Abre a conexão para o script PHP com o método POST
    xhr.open("POST", "PHP/verificar_login.php", true);

    // Definir o tipo de conteúdo da requisição
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Definir a função de retorno de chamada que será executada quando a resposta da requisição estiver pronta
    xhr.onreadystatechange = function () {
        // Verificar se a requisição foi concluída com sucesso e a resposta está pronta
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Verificar se a resposta do script PHP é "ok"
            if (this.responseText === "ok") {
                // Redirecionar o usuário para a página de perfil se as credenciais de login forem válidas
                window.location.href = "perfil.php";
            } else {
                // Exibir a div de erro se as credenciais de login não forem válidas
                document.getElementById("erro").classList.remove("d-none");
            }
        }
    };

    // Enviar os dados do formulário para o script PHP
    xhr.send("username=" + encodeURIComponent(username) + "&pass=" + encodeURIComponent(password));

});
