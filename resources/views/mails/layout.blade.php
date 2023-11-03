<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #fff; border-radius: 4px; margin-top: 20px;">
                    <tr>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="padding: 20px; border-radius: 4px;">
                            @yield('content')
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#f5f5f5" style="padding: 20px; border-radius: 4px; font-size: 14px; color: #888;">
                            {{ config('app.name') }} &copy; {{ date('Y') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
