<?php


namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCancelled extends Notification
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
                    ->line('Bạn đã hủy đơn hàng vé thành công.')
                    ->line('Tên vé: ' . $this->ticketData['name'])
                    ->line('Số lượng: ' . $this->ticketData['quantity'])
                    ->line('Tổng giá: ' . number_format($this->ticketData['total_price'], 0, ',', '.') . ' VND')
                    ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'ticket_cancelled',
            'ticket_name' => $this->ticketData['name'],
            'quantity' => $this->ticketData['quantity'],
            'total_price' => $this->ticketData['total_price'],
            'date' => $this->ticketData['date'],
            'time' => $this->ticketData['time'],
        ];
    }
}

