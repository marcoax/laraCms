<div class="sub-navbar">
	<div class="subnavs bottomonly-shadow pb25" id="toolbar_top">

        <div class="pull-right">
            <div class="btn-group">
                @if($view_name=='admin-edit')
                    <a  class="btn btn-default btn-lg "
                        href="#"
                        onclick="document.getElementById('edit_form').submit()"
                        title="{!! trans('admin.label.save')!!}"
                        data-toggle="tooltip"
                        data-placement="bottom" rel="tooltip">
                        <i class="fa fa-save  color-main"></i>
                    </a>
                @endif
                @if ($view_name=='admin-list' && isset( $pageConfig['export_csv']) && $pageConfig['export_csv']==1)
                    <a class="btn btn-default btn-lg"
                       href="{{ ma_get_admin_export_url($pageConfig['model']) }}"
                       title="{!! trans('admin.message.export_to_csv')!!}"
                       target="_new"
                       data-toggle="tooltip"
                       data-placement="bottom" rel="tooltip">
                        <i class="fa fa-file-excel-o  color-main lg"></i>
                    </a>
                @endif
                @if ($pageConfig['create']==1)
                    <a class="btn btn-default btn-lg"
                       href="{{ ma_get_admin_create_url($pageConfig['model']) }}"
                       title="{!! trans('admin.message.create')!!}"
                       data-toggle="tooltip"
                       data-placement="bottom" rel="tooltip">
                        <i class="fa fa-plus  color-main lg"></i>
                    </a>
                @endif

            </div>
        </div>
		<div id="list-action-bar" class="pull-left" style="display:none">
            <div class="btn-group">
                <button id="toolbar_deleteButtonHandler" class="btn btn-default btn-danger btn-lg"  data-role="deleteAll"
                        rel="tooltip"
                        data-placement="bottom"
                        data-toggle="tooltip"
                        data-placement="left"
                        title="{!! trans('admin.message.delete_items')!!}"

                        data-original-title="{!! trans('admin.message.delete_items')!!}">
                    <i class="fa fa-trash  "></i>
                </button>
                <button id="toolbar_editButtonHandler" class="btn btn-default btn-lg "
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="{!! trans('admin.message.edit_items')!!}">
                    <i class="fa fa-edit"></i>
                </button>
            </div>
		</div>
	</div>
</div>