
# Auth0

  

Este é repositório é um PoC utilizando SDK Auth0

  

# Docker

Docker building:

    # docker-compose up -d --build login_sso

Acessando o container:

    # docker exec -it login_sso /bin/sh

  

# Cliente
1 - Para iniciar o servidor web:

    # php -S 0.0.0.0:3003
2 - Acesse via navegador

> http://localhost:3003

Clique no link *login*, você será redirecionado para o ambiente da Auth0 para efetuar a autenticação, por ser um ambiente de testes, você pode fornecer qualquer e-mail@e-mail.com e senha que será validado.
