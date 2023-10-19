<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="padding: 40px 20px 20px 20px; border-radius: 4px;">
                            <a href="{{ url('/') }}" target="_blank">
                                <img src="{{ asset('img/Logo Sin Fondo.png') }}" alt="{{ config('app.name') }}" width="150">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="padding: 20px; border-radius: 4px;">
                            @yield('content')
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#f5f5f5" style="padding: 20px; border-radius: 4px;">
                            {{ config('app.name') }} &copy; {{ date('Y') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
