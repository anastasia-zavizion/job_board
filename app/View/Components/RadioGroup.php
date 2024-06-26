<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public array $options, public ?string $value = null, public ?bool $showAll = true )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }

    public function optionsWithLabels(){
        return array_is_list($this->options) ? array_combine(array_map('ucfirst',$this->options),$this->options) : $this->options;
    }
}
