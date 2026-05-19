<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservación confirmada</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1f2937; background-color: #f3f4f6; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 12px; padding: 24px;">
        <h2 style="color: #0f172a;">Tu reservación ha sido confirmada</h2>

        <p>
            Hola, <strong>{{ $booking->user->name }}</strong>.
        </p>

        <p>
            Tu solicitud de servicio en <strong>ServiHogar</strong> ha sido confirmada y ya tiene un técnico asignado.
        </p>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">

        <p><strong>Servicio:</strong> {{ $booking->service->name }}</p>

        <p>
            <strong>Fecha y hora:</strong>
            {{ $booking->scheduled_at ? $booking->scheduled_at->format('d/m/Y H:i') : 'Sin fecha registrada' }}
        </p>

        <p>
            <strong>Técnico asignado:</strong>
            {{ $booking->technician->name ?? 'Por confirmar' }}
        </p>

        <p>
            <strong>Teléfono del técnico:</strong>
            {{ $booking->technician->phone ?? 'No disponible' }}
        </p>

        <p>
            <strong>Estado:</strong> Confirmada
        </p>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">

        <p style="font-size: 14px; color: #6b7280;">
            Gracias por confiar en ServiHogar. Te recomendamos estar pendiente en la fecha y hora programada.
        </p>
    </div>
</body>
</html>