<?php

namespace gkinder\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class CustomResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        Session::flash('message', 'Por favor revise su EMail para poder reestrablecer su contraseña. Muchas Gracias.');
        return (new MailMessage)
            ->from('no-response@gkinder.com')
            ->subject('Solicitud para reestablecer contraseña')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Recientemente se solicito el reseteo de tu password. Para poder cambiar tu contraseña por favor has un click en el botón')
            ->action('Reseteo de Password', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Si tu no has solicitado el reseteo de tu password, no necesitas realizar ninguna acción.')
            ->salutation('Muchas gracias, equipo de GKinder');

    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
