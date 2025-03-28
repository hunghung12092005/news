<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data; // Khai báo biến data
    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data; // Gán dữ liệu vào biến
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Anh Hùng gửi mail từ nhà báo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    return new Content(
        view: 'email.sendMail', // Đảm bảo sử dụng tên view đúng
    );
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        // Truyền dữ liệu vào view
        return $this->view('email.sendMail')
        ->with('data', $this->data); // Truyền dữ liệu vào view; // Truyền dữ liệu vào view
    }
}
