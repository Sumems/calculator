<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: helvetica, sans-serif;
            display: flex;
            justify-content: center;
        }
        .calculator {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 240px;
            border: 1px solid #ccc;
            padding: 2vh;
            border-radius: 2vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 1vh;
            border: 1px solid #000;
            border-radius: 1vh;
            font-size: 1.5rem;
        }
        .calculator button {
            width: 48px;
            height: 48px;
            margin: 6px;
            font-size: 1.5rem;
            font-weight: bold;
            border: 2px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            background-color: chartreuse;
        }
        .calculator button:hover {
            background-color: #f0f0f0;
        }
        form {
            display: flex;
            flex-wrap:wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form action="" method="post">
            <input type="text" name="expression" id="expression" value="<?php echo isset($_POST['expression']) ? $_POST['expression'] : ''; ?>">
            <br>
            <button type="submit" name="number" value="7">7</button>
            <button type="submit" name="number" value="8">8</button>
            <button type="submit" name="number" value="9">9</button>
            <button type="submit" name="operator" value="+">+</button>
            <br>
            <button type="submit" name="number" value="4">4</button>
            <button type="submit" name="number" value="5">5</button>
            <button type="submit" name="number" value="6">6</button>
            <button type="submit" name="operator" value="-">-</button>
            <br>
            <button type="submit" name="number" value="1">1</button>
            <button type="submit" name="number" value="2">2</button>
            <button type="submit" name="number" value="3">3</button>
            <button type="submit" name="operator" value="*">×</button>
            <br>
            <button type="submit" name="clear" value="C">C</button>
            <button type="submit" name="number" value="0">0</button>
            <button type="submit" class="equal" name="calculate" value="=">=</button>
            <button type="submit" name="operator" value="/">÷</button>
        </form>
    </div>
    <?php
        if(isset($_POST['calculate'])){
            if(isset($_POST['expression']) && !empty($_POST['expression'])){
                $expression = $_POST['expression'];
                $result = eval('return '.$expression.';');
                echo '<script>document.getElementsByName("expression")[0].value = "'.$result.'";</script>';
            }
        }
        if(isset($_POST['number'])){
            echo '<script>document.getElementsByName("expression")[0].value += "'.$_POST['number'].'";</script>';
        }
        if(isset($_POST['operator'])){
            echo '<script>document.getElementsByName("expression")[0].value += "'.$_POST['operator'].'";</script>';
        }
        if(isset($_POST['clear'])){
            echo '<script>document.getElementsByName("expression")[0].value = "";</script>';
        }
    ?>
</body>
</html>