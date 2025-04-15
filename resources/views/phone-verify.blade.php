<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Phone Verification</title>
  <link rel="icon" href="{{ Url('assets/favicon.svg') }}" />
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: sans-serif;
      background: #f9f9f9;
    }
    .spinner {
      border: 8px solid #eee;
      border-top: 8px solid #3498db;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 1s linear infinite;
      margin-bottom: 20px;
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    .code-inputs {
      gap: 10px;
    }
    .code-inputs input {
      width: 40px;
      height: 50px;
      font-size: 24px;
      text-align: center;
      border: 2px solid #ccc;
      border-radius: 8px;
    }
    h2 {
      margin-bottom: 20px;
      color: #333;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

  <h2>Te enviaremos un código a tu teléfono. Por favor, introdúcelo abajo.</h2>
  <div id="spinner" class="spinner"></div>

  <div id="codeInputs" class="code-inputs">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
  </div>

  <script>
        const title = document.querySelector('h2');
        const inputs = document.querySelectorAll('.code-inputs input');
        inputs[0].focus();
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                input.value = input.value.replace(/[^0-9]/g, '');
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                checkAllInputsFilled();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
        function checkAllInputsFilled() {
            const allFilled = Array.from(inputs).every(input => input.value.length === 1);
            if (allFilled) {
                title.innerText = 'Tu cita ha sido aprobada. Recibirás un SMS de nuestra parte dentro de 1 día antes de la fecha de la cita.';
                $('#codeInputs').remove();
                $('#spinner').remove();
                setTimeout(() => {
                  window.location.href = "/"
                }, 15000)
            }
        }
  </script>

</body>
</html>
