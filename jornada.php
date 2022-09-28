<?php
session_start();
include "include/MySql.php";
$titulo = "Jornada do Herói";
include "head.php";
?>

<link rel="stylesheet" href="assets/css/metodo_criacao.css">

<body>
    <div class="jornada-espaco">
        <h1 class="titulo-jornada"><b>Jornada do Herói</b></h1>
        <img class="jornada-img" src="assets/images/jornada.jpg" alt="">

    </div>
<div class="jornada-espaco2">
        <div class="jornada-text">
            <p>Jornada do herói, ou monomito, é a estrutura de storytelling mais utilizada em mitos, lendas, romances e obras narrativas em geral, criada em 1949 pelo antropólogo Joseph Campbell. O conceito apresenta uma forma cíclica de contar histórias, em que o protagonista supera vários desafios para se tornar um herói.</p>
            <p>
                Presente nas mais diversas narrativas, desde as antigas fábulas até os filmes modernos, a jornada é como uma fórmula da construção de histórias, capaz de envolver os leitores e espectadores na trama.
            </p>
            <p>
                Basicamente, o modelo gira em torno da trajetória de um herói, que parte de seu mundo comum para viver aventuras em outros universos e passar por grandes provações.
            </p>
            <p>
                O criador do conceito foi Joseph Campbell, mas a jornada do herói também ficou famosa pela adaptação do roteirista Christopher Vogler.
            </p>
            <h3 class="jornada-h3">1. O mundo comum</h3>
            <p> É a ambientação inicial, que mostra quem é o personagem, como e onde ele vive, com quem se relaciona e como sua vida poderia ser monótona e bem parecida com a vida de qualquer outra pessoa comum.
            </p>
            <p>
                Aqui, a natureza do personagem é exibida, assim como suas qualidades e defeitos, forças e fraquezas, e demais detalhes capazes de fazer com que o público encontre pontos de identificação com ele.
            </p>
            <h3 class="jornada-h3">2. O chamado à aventura</h3>
            <p>
                A aventura começa quando o personagem se depara com o conflito, com o chamado para uma missão que o tira do seu mundinho comum, da sua zona de conforto. Não necessariamente precisa ser algo dramático como a morte — basta que seja um desafio que o obrigue a experimentar coisas novas.
            </p>
            <p>
                Esse desafio está relacionado a coisas importantes para ele, como a manutenção da sua própria segurança ou da sua família, a preservação da comunidade onde vive, o destino da sua vida, ou qualquer outra coisa que ele queira muito conquistar ou manter.
            </p>
            <h3 class="jornada-h3">3. Recusa do chamado</h3>
            <p>
                Diante de um grande desafio, é natural que surjam os medos, hesitações e muitos conflitos interiores. Por isso, em um primeiro momento, o personagem recusa o chamado que recebeu e tenta convencer a si mesmo de que não se importa com aquilo.
            </p>
            <p>
                Mesmo que surja algum tipo de ansiedade para realizar a missão que recebeu, ele compara a segurança e conforto do seu lar com os caminhos tortuosos que poderá encontrar à sua frente e, consequentemente, prefere se manter onde está. Porém, o conflito não deixa de incomodá-lo.
            </p>
            <h3 class="jornada-h3"> 4. Encontro com o mentor</h3>
            <p>
                Diante do impasse em que se encontra, o nosso herói precisa de um empurrãozinho. É chegada a hora de ele encontrar seu mentor, que dará a ele o que for necessário para que ele enfrente o desafio que foi proposto.
            </p>
            <p>
                Nesse ponto, é possível incluir até mesmo algum tipo de força sobrenatural, que dá ao personagem um objeto, um treinamento, conselhos, poderes ou qualquer outra coisa que faça com que ele encontre a autoconfiança necessária para resolver o seu conflito e aceitar o desafio.
            </p>
            <h3 class="jornada-h3">5. A travessia do primeiro limiar</h3>
            <p>
                Finalmente, chegou o momento em que o nosso herói está pronto para cruzar o limite entre o mundo que ele conhece e com o qual está acostumado e o mundo novo para o qual ele deve ir.
            </p>
            <p>
                Esse mundo não precisa ser um local físico, de fato, e sim algo desconhecido pelo personagem. Pode ser, por exemplo, a descoberta de um segredo, a aquisição de uma nova habilidade, ou até mesmo a mudança de lugar propriamente dita.
            </p>
            <h3 class="jornada-h3">6. Provas, aliados e inimigos</h3>
            <p>
                Agora que o herói colocou o pé na estrada rumo ao seu objetivo maior, ele começa a se deparar com diversos desafios menores, contratempos e obstáculos que, gradativamente, vão testando suas habilidades e deixando-o mais preparado para as maiores provações que ainda estão por vir.
            </p>
            <p>
                Aqui, é mostrada uma visão mais profunda do personagem e sua capacidade de descobrir quem são as pessoas com quem pode contar e quem são as que desejam prejudicar sua jornada, ou seja, seus aliados e inimigos. Nesse ponto, a identificação com o público se torna ainda maior.
            </p>
        </div>
</div>
    <?php
    include "footer.php";
    ?>