<?php namespace App\LaraCms\Searchable;

use App\Http\Requests;
Use Form;
Use App;

/**
 * GF_ma
 * Class SearchableTrait
 * @package App\LaraCms\Searchable
 */
trait SearchableTrait
{

    protected $table;
    protected $translatableTable;

    public static function bootSearchableTrait()
    {
        static::created(function ($item) {
            // Index the itemcompo
        });
    }

    /**
     *  GF_ma search handler
     *
     * @param $objBuilder: The QueryBuilder.
     */
    public function searchFilter($objBuilder)
    {
        if (isset($this->config['field_searcheable']) && $this->request->all() != '') {
            foreach ($this->config['field_searcheable'] as $key => $value) {
                if ($this->request->has($key)) {
                    $curValue = $this->request->$key;
                    if ($this->isTranslatableField($key)) {
                        $objBuilder->whereTranslationLike($key, "%" . $curValue . "%");
                    } else {
                        if ($value['type'] == 'relation') {

                            $objBuilder->whereHas($value['relation'], function($query) use($value, $curValue) {
                                $query->where((isset($value['key']) ? $value['key'] : 'id'), $curValue);
                            });
                        }
                        else
                            $objBuilder->where($key, 'like', "%" . $curValue . "%");
                    }
                }
            }
        }
    }

    public function setOrderBy()
    {
        $sort           = (isset($this->config['orderBy'])) ? $this->config['orderBy'] : 'id';
        $sortType       = (isset($this->config['orderType'])) ? $this->config['orderType'] : 'asc';
        $this->sort     = ($this->request->has('orderBy') ) ? $this->request->orderBy : $sort ;
        $this->sortType = ($this->request->has('orderType') ) ? $this->request->orderType :  $sortType ;
    }

    /**
     *  GF_ma   check is  the  field is translatable
     * @param $key
     * @return bool
     */
    protected function isTranslatableField( $key )
    {
        if( property_exists($this->model,'translatedAttributes') && in_array($key,$this->model->translatedAttributes)  ) {

            return  true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getMainTable()
    {
        return $this->model->getTable();
    }

    /**
     * @return mixed
     */
    public function getTranslatableTable()
    {
        return strtolower(snake_case( $this->config['model'] ));
    }

    /**
     * @param mixed $translatableTable
     */
    public function setTranslatableTable($translatableTable)
    {
        $this->translatableTable = $translatableTable;
    }

    /**
     * @param $model
     *
     * @return $this
     */
    public function setCurModel($model)
    {
        $this->model = $model;
        return $this;
    }
}
