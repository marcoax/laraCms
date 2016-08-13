<?php
namespace App\laraCms\Admin;

Use Form;
Use App;
use Carbon\Carbon;

class AdminForm
{

    protected $html;
    protected $property;
    protected $showSeo;

    public function get($model)
    {
        $this->showSeo = false;
        $this->initForm($model);
        echo $this->render();
    }

    public function getSeo($model)
    {
        $this->showSeo = true;
        $this->initForm($model);
        echo $this->render();
    }

    public function render()
    {
        return $this->html;
    }

    protected function initForm($model)
    {
        $this->html = "";
        $this->model = $model;
        foreach ($this->model->getFieldSpec() as $key => $property) {
            if ((starts_with($key, 'seo') && $this->showSeo) or (!starts_with($key, 'seo') && !$this->showSeo)) $this->formModelHandler($property, $key, $this->model->$key);
        }

        if (isset($this->model->translatedAttributes) && count($this->model->translatedAttributes) > 0) {
            $this->model->fieldspec = $this->model->getFieldSpec();
            foreach (config('app.locales') as $locale => $value) {
                if (config('app.locale') != $locale) {
                    $target = "language_box_" . str_slug($value) . "_" . str_random(160);
                    $this->html .= $this->containerLanguage($value, $target);
                    $this->html .= "<div class=\"collapse\" id=\"" . $target . "\">";
                    foreach ($this->model->translatedAttributes as $attribute) {
                        $value = (isset($this->model->translate($locale)->$attribute)) ? $this->model->translate($locale)->$attribute : '';
                        $this->property = $this->model->fieldspec[$attribute];
                        if ((starts_with($attribute, 'seo') && $this->showSeo) or (!starts_with($attribute, 'seo') && !$this->showSeo)) $this->formModelHandler($this->model->fieldspec[$attribute], $attribute . '_' . $locale, $value);
                    }
                    $this->html .= "</div>";
                }

            }
        }
    }

    private function formModelHandler($property, $key, $value = '')
    {
        $this->property = $property;
        $cssClass = (isset($this->property['cssClass'])) ? $this->property['cssClass'] : ' ';
        $cssClassElement = (isset($this->property['cssClassElement'])) ? $this->property['cssClassElement'] : ' col-md-10';
        $isLangField = (isset($this->property['lang']) && $this->property['lang'] == 1) ? true : false;
        $formElement = '';
        if ($isLangField || $this->property['display'] != 1) {
        } else if ($this->property['type'] == 'string') {
            $formElement = Form::text($key, $value, array('class' => ' form-control ' . $cssClass));
        } else if ($this->property['type'] == 'readonly') {
            $formElement = Form::text($key, $value, array('readonly' => 'true', 'class' => ' form-control ' . $cssClass));
        } else if ($this->property['type'] == 'date' || $this->property['type'] == 'date-readonly') {
            $value = ($value) ? Carbon::parse($value)->format('d-m-Y') : date('d-m-Y');
            $formElement = ($this->property['type'] == 'date-readonly') ? $formElement = Form::text($key, $value, array('readonly' => 'true', 'class' => ' form-control ' . $cssClass)) : Form::text($key, $value, array('class' => ' form-control ' . $cssClass));
            $cssClassElement = (isset($this->property['cssClassElement'])) ? $this->property['cssClassElement'] : 'col-md-2';
        } else if ($this->property['type'] == 'integer' && $this->property['display'] == 1) {
            $cssClassElement = (isset($this->property['cssClassElement'])) ? $this->property['cssClassElement'] : 'col-md-2';
            $formElement = Form::text($key, $value, array('class' => ' form-control ' . $cssClass));

        } else if ($this->property['type'] == 'text' && $this->property['display'] == 1) {
            $formElement = Form::textarea($key, $value . '', array('class' => 'form-control ' . $cssClass));

        } else if ($this->property['type'] == 'boolean' && $this->property['display'] == 1) {
            //$formElement = Form::checkbox($key, 1 , $this->model->$key );
            $activeNo = ($value != '1') ? ' active' : '';
            $activeYes = ($value == '1') ? 'active' : '';
            $formElement .= "<div class=\"btn-group\" data-toggle=\"buttons\">\n";
            $formElement .= ' <label class="btn btn-default ' . $activeYes . '" onclick="$(\'#' . $key . '\').val(1)">
									<input type="radio"  name="options"  autocomplete="off" ' . $activeYes . '>' . trans('admin.label.btn_yes') . '
								</label>';
            $formElement .= ' <label class="btn btn-default ' . $activeNo . '" onclick="$(\'#' . $key . '\').val(0)">
									<input type="radio"  name="options"  autocomplete="off" ' . $activeNo . '> ' . trans('admin.label.btn_no') . '
								</label>';
            $formElement .= "</div>\n";
            $formElement .= Form::hidden($key, $value, array('id' => $key, 'class' => ' form-control ' . $cssClass));

        } else if ($this->property['type'] == 'media' && $this->property['display'] == 1) {
            $formElement = Form::file($key);
            $cssClassElement = 'col-md-4';

        } else if ($this->property['type'] == 'relation' && $this->property['display'] == 1) {

            $objRelation = $this->getRelation();
            $selected = (isset($this->property['relation_name']) && $this->property['relation_name'] != '') ? $this->model->{$this->property['relation_name']}->lists('id')->toArray() : '';
            $formElement = $this->getComboRelation($objRelation, $key, $value, $selected);
        }
        if ($formElement && $this->property['type'] == 'media') $this->html .= $this->containerMedia($formElement, $cssClassElement, $key);
        else if ($formElement) $this->html .= $this->container($formElement, $cssClassElement);

    }

    /**
     * @param $formElement
     * @param string $cssClass
     * @return string
     */
    function container($formElement, $cssClass = "")
    {
        $html = "<div class=\"form-group\">";
        $html .= "<label for=\"" . $this->property['label'] . "\" class=\"col-md-2 control-label\">\n";
        $html .= $this->property['label'];
        if (isset($this->property['required']) && $this->property['required'] == '1') $html .= " * ";
        if (isset($this->property['extraMsg'])) {
            if (isset($this->property['extraMsgEnabled'])) {
                $html .= "<br><span class=\"help-inline small extraMsg\"> (" . $this->extraMsgHandler() . ")</span> ";
            }
        }
        $html .= "</label>\n";
        $html .= "<div class=\"" . $cssClass . "\">\n";
        $html .= $formElement;
        $html .= "</div>";
        $html .= "</div>\n";
        $html .= "<div class=\"clearfix\"></div>\n";
        return $html;
    }


    function containerMedia($formElement, $cssClass = "", $key)
    {
        $html = '';
        $html .= "<div class=\"form-group mf0\">";
        $html .= '<label for="' . $this->property['label'] . '" class="col-md-2 control-label">' . $this->property['label'] . "</label>\n";
        if (isset($this->property['requiredField'])) $html .= $this->property['requiredField'] . " ";
        if (isset($this->property['extraMsg'])) {
            if (isset($this->property['extraMsgEnabled'])) $this->extraMsgHandler();
            //$html.= "<span id=\"".$this->formElement."_extraMsg\" class=\"help-inline small\"> (".$this->extraMsg.")</span> ";
        }
        $html .= "<div class=\" mediaContent " . $cssClass . "\">\n";
        $html .= $formElement;

        if ($this->model->$key != '') {
            if ($this->property['mediaType'] == 'Img') $html .= "<div class=\"mt10 mr10 mediaBox\"  id=\"box_" . $key . "_" . $this->model->id . "\">
							<img class=\"img-responsive imgEditThumb\" src=\"" . ma_get_image_from_repository($this->model->$key) . "\">
							" . $this->createMediaDeleteBtn($key, $this->model->id) . "</div>\n";
            else  $html .= "<div class=\"mt10 mr10\" id=\"box_" . $key . "_" . $this->model->id . "\">
						<div class=\"btn-group\" role=\"group\" aria-label=\"...\">
						  <button type=\"button\" class=\"btn btn-primary\">" . $this->model->$key . "</button>
						  " . $this->createMediaDeleteBtn($key, $this->model->id) . "</div>
						</div>\n";

        }
        $html .= "</div>";
        $html .= "</div>";
        $html .= '<hr/>';
        return $html;
    }

    function extraMsgHandler()
    {
        return (isset($this->property['extraMsg'])) ? $this->property['extraMsg'] : '';
    }

