 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="Margin: 0;padding: 0;min-width: 100%;background-color: #ffffff;">
    <center style="width: 100%;table-layout: fixed;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%; background-color: #fff;">    
        <!-- INICIO CONTENDOR GENERAL -->
        <div style="font-family: Arial,Helvetica,sans-serif;max-width: 600px; background-color:#fff">
            <table border="0" style="Margin: 0 auto;width: 100%;border-spacing: 0;max-width: 600px;" align="center">
                <tr>
                    <td>Nombre: <?=$nombre?></td>
                </tr>
                <tr>
                    <td>Fono: <?=$fono?></td>
                </tr>
                <tr>
                    <td>Empresa: <?=$empresa?></td>
                </tr>
                <tr>
                    <td>Asunto: <?=$asunto?></td>
                </tr>
                <tr>
                    <td align="center">Mensaje</td>
                </tr>
                <tr>
                    <td>
                        <?=$mensaje?>
                    </td>
                </tr> 
            </table>   
        </div>
    </center>
</body>
</html>