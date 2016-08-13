<?php

/***** SANITIZE PARAMETERS *****/
/**
 * @param $parameter
 * @return string
 */
function ma_sanitizeParameter($parameter)
{
    return htmlspecialchars($parameter, ENT_QUOTES, 'utf-8');
}
/*********************  doc **********************/
/**
 * @param $doc
 * @return string
 */
function ma_get_doc_from_repository($doc)
{
    $path = config('laraCms.admin.path.doc_repository');
    return asset($path . $doc);
}

/********      image    *****************/
/**
 * @param $img
 * @return string
 */
function ma_get_image_from_repository($img)
{

    $path = config('laraCms.admin.path.img_repository');
    return asset($path . $img);
}

/**
 * @param $img
 * @return string
 */
function ma_get_image_path_from_repository($img)
{

    $path = config('laraCms.admin.path.img_repository');
    return  base_path($path . $img);
}

/**
 * @param $asset
 * @param $w
 * @param $h
 * @param string $type
 * @return null|string
 */
function ma_get_image_on_the_fly($asset, $w, $h, $type = 'jpg')
{

    if ($asset != '' && file_exists(ma_get_image_path_from_repository($asset))) {
        $img = Image::make(ma_get_image_from_repository($asset))->fit($w, $h)->encode($type);
        return 'data:image/' . $type . ';base64,' . base64_encode($img);
    } else return null;
}

/***
 * @param $asset
 * @param $w
 * @param $h
 * @param string $type
 * @return null|string
 */
function ma_get_image_on_the_fly_cached($asset, $w, $h, $type = 'jpg')
{
    if ($asset != '' && file_exists(ma_get_image_path_from_repository($asset))) {
        $dataImage = array();
        $dataImage['asset'] = $asset;
        $dataImage['w'] = $w;
        $dataImage['h'] = $h;
        $dataImage['type'] = $type;

        $img = Image::cache(function ($image) use ($dataImage) {
            $image->make(ma_get_image_from_repository($dataImage['asset']))->fit($dataImage['w'], $dataImage['h'])->encode($dataImage['type']);
        });
        return 'data:image/' . $type . ';base64,' . base64_encode($img);

    } else return null;
}


/*******************  admin   ***************/
/**
 * @param $model
 * @return mixed
 */
function ma_get_admin_list_url($model)
{
    $path = '/admin/list';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName));
}

/**
 * @param $model
 * @return mixed
 */
function ma_get_admin_create_url($model)
{
    $path = '/admin/create';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName));
}

/**
 * @param $model
 * @return mixed
 */
function ma_get_admin_edit_url($model)
{
    $path = '/admin/edit';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}

/**
 * @param $model
 * @return mixed
 */
function ma_get_admin_editmodal_url($model)
{
    $path = '/admin/editmodal';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}

/**
 * @param $model
 * @return mixed
 */
function ma_get_admin_delete_url($model)
{
    $path = '/admin/delete';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}

/**
 * @param $model
 * @return mixed
 */
function ma_get_admin_preview_url($model)
{

    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    $resourcePath = ($modelName != 'articles') ? str_plural($modelName) . '/' . $model->slug : $model->slug;
    $path = LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), URL::to($resourcePath));
    return URL::to($path);
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 *
 */
if (!function_exists('flash')) {
    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @return \Laracasts\Flash\FlashNotifier
     */
    function flash($message = null)
    {
        $notifier = app('flash');
        if (!is_null($message)) {
            return $notifier->info($message);
        }
        return $notifier;
    }
}