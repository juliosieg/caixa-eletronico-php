# Caixa Eletrônico

Este exemplo visa simular a ação de saque em um caixa eletrônico, obtendo como saída a quantidade de notas de cada valor que serão disponibilizadas para o usuário.
Para o exemplo, as notas disponíveis são as seguintes:

 - R$ 100,00
 - R$ 50,00
 - R$ 20,00
 - R$ 10,00

Vale ressaltar que em caso de não possibilidade de saque por valor inválido ou por incapacidade devido às notas disponíveis, o resultado será apresentado com uma mensagem que informe a indisponibilidade de saque.

# Preparação do Ambiente

Esse exemplo foi criado utilizando **PHP**. Para executá-lo, inicialmente será necessário um servidor web local na máquina. Indico o uso do [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou [WAMP](http://www.wampserver.com/en/) (em caso de utilização no Windows) por serem de fácil instalação e utilização.

Após o download e instalação do servidor local, esse projeto deverá ser clonado para dentro da pasta de projetos do software escolhido, normalmente *htdocs*.

## Instalação dos pacotes

Para gerenciamento das dependências do projeto, foi utilizado o [Composer](https://getcomposer.org/). A instalação das dependências se dá executando o seguinte comando:

    composer install

Após a execução do comando supracitado, o projeto estará pronto para ser executado.

## Exemplo de utilização

Um exemplo de como a classe de Caixa Eletrônico poderá ser utilizada está disponível no arquivo *index.php* que está incluso no projeto.

## Execução dos testes unitários

Os testes unitários utilizam o framework [PHPUnit](https://phpunit.de/) e podem ser executados através do seguinte comando:

    vendor/bin/phpunit tests/

onde "tests/" é o nome da pasta que contém o arquivo de testes unitários da classe.

# Entendendo o algoritmo criado...
O algoritmo criado, que está na classe CaixaEletronico.php, funciona da seguinte forma:

 - Inicialmente, testo se o valor recebido é do tipo inteiro. Se o valor não for um inteiro, o mesmo foi informado incorretamente ou trata-se de um valor com centavos, o que não é aceito pelo caixa eletrônico do exemplo. Além disso, verifico se o valor é menor ou igual à zero. Se isso acontecer, não faz sentido executar o saque pois o valor está incorreto.
 - Após, inicio um *loop* entre as notas disponíveis no *array* de notas.
 - Faço uma verificação para saber se o valor atual é maior ou igual à um dos próximos elementos do array. Com esse teste, eu consigo saber se devo seguir a execução do algoritmo caso a nota atual seja maior do que o valor atual.
 - Depois, verifico se o valor consegue chegar à um resultado com as notas disponíveis, ou caso sempre tenha uma sobra que não corresponda às notas disponíveis, informo que o saque é inválido.
 - No caso de saque possível, monto o resultado na função **mostraResultado** e no caso de saque impossível resulto na função **saqueImpossivel**.
 - As funções **mostraResultado** e **saqueImpossivel** foram definidas como privadas, assim como a variável de notas disponíveis, pois só serão usadas dentro da classe.
 - Já a função **efetuarSaque** será utilizada em outros lugares e por isso foi criada como pública.
