<?php


namespace App\Notification;


use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class RegisterNotification extends Notification
{
    use Queueable;

    private $email, $password, $name;

    /**
     * RegisterNotification constructor.
     *
     * @param $email
     * @param $password
     * @param $name
     */
    public function __construct($email = "", $password = "", $name = "")
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }


    /**
     * Get the notification’s delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Welcome")
            ->greeting(new HtmlString("Hello <strong>$this->name</strong> !"))
            ->line('You are receiving this email because we received registered you in our system.')
            ->line("Use theses credentials to login in your account")
            ->line(new HtmlString("<strong>Email : $this->email</strong>"))
            ->line(new HtmlString("<strong>Mot de passe : $this->password</strong>"))
            ->action("Login", "/")
            ->line('Thank you for using our application!');
    }

}
