<p> {{ __('message.email_hello') }} {{ $user->name }},</p>
<p> {{ __('message.email_thanks_for_register') }}</p>
<a href="{{ route('verify', $user->token) }}"> {{ __('email_message.confirm_email') }}</a>
<p> {{ __('message.email_if_not_register') }}</p>
<p> {{ __('message.email_best_regards') }}</p>
<p> {{ __('message.email_team') }}{{ config('app.name') }}</p>
