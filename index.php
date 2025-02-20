<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Digite uma string para substituir as vogais por asteriscos: </h2>
    <form method="POST" action="">
        <input type="text" name="input_string" placeholder="Digite uma string" required>
        <button type="submit">Enviar</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input_string"])){ 
            $input_string = $_POST["input_string"];
            $output_string = preg_replace('/[aeiouAEIOU]/', '*', $input_string);

            echo "<h3>String original: $input_string</h3>";
            echo "<h3>String modificada: $output_string</h3>";
        }
    ?>

    <h2>Verifique se um número é primo: </h2>
    <form method="POST" action="">
        <input type="number" name="numero" placeholder="Digite um número" required>
        <button type="submit">Verificar</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"])){ 
            $numero = $_POST["numero"];
            $is_prime = true;

            if ($numero <= 1) {
                $is_prime = false;
            } else {
                for ($i = 2; $i <= sqrt($numero); $i++) {
                    if ($numero % $i == 0) {
                        $is_prime = false;
                        break;
                    }
                }
            }

            if ($is_prime) {
                echo "<h3>O número $numero é primo.</h3>";
            } else {
                echo "<h3>O número $numero não é primo.</h3>";
            }
        }
    ?>

    <h2>Inverta uma string: </h2>
    <form method="POST" action="">
        <input type="text" name="string_to_reverse" placeholder="Digite uma string" required>
        <button type="submit">Inverter</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["string_to_reverse"])){ 
            $string_to_reverse = $_POST["string_to_reverse"];
            $reversed_string = '';
            for ($i = strlen($string_to_reverse) - 1; $i >= 0; $i--) {
                $reversed_string .= $string_to_reverse[$i];
            }

            echo "<h3>String original: $string_to_reverse</h3>";
            echo "<h3>String invertida: $reversed_string</h3>";
        }
    ?>

    <h2>Verifique se um número é positivo, negativo ou zero: </h2>
    <form method="POST" action="">
        <input type="number" name="numero_verificar" placeholder="Digite um número" required>
        <button type="submit">Verificar</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero_verificar"])){ 
            $numero_verificar = $_POST["numero_verificar"];
            if ($numero_verificar > 0) {
                echo "<h3>O número $numero_verificar é positivo.</h3>";
            } elseif ($numero_verificar < 0) {
                echo "<h3>O número $numero_verificar é negativo.</h3>";
            } else {
                echo "<h3>O número $numero_verificar é zero.</h3>";
            }
        }
    ?>

    <h2>Conte o número de palavras em uma frase e imprima cada palavra em uma nova linha: </h2>
    <form method="POST" action="">
        <input type="text" name="frase" placeholder="Digite uma frase" required>
        <button type="submit">Contar Palavras</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["frase"])){ 
            $frase = $_POST["frase"];
            $palavras = explode(' ', $frase);
            $numero_palavras = count($palavras);

            echo "<h3>Número de palavras: $numero_palavras</h3>";
            foreach ($palavras as $palavra) {
                echo "$palavra<br>";
            }
        }
    ?>

    <h2>Verifique se uma palavra é um palíndromo: </h2>
    <form method="POST" action="">
        <input type="text" name="palavra" placeholder="Digite uma palavra" required>
        <button type="submit">Verificar</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviadoa
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["palavra"])){ 
            $palavra = $_POST["palavra"];
            $palavra = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $palavra)); // Remove espaços e caracteres especiais
            $reversed_palavra = '';
            for ($i = strlen($palavra) - 1; $i >= 0; $i--) {
                $reversed_palavra .= $palavra[$i];
            }

            if ($palavra == $reversed_palavra) {
                echo "<h3>A palavra '$palavra' é um palíndromo.</h3>";
            } else {
                echo "<h3>A palavra '$palavra' não é um palíndromo.</h3>";
            }
        }
    ?>

    <h2>Imprima os números de 1 a 20, substituindo múltiplos de 3 por "?": </h2>
    <form method="POST" action="">
        <input type="hidden" name="imprimir_numeros" value="1">
        <button type="submit">Imprimir Números</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["imprimir_numeros"])){ 
            echo '<div id="numeros">';
            for ($i = 1; $i <= 20; $i++) {
                if ($i % 3 == 0) {
                    echo "?<br>";
                } else {
                    echo "$i<br>";
                }
            }
            echo '</div>';
            echo '<button onclick="document.getElementById(\'numeros\').classList.toggle(\'hidden\')">Retrair Numeros</button>';
        }
    ?>

    <h2>Remova os espaços em branco de uma string: </h2>
    <form method="POST" action="">
        <input type="text" name="string_com_espacos" placeholder="Digite uma string com espaços" required>
        <button type="submit">Remover Espaços</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["string_com_espacos"])){ 
            $string_com_espacos = $_POST["string_com_espacos"];
            $string_sem_espacos = str_replace(' ', '', $string_com_espacos);

            echo "<h3>String original: $string_com_espacos</h3>";
            echo "<h3>String sem espaços: $string_sem_espacos</h3>";
        }
    ?>

    <h2>Calcule e imprima os números Fibonacci até o décimo termo: </h2>
    <form method="POST" action="">
        <input type="hidden" name="fibonacci" value="1">
        <button type="submit">Calcular Fibonacci</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fibonacci"])){ 
            echo '<div id="fibonacci">';
            $fibonacci = [0, 1];
            for ($i = 2; $i < 10; $i++) {
                $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
            }

            echo "<h3>Números Fibonacci até o décimo termo:</h3>";
            foreach ($fibonacci as $numero) {
                echo "$numero<br>";
            }
            echo '</div>';
            echo '<button onclick="document.getElementById(\'fibonacci\').classList.toggle(\'hidden\')">Retrair Fibonacci</button>';
        }
    ?>

    <h2>Verifique se um texto é um pangrama: </h2>
    <form method="POST" action="">
        <input type="text" name="texto" placeholder="Digite um texto" required>
        <button type="submit">Verificar Pangrama</button>
    </form>

    <?php   
        // Verificar se o formulario foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["texto"])){ 
            $texto = $_POST["texto"];
            $texto = strtolower(preg_replace("/[^a-z]/", '', $texto)); // Remove caracteres não alfabéticos e converte para minúsculas
            $letras = count(array_unique(str_split($texto)));

            if ($letras == 26) {
                echo "<h3>O texto é um pangrama.</h3>";
            } else {
                echo "<h3>O texto não é um pangrama.</h3>";
            }
        }
    ?>
</body>
</html>