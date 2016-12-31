<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * @var array
     */
    protected $fillable  = ['value','key','domain','description'];
    /**
     * @var array
     */
    protected $fieldspec = [];

    /**
     * @return array
     */
    public function getFieldSpec ()
        // set the specifications for this database table
    {
        // build array of field specifications
        $this->fieldspec['id'] = [
            'type'     => 'integer',
            'minvalue' => 0,
            'pkey'     => 'y',
            'required' =>true,
            'label'    => 'id',
            'hidden'   => '1',
            'display'  => '0',
        ];
        $this->fieldspec['domain'] = [
            'type' => 'integer',
            'required' => 0,
            'hidden' => 0,
            'label' => 'Domain',
            'extraMsg' => '',
            'display' => 1,
        ];
        $this->fieldspec['key'] = [
            'type' => 'integer',
            'required' =>true,
            'hidden' => '0',
            'required' =>true,
            'label' => 'Key',
            'extraMsg' => '',
            'display' => '1',
        ];
        $this->fieldspec['value'] = [
            'type' => 'string',
            'required' =>true,
            'hidden' => '0',
            'label' => 'Value',
            'extraMsg' => '',
            'display' => '1',
        ];
        $this->fieldspec['description'] = [
            'type' => 'text',
            'size' => 600,
            'h' => 300,
            'required' => 'n',
            'hidden' => 0,
            'label' => 'Description',
            'extraMsg' => '',
            'cssClass' => '',
            'display' => 1,
        ];
        return $this->fieldspec;
    }
}
