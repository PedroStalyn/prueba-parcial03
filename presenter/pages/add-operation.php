<!DOCTYPE html>
<html>

<head>
    <title>Prueba Tercer Parcial</title>
</head>

<body>

    <h2>PRUEBA TERCER PARCIAL</h2>

    <form id="calculatorForm">

        <label for="comboBox">Selecciona una opción:</label><br>
        <select id="comboBox" name="comboBox">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select><br><br>
        <label for="numOne">Número 1:</label><br>
        <input type="text" id="numOne" name="numero 1"><br><br>

        <label for="numTwo">Número 2:</label><br>
        <input type="text" id="numTwo" name="numero 2"><br><br>

        <input type="submit" value="Enviar">
    </form>

    <script src="../scripts/add-operation.js"></script>
</body>

</html>