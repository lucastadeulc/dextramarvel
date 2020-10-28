# Dextra - Marvel Challenge - Lucas Costa

## Requisitos Gerais

1- Composer<br>
2- Algum database


## Como Rodar
1- Clonar este repositório ou baixar o mesmo, como preferir

2- <code>composer install</code>

3- Alterar .env.example para as configurações de banco de dados, criar um arquivo .env com as informações alteradas.

4- <code>php artisan migrate</code>

5- <code>php artisan db:seed</code>

6- <code>vendor/bin/phpunit</code>

7- <code>php -S localhost:8000 -t blog/public</code>


## Descrição:
Minha opção inicial tinha sido o Yii Framework até pelos requisitos da vaga, mas como não pude trabalhar no desafio até a segunda feira, 
escolhi por usar o Lumen, visto que o aprendizado seria mais rápido e ele é uma ótima escolha para uma API assim.<br>
A medida que fui desenvolvendo fui utilizando o que precisava, como migrations, seeds, fractal para os transformers, e phpunit para os testes.
Entendo que os relacionamentos deveriam ser ManyToMany mas não teria tempo para implementar tudo, acabei optando por ser oneToMany.
<br>
Implementei alguns retornos de erros com base na API, mas também não implementei todos os campos que a API retorna para os requests como "/comics" por exemplo,
pois eram muitos campos, e creio que o desafio não é para isso. 
<br>
Utilizei os transformers para retornar os dados de forma que mais se aproximasse da API original.<br>
Acho que basicamente é isto, queria ter tido mais tempo para este desafio mas infelizmente meus trabalhos não permitiram.
<br>
<b>Agradeço pelo tempo disponibilizado, e pela cordialidade :)</b>
