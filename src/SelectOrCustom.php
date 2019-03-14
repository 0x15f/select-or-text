<?php

namespace Lynndigital\SelectOrCustom;

use Laravel\Nova\Fields\Field;

class SelectOrCustom extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'select-or-custom';

    public function options(array $options)
    {
        return $this->withMeta([
            'options' => collect($options ?? [])->map(function ($label, $value) {
                return ['label' => $label, 'value' => $value];
            })->values()->all(),
        ]);
    }
}
