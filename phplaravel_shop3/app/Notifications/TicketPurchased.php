<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketPurchased extends Notification
{
    use Queueable;

    protected $ticketData;

    public function __construct($ticketData)
    {
        $this->ticketData = $ticketData;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Vé đã được mua thành công')
        ->line('Cảm ơn bạn đã mua vé!')
        ->line('Loại vé: ' . $this->ticketData['ticket_type'])
        ->line('Số lượng: ' . $this->ticketData['quantity'])
        ->line('Tổng giá: ' . $this->ticketData['total_price'])
        ->line('Ngày triển lãm: ' . $this->ticketData['date'])
        ->line('Giờ triển lãm: ' . $this->ticketData['time'])
        ->action('Xem chi tiết', url('/'))
        ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'ticket_purchased',
            'ticket_name' => $this->ticketData['name'],
            'quantity' => $this->ticketData['quantity'],
            'total_price' => $this->ticketData['total_price'],
            'date' => $this->ticketData['date'],
            'time' => $this->ticketData['time'],
        ];
    }
}
