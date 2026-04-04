<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    // 1. Khai báo biến public ở đây
    public $message;

    // 2. Thêm $message vào trong ngoặc của hàm __construct
    public function __construct($message)
    {
        // 3. Gán giá trị nhận được vào biến của class
        $this->message = $message;
    }

    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
