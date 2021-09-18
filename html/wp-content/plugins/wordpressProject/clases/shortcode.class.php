.<?php
class shortCode{
    public function formulario($atts){
    //attributes
    return '
        <div class="donation-plugin-modal" style="display: block; background: #362277; padding: 20px; border-radius: 10px; width:30%">
        <h2 style="color:#e13e3f; text-align:center">'
        . $atts .
            '</h2><br/>
            <form method="post" action="" style="text-align: center;">
                <input type="number" name="Importe" placeholder="Monto a aportar" style="border-radius: 10px; border: none; outline: none; width: 100%"/><br /><br />
                <input type="text" name="your_name" placeholder="Nombre completo" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
                <input type="email" name="your_email" placeholder="Email" style="border-radius: 10px; border: none;  outline: none ; width: 100%" /><br /><br />
                <input type="number" name="phone" placeholder="Número de teléfono" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
                <input type="submit" name="form_exaple_contact_submit" value="DONAR" style="border-radius: 10px; border: none; color: #362277; font-weight: bolder;background: #abe1c1;  outline: none ; width: 100%" /><br /><br />
            </form>
        </div>
        ';

    }
}

?>