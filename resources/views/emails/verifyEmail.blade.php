<p> {{ __('message.hello') }} {{ $user->name }},</p>
<p> {{ __('message.thanks_for_register') }}</p>
<a href="{{ route('verify', $user->token) }}"> {{ __('message.confirm_email') }}</a>
<p> {{ __('message.if_not_register') }}</p>
<p> {{ __('message.best_regards') }}</p>
<p> {{ __('message.team') }}{{ config('app.name') }}</p>
