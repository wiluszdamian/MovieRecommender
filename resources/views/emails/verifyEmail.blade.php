<p>Witaj {{ $user->name }},</p>
<p>Dziękujemy za rejestrację! Aby dokończyć proces i aktywować swoje konto, kliknij poniższy link:</p>
<a href="{{ route('verify', $user->token) }}">Potwierdź adres e-mail</a>
<p>Jeśli nie rejestrowałeś się na naszej stronie, zignoruj tę wiadomość.</p>
<p>Pozdrawiamy,</p>
<p>Zespół {{ config('app.name') }}</p>
