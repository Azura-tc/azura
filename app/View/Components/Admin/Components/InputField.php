<?php

namespace App\View\Components\Admin\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $name, public string $placeholder, public string $type = 'text', public bool $hite = true, public ?string $label = null, public bool $textarea = false, public ?string $value = null, public ?string $old = null, public ?string $id = null, public ?bool $disabled = false)
    {
        if(is_null($old)) $this->old = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.input-field');
    }
}
