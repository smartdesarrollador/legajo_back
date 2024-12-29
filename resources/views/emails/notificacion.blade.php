<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Notificación de Contrato</h2>
        </div>
        
        <div class="content">
            <p>Estimado(a) {{ $trabajador->nombres }} {{ $trabajador->apellidos }},</p>
            
            <p>Le informamos que se ha registrado un nuevo contrato en nuestro sistema. 
            Pronto recibirá más información sobre el estado y los detalles del mismo.</p>
            
            <p>Por favor, esté atento a futuras comunicaciones.</p>
            
            <p>Saludos cordiales,<br>
            Equipo de Recursos Humanos</p>
        </div>
        
        <div class="footer">
            <p>Este es un correo automático, por favor no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html> 