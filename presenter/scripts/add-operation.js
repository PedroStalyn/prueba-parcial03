const form = document.getElementById('calculatorForm');

form.addEventListener('submit', (event) => {
  event.preventDefault(); 
  addOperation(event);
});

async function addOperation(event) {
    const numberOne = document.getElementById('numOne').value
    const numberTwo = document.getElementById('numTwo').value
    let result=parseInt(numberOne, 10)+ parseInt(numberTwo,10);

    const operation='Suma';

    const formData = new FormData();
    formData.append('numberOne',numberOne  );
    formData.append('numberTwo', numberTwo);
    formData.append('result', result);
    formData.append('operation', operation);
   
    try {
        const response = await fetch('http://localhost/_prueba-parcial3/businessLogic/swCalculator.php', {
          method: 'POST',
          body: formData
        });   
      } catch (error) {
        console.error('Error al agregar la operacion:', error);
      }
  }