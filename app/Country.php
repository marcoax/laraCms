<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App
 */


class Country extends Model
{



    /**
     * @var array
     */
    protected $fillable  = ['name','iso_code','id_continent', 'eu','vat','is_active','created_by','updated_by'];
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

        $this->fieldspec['name'] = [
            'type' => 'string',
            'required' =>true,
            'hidden' => '0',
            'required' =>true,
            'label' => 'Name',
            'extraMsg' => '',
            'display' => '1',
        ];

        $this->fieldspec['iso_code'] = [
            'type' => 'string',
            'required' =>true,
            'hidden' => '0',
            'label' => 'Iso code',
            'extraMsg' => '',
            'display' => '1',
        ];
        $this->fieldspec['id_continent'] = [
            'type' => 'relation',
            'model' => 'article',
            'foreign_key' => 'id',
            'label_key' => 'title',
            'required' => false,
            'label' => 'Continet',
            'hidden' => '1',
            'display' => '0',
        ];

        $this->fieldspec['eu'] = [
            'type' => 'boolean',
            'required' =>true,
            'hidden' => '0',
            'label' => "Eu",
            'display' => '1'
        ];
        $this->fieldspec['vat'] = [
            'type' => 'integer',
            'required' => false,
            'label' => 'Vat %',
            'hidden' => '0',
            'display' => '1',
        ];

        $this->fieldspec['is_active'] = [
            'type' => 'boolean',
            'required' => false,
            'hidden' => '0',
            'label' => trans('admin.label.active'),
            'display' => '1'
        ];
        return $this->fieldspec;
    }
}
