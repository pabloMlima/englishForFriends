<?php

namespace App\View\Components;
use Illuminate\View\Component;

class Alerts extends Component{

    public string $type;
    public string $message;

    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alerts.alert');
    }
    //
}
