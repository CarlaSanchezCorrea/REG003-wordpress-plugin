<?php
class shortCode{
    public function formulario($atts){
    //attributes
    return '
    <html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="donation-plugin-modal" style="display: block; background: #362277; padding: 20px; border-radius: 10px; width:30%">
        <h2 style="color:#e13e3f; text-align:center">'
        . $atts .
            '</h2><br/>
            <form method="post" style="text-align: center;">
                <input type="number" name="importe" placeholder="Monto a aportar" style="border-radius: 10px; border: none; outline: none; width: 100%"/><br /><br />
                <input type="text" name="your_name" placeholder="Nombre completo" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
                <input type="email" name="your_email" placeholder="Email" style="border-radius: 10px; border: none;  outline: none ; width: 100%" /><br /><br />
                <input type="number" name="phone" placeholder="Número de teléfono" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
                <input type="submit" name="submit" value="DONAR" id="buyButton" style="border-radius: 10px; border: none; color: #362277; font-weight: bolder;background: #abe1c1;  outline: none ; width: 100%" /><br /><br />
            </form>
            <script src="https://checkout.culqi.com/js/v3"></script>
            <script>
 
            // Configura tu llave pública
            Culqi.publicKey = "Aquí inserta tu llave pública";
            // Configura tu Culqi Checkout
            Culqi.settings({
                title: "Culqi Store",
                currency: "PEN",
                description: "Polo Culqi lover",
                amount: 3500
            });
            // Usa la funcion Culqi.open() en el evento que desees
            $("#buyButton").on("click", function(e) {
                // Abre el formulario con las opciones de Culqi.settings
                Culqi.open();
                e.preventDefault();
            }); 
        </script>
        </div>
    </body>
    </html>
    ';
   
    }

    
}

?>