<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
  
    <title>Document</title>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>
<div class="header">
  Pesquisar:
  <input type="search" placeholder="digite aqui sua pesquisa">
  <button data-search="next">&darr;</button>
  <button data-search="prev">&uarr;</button>
  <button data-search="clear">✖</button>
</div>

<div class="content">
  <p>Mussum Ipsum, cacilds vidis litro abertis. Paisis, filhis, espiritis santis. Quem num gosta di mé, boa gentis num é. Copo furadis é disculpa de bebadis, arcu quam euismod magna. Detraxit consequat et quo num tendi nada.</p>

<p>Viva Forevis aptent taciti sociosqu ad litora torquent. Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Aenean aliquam molestie leo, vitae iaculis nisl. Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu levo!</p>

<p>Cevadis im ampola pa arma uma pindureta. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Interagi no mé, cursus quis, vehicula ac nisi.</p>

<p>Tá deprimidis, eu conheço uma cachacis que pode alegrar sua vidis. Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Quem num gosta di mim que vai caçá sua turmis! Pra lá , depois divoltis porris, paradis.</p>

<p>A ordem dos tratores não altera o pão duris. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Manduma pindureta quium dia nois paga. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.</p>

<p>Mé faiz elementum girarzis, <a href="http://mussumipsum.com/">Site Mussum Ipsum</a> nisi eros vermeio. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Diuretics paradis num copo é motivis de denguis.</p>

<p>Quem manda na minha terra sou euzis! Atirei o pau no gatis, per gatis num morreus. Per aumento de cachacis, eu reclamis. Vehicula non. Ut sed ex eros. Vivamus sit amet nibh non tellus tristique interdum.</p>

<p>Si num tem leite então bota uma pinga aí cumpadi! Suco de cevadiss deixa as pessoas mais interessantis. Delegadis gente finis, bibendum egestas augue arcu ut est. Leite de capivaris, leite de mula manquis sem cabeça.</p>
</div>





<Script>

$(function() {

// the input field
var $input = $("input[type='search']"),
  // clear button
  $clearBtn = $("button[data-search='clear']"),
  // prev button
  $prevBtn = $("button[data-search='prev']"),
  // next button
  $nextBtn = $("button[data-search='next']"),
  // the context where to search
  $content = $(".content"),
  // jQuery object to save <mark> elements
  $results,
  // the class that will be appended to the current
  // focused element
  currentClass = "current",
  // top offset for the jump (the search bar)
  offsetTop = 50,
  // the current index of the focused element
  currentIndex = 0;

/**
 * Jumps to the element matching the currentIndex
 */
function jumpTo() {
  if ($results.length) {
    var position,
      $current = $results.eq(currentIndex);
    $results.removeClass(currentClass);
    if ($current.length) {
      $current.addClass(currentClass);
      position = $current.offset().top - offsetTop;
      window.scrollTo(0, position);
    }
  }
}

/**
 * Searches for the entered keyword in the
 * specified context on input
 */
$input.on("input", function() {
    var searchVal = this.value;
  $content.unmark({
    done: function() {
      $content.mark(searchVal, {
        separateWordSearch: true,
        done: function() {
          $results = $content.find("mark");
          currentIndex = 0;
          jumpTo();
        }
      });
    }
  });
});

/**
 * Clears the search
 */
$clearBtn.on("click", function() {
  $content.unmark();
  $input.val("").focus();
});

/**
 * Next and previous search jump to
 */
$nextBtn.add($prevBtn).on("click", function() {
  if ($results.length) {
    currentIndex += $(this).is($prevBtn) ? -1 : 1;
    if (currentIndex < 0) {
      currentIndex = $results.length - 1;
    }
    if (currentIndex > $results.length - 1) {
      currentIndex = 0;
    }
    jumpTo();
  }
});
});

</Script>
</body>
</html>