<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class userRegisteredNotification extends Notification
{
    use Queueable;

     public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this -> user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($user)
    {
        return (new MailMessage)
                    ->greeting('Global .net')
                    ->line("Salut Mr/MMe/Mlle $user->name ")
                     ->subject('Bienvenue chez Global .net')
                    ->line('Votre compte a été bien validé! Vous pouvez maintenant vous connecter à votre espace client et profiter de nos services.')
                    ->line('Merci !')
                    ->salutation('Cordialement, Global.net')
                    ->action('Se connecter', route('login'))
                    
                    -> from("globalnet@support.com", 'Global .net Support client');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
