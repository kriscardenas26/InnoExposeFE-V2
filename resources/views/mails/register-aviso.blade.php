@extends('mails.layout')

@section('content')
    <h1 style="font-size: 24px; font-weight: 400; color: #333; margin-bottom: 20px;">Hubo un nuevo registro por parte de un usuario.</h1>

    <p style="font-size: 16px; line-height: 1.5; color: #555; margin-bottom: 30px;">{{ $messages }}</p>

    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
            <tr>
                <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ $newLink }}" target="_blank" style="font-size: 16px; font-weight: 600; color: #fff; background-color: #14a3bb; border: solid 1px #14a3bb; border-radius: 4px; display: inline-block; padding: 10px 20px; text-decoration: none;">Ir a mi cuenta</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection

