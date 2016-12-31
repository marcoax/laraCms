<?php
namespace App\LaraCms\Website\Decorator;
Use App;
Use App\Social;
use Carbon\Carbon;

/**
 * Class HtmlSocial
 * @package App\LaraCms\Website\Decorator
 */
class HtmlSocial extends laraCmsDecorator
{

    /**
     * @var
     */
    protected $html;
    /**
     * @var
     */
    protected $model;
    /**
     * @var
     */
    protected $property;

    /**
     * @return $this
     */
    public function get()
    {
        $this->initHtml();
        $this->createSocialBar();
        return $this;
    }

    /**
     * init
     */
    protected function initHtml()
    {
        $this->html = "";
        $this->model = new App\Social;
    }

    /**
     * create Social Html
     */
    function createSocialBar()
    {
        foreach ($this->model->whereIsActive(1)->get() as $item) {
            $this->html .= "<a href=\"" . $item->link . "\" target=\"_new\">\n";
                $this->html .= "<span class=\"fa-stack fa-lg transitioned\">\n";
                    $this->html .= "<i class=\"fa fa-circle fa-stack-2x color-6 transitioned\"></i>\n";
                    $this->html .= "<i class=\"fa " . $item->icon . " fa-stack-1x fa-inverse color-2 transitioned\"></i>\n";
                $this->html .= "</span>\n";
            $this->html .= "</a>\n";
        }
    }
}