    /**
     * GET RELATION DATA
     * CAN BE FILTERED
     * @return mixed
     */
    public function getRelation()
    {
        $relationModel = "App\\" . $this->property['model'];
        $model = new  $relationModel;
        $orderField = (isset($this->property['order_field'])) ? $this->property['order_field'] : $this->property['label_key'];
        $order = 'ASC';

        $query = $model::select(); //$relationModel;
        if (isset($model->translatedAttributes)) return $this->getTranslatableRelation();
        else {
            /**  filter  condition */
            if (isset($this->property['filter'])) {
                foreach ($this->property['filter'] as $column => $value) {
                    $query->where($column, '=', $value);
                }
            }
            $relationObj = $query->orderBy($orderField, $order)->get();
            return $relationObj;
        }

    }

    /**
     * GET RELATION DATA
     * FOR TRANSLATABLE TABLE
     * CAN BE FILTERED AN ORDERED
     * @return mixed
     */

    function getTranslatableRelation()
    {
        $relationModel = "App\\" . $this->property['model'];
        $orderField = (isset($this->property['order_field'])) ? $this->property['order_field'] : $this->property['label_key'];
        $order = 'ASC';
        $table = with(new $relationModel)->getTable();
        $translationTable = strtolower(snake_case($this->property['model']));
        $a = (isset($this->property['foreign_key'])) ? $this->property['foreign_key'] : 'id';

        $query = $relationModel::join($translationTable . '_translations as t', 't.' . $translationTable . '_id', '=', $table . '.id')
            ->where('locale', 'it')
            ->groupBy($table . '.id')
            ->with('translations');
        if ($a != 'id') $query->select($table . '.id as id', 't.title as title', $table . '.value as value');
        else $query->select($table . '.id as id', 't.title as title');

        if (isset($this->property['filter'])) {
            foreach ($this->property['filter'] as $column => $value) {
                $query->where($column, '=', $value);
            }
        }
        $relationObj = $query->orderBy($orderField, $order)->get();
        return $relationObj;
    }

    public function getComboRelation($obj, $field, $selItem = '', $selectedArray = '')
    {

        $a = (isset($this->property['foreign_key'])) ? $this->property['foreign_key'] : 'id';
        $b = (isset($this->property['label_key'])) ? $this->property['label_key'] : 'name';
        $isRequired = (isset($this->property['required'])) ? $this->property['required'] : false;
        $nullLabel = (isset($this->property['nullLabel'])) ? $this->property['nullLabel'] : 'Select ' . $this->property['label'];
        $multiple = (isset($this->property['multiple'])) ? 'multiple' : '';

        if ($multiple) $html = "<select data-placeholder=\"Select an option\"  class=\"form-control select2\" id=\"" . $field . "\" name=\"" . $field . "[]\" " . $multiple . ">\n";
        else $html = "<select class=\"form-control\" id=\"" . $field . "\" name=\"" . $field . "\" >\n";
        if ($isRequired == false) $html .= "<option value=\"\">" . $nullLabel . "</option>";

        foreach ($obj as $item) {
            $selected = ($item->$a == $selItem || (is_array($selectedArray) && in_array($item->$a, $selectedArray))) ? 'selected' : '';
            $html .= "<option value=\"" . $item->$a . "\" " . $selected . ">" . $item->$b . "</option>\n";
        }
        $html .= "</select>\n";
        return $html;
    }

    /**
     * @param $key
     * @param $id
     * @return string
     */
    public function createMediaDeleteBtn($key, $id)
    {

        $html = "<a href=\"#\" rel=\"tooltip\" class=\"color-3 ph5\"
				   data-original-title=\"" . trans('admin.message.delete_item') . "\"
				   onclick=\"deleteImages(this)\" id=\"delete_" . $key . "_" . $id . "\"><i class=\"fa fa-trash big\"></i></a>";

        return $html;
    }

    /*********************************  LANGUAGE SECTION HELPER ***************************/

    /**
     * @param $label
     * @param $target
     * @param string $cssClass
     * @return string
     */
    function containerLanguage($label, $target, $cssClass = "")
    {

        $html = "<div class=\"form-group\">";
        $html .= "<h2 class=\"bck-color-2 color-2 pv5 pl15 mf10 pointer " . $cssClass . "\" data-toggle=\"collapse\" href=\"#" . $target . "\" aria-expanded=\"false\" aria-controls=\"collapseExample\"> + " . $label . "</h2>\n";
        $html .= "</div>\n";
        $html .= "<div class=\"clearfix\"></div>\n";
        return $html;
    }
}