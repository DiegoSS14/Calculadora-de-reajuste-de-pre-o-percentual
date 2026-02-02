<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajuste de preço</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    $valor = !empty($_GET['valor']) ? $_GET['valor'] : 0;
    $aumento = !empty($_GET['aumento']) ? $_GET['aumento'] : 50;
    $valorMaisAumento = $valor * $aumento / 100;
    $valorTotal = $valor + $valorMaisAumento;

    $fmt = new NumberFormatter('pt-BR', NumberFormatter::CURRENCY);
    ?>

    <form action=<?= $_SERVER['PHP_SELF'] ?> method="get">
        <h1>Reajustar preço</h1>

        <label for="v1">Valor</label>
        <input type="number" name="valor" id="valor" placeholder="R$1.8000" required value=<?= $valor ?>>

        <label for="v1">Aumento de 
            <strong>
                <span id="p">
                    <?= "$aumento" ?>
                </span>%
            </strong> 
        </label>
        <input type="range" name="aumento" id="aumento" oninput="mudaValor()" required min="0" max="500" step="1" value=<?= $aumento ?>>

        <input type="submit" value="Calcular média">
    </form>
    <div class="box text-center">
        <?php
        echo "O valor com o aumento é de: <strong class='bigtext'> " . $fmt->formatCurrency($valorTotal, 'BRL') ."</strong>";
        ?>
    </div>

    <script>
        mudaValor()

        function mudaValor() {
            p.innerText = aumento.value
        }
    </script>
</body>

</html>