<?php
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/***** SANITIZE PARAMETERS *****/
function sanitizeParameter($parameter)
{
    return htmlspecialchars($parameter, ENT_QUOTES, 'utf-8');
}

/*******************     DOC    *****************/
function ma_get_doc_from_repository($doc)
{
    $path = config('laraCms.admin.path.doc_repository');
    return asset($path . $doc);
}

/*******************      IMAGES      *****************/

/**
 * @param $img
 * @param bool $absolute
 * @return string
 */
function ma_get_image_path_from_repository($img,$absolute=true)
{
    $path = config('laraCms.admin.path.img_repository');
	if (file_exists($path.$img))
  		return ($absolute == true ) ? asset($path.$img) : $path.$img;
	else
		return ($absolute == true ) ? asset($path.'placeholder.png') : $path.'placeholder.png';
}

/**
 * @param $img
 * @param bool $absolute
 * @return string
 */
function ma_get_image_from_repository($img, $absolute = true)
{
    return ma_get_image_path_from_repository($img, $absolute);
}

/**
 *
 * generate img on the  fly
 * @param $asset
 * @param $w
 * @param $h
 * @param string $type
 * @return null|string
 */
function ma_get_image_on_the_fly($asset, $w, $h, $type = 'jpg')
{

    if ($asset != '') {
        $img = Image::make(ma_get_image_from_repository($asset, false))->fit($w, $h)->encode($type);
        return 'data:image/' . $type . ';base64,' . base64_encode($img);
    } else return null;
}

/**
 * get img  on  the  fly cached
 * @param $asset
 * @param $w
 * @param $h
 * @param string $type
 * @param int $fit
 * @return string
 */
function ma_get_image_on_the_fly_cached($asset, $w, $h, $type = 'jpg', $fit = 1)
{

    if (file_exists(ma_get_image_path_from_repository($asset))) {
        $dataImage = array();
        $dataImage['asset'] = $asset;

        $dataImage['w'] = $w;
        $dataImage['h'] = $h;
        $dataImage['type'] = $type;
        $dataImage['fit'] = $fit;
        $img = Image::cache(function ($image) use ($dataImage) {
            $image->make(ma_get_image_from_repository($dataImage['asset'], false));

            if ($dataImage['fit'] == 1) {
                $image->resize($dataImage['w'], $dataImage['h']);
            } else {
                $image->fit($dataImage['w'], $dataImage['h']);
            }

            $image->encode($dataImage['type']);
        });
        return 'data:image/' . $type . ';base64,' . base64_encode($img);
    } else return ma_get_image_path_from_repository($asset);
}
/*******************     USER UPLOAD    *****************/
function ma_get_upload_from_repository($doc)
{
    $path = config('laraCms.admin.path.user_upload');
    return asset($path . $doc);
}

/*******************        ADMIN       ****************/
function ma_get_admin_list_url($model)
{
    $path = '/admin/list';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName));
}

function ma_get_admin_create_url($model)
{
    $path = '/admin/create';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName));
}

function ma_get_admin_edit_url($model)
{
    $path = '/admin/edit';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}
function ma_get_admin_view_url($model)
{
    $path = '/admin/view';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}

function ma_get_admin_editmodal_url($model)
{
    $path = '/admin/editmodal';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}

function ma_get_admin_delete_url($model)
{
    $path = '/admin/delete';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName) . '/' . $model->id);
}

function ma_get_admin_preview_url($model)
{
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    $resourcePath = ($modelName != 'articles') ? str_plural($modelName) . '/' . $model->slug : $model->slug;
    $path = LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), URL::to($resourcePath));
    return URL::to($path);
}


function ma_get_admin_export_url($model)
{

    $path = '/admin/exportlist';
    $modelName = (!is_object($model)) ? strtolower($model) : strtolower(str_plural(class_basename($model)));
    return URL::to($path . '/' . str_plural($modelName));
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

if (!function_exists('flash')) {
    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     *
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

/**
 * This method is used to pull a model out of the ioc container given its name as string.
 *
 * @param $string
 * @param string $namespace
 *
 * @return \Illuminate\Foundation\Application|mixed
 */
function getModelFromString($string, $namespace = "\\App\\")
{
    return app($namespace . ucfirst($string));
}

/**
 * This method is used to get the client's IP address
 * when the site is accessed through a proxy.
 *
 * @param Request $request
 *
 * @return string
 */
function getClientIPBehindProxy(Request $request)
{
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && (trim($_SERVER['HTTP_X_FORWARDED_FOR']) !== ''))
        return trim($_SERVER['HTTP_X_FORWARDED_FOR']);

    return $request->getClientIp();
}

/**
 * GF_ma helper to retrive
 * the real locale url
 * @return string
 */
function  ma_getRealLocale() {

    return (LaravelLocalization::getCurrentLocale()==LaravelLocalization::getDefaultLocale())?'':'/'.LaravelLocalization::getCurrentLocale();

}

function  ma_fullLocaleUrl($url) {

    return ma_getRealLocale().'/'.$url;
}

