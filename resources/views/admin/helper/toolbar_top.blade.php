<div class="sub-navbar">
	<div class="subnavs bottomonly-shadow pb25" id="toolbar_top">

        <div class="pull-right">
            <div class="btn-group">
                <a  class="btn btn-default btn-lg "
                    href="#"
                    onclick="document.getElementById('edit_form').submit()"
                    data-original-title="{!! trans('admin.label.save')!!}"
                    data-placement="bottom" rel="tooltip">
                    <i class="fa fa-save  color-main"></i>
                </a>
                <a class="btn btn-default btn-lg"
                    href="{{ URL::to('/admin/create/'.strtolower(str_plural($pageConfig['model'])) ) }}"
                    data-original-title="{!! trans('admin.message.create')!!}"
                    data-placement="bottom" rel="tooltip">
                    <i class="fa fa-plus  color-main lg"></i>
                </a>
            </div>
        </div>
		<div id="list-action-bar" class="pull-left" style="display:none">
            <div class="btn-group">
                <button id="toolbar_deleteButtonHandler" class="btn btn-default btn-danger btn-lg"  data-role="deleteAll"
                    rel="tooltip" data-placement="bottom" data-original-title="{!! trans('admin.message.delete_items')!!}">
                    <i class="fa fa-trash  "></i>
                </button>
                <button id="toolbar_editButtonHandler" class="btn btn-default btn-lg "
                    rel="tooltip" data-placement="bottom" data-original-title="{!! trans('admin.message.edit_items')!!}">
                    <i class="fa fa-edit"></i>
                </button>
            </div>
		</div>
	</div>
</div>