<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Inflector;

class GenerateHelper extends Helper
{

    public $helpers = ['Form', 'Html'];

    private function getTitle($name) {
        return $name ? '<label><strong>' . __(Inflector::humanize($name)) . '</strong></label>' : null;
    }

    private function control($name, $form, $size) {
        return '<div class="form-group has-feedback input-group col-md-' . $size . ' col-xs-12">' . $this->getTitle($name) . $form . '</div>';
    }

    // $this->Generate->input('value', ['label' => __('Value'), 'class' => 'form-control', 'placeholder' => __('Value')], 4);
    // $this->Generate->input('value_id', ['label' => __('Values'), 'empty' => __('All Values'), 'class' => 'form-control select2', 'options' => [1,2,3,4,5]], 4);
    public function input($name, $array = [], $size = 12) {
        $label = $array['label']; $array['label'] = false;
        $form = $this->Form->control($name, $array);
        return $this->control($label, $form, $size);
    }

    // $this->Generate->image('image', 4);
    public function image($name, $size = 12) {
        $form = $this->Html->image('avatar.jpg', ['id' => 'show-file', 'class' => 'img-responsive img-circle', 'style' => 'margin: 0px auto; width: 200px; padding: 3px;']) . $this->Form->file($name, ['id' => 'select-file']);
        return $this->control(null, $form, $size);
    }

    // $this->Generate->select('value_id', [1,2,3,4,5], ['label' => __('Values'), 'empty' => __('All Values'), 'class' => 'form-control select2'], 4);
    public function select($name, $options, $array = [], $size = 12) {
        $label = $array['label']; $array['label'] = false;
        $form = $this->Form->select($name, $options, $array);
        return $this->control($label, $form, $size);
    }

    // $this->Generate->date('date', ['label' => __('Date'), 'type' => 'text', 'class' => 'form-control datepicker', 'placeholder' => Cake\I18n\Date::now()->format('d/m/Y')], 4);
    public function date($name, $array = [], $size = 12) {
        $label = $array['label']; $array['label'] = false;
        $form = $this->Form->input($name, $array);
        return $this->control($label, $form, $size);
    }

    // $this->Generate->boolean('active', ['label' => __('Active')], 4);
    public function boolean($name, $array = [], $size = 12) {
        $label = $array['label']; $array['label'] = false;
        $form = $this->getRadioBody($name);
        return $this->control($label, $form, $size);
    }

    private function getRadioBody($name) {
        return '<div class="btn-group" data-toggle="buttons" style="width: 100%;">' . $this->getLabel($name, 0) . $this->getLabel($name, 1) . '</div>';
    }

    private function getLabel($name, $value) {
        return '<label class="btn btn-default ' . (!$value ? 'active' : '') . '" style="width: 49%;"><input type="radio" name="' . $name . '" value="' . $value . '">' . (!$value ? __('Yes') : __('No')) . '</label>';
    }

}
