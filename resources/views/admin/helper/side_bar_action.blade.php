<div class="boxContainer">
	<h3>{!! trans('admin.label.action')!!}</h3>
	<ul class="nav nav-list">
		@if ( config('admin.list.section.articles.create')  == 1)
			<li>
				<a class="nero" href="{{ ma_get_admin_create_url($article)}}"> <i class="fa fa-plus"></i> {!! trans('admin.message.add_new_item')!!}</a>
			</li>
		@endif
		<li>
			<a href="{{ ma_get_admin_list_url($article)  }}" class="nero"> <i class="fa fa-list"></i> {!! trans('admin.message.back_to_list')!!}</a>
		</li>
		@if ( config('admin.list.section.articles.preview')  == 1)
			<li>
				<a href="http://localhost/macms/it/" class="nero" target="_new"> <i class="fa fa-eye"></i> {!! trans('admin.message.view_page')!!}</a>
			</li>
		@endif
	</ul>
</div>
