<?php
	Theme::setTitle(config('app.name')); 
	Theme::setDescription('Cung Cấp đến mọi người ⭐ ⭐ ⭐ ⭐ ⭐'); 
	Theme::setImage('https://'.config('app.url').'/cungcap.png'); 
?>
@partial('header')
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<div class="container">
	<div class="form-group mt-2 d-none d-sm-block">
		<strong class="text-light">Tìm: </strong>
		@foreach($getNote as $note)
			<span class="badge badge-light"><a href="{{route('show.category',array(config('app.url'),str_replace(' ','+',$note['title'])))}}"><span class="">{!!$note['title']!!} </span></a> </span>
		@endforeach
	</div>
	<div class="row">
		<div class="col-12 col-md-8">
			@if(count($postNew))
				@foreach($postNew as $noteRelated)
				<div class="card form-group">
					<div class="card-body p-2">
						@if(!empty($noteRelated['media']) && count($noteRelated['media']) && !empty($noteRelated['media'][0]['url_xs']))
							<a class="image" href="{{route('post.show',array(config('app.url'),$noteRelated['_id'],str_slug($noteRelated['title'], '-')))}}">
								<img src="{{$noteRelated['media'][0]['url_xs']}}" class="float-left mr-2 lazy img-thumbnail" width="150" alt="{{$noteRelated['title']}}" title="{{$noteRelated['title']}}">
							</a>
						@endif
						<p><strong><a class="title" href="{{route('post.show',array(config('app.url'),$noteRelated['_id'],str_slug($noteRelated['title'], '-')))}}">{{$noteRelated['title']}}</a></strong></p>
						<p><small class="text-muted">{{$noteRelated['view']}} view</small> - <small>{{AppHelper::instance()->time_request(date("Y-m-d H:i:s", strtotime($noteRelated['updated_at']->toDateTime()->format(DATE_RSS).' UTC')))}}</small></p>
					</div>
				</div>
				@endforeach
			@endif
			<div class="form-group">
				{!! html_entity_decode($postNew->links()) !!}
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<div class="alert alert-info p-2">
					<strong>Cung Cấp đến mọi người ⭐ ⭐ ⭐ ⭐ ⭐</strong> 
					<p>Đăng tin lên Cung Cấp để cung cấp sản phẩm, dịch vụ kinh doanh đến mọi người hoàn toàn miễn phí! </p>
				</div>
				<div class="btn-group d-flex" role="group">
					<a class="btn btn-success w-100" href="{{route('post.add',config('app.url'))}}" rel="nofollow"><h4>Đăng tin miễn phí</h4></a>
				</div>
			</div>
			@if(config('app.env')!=='local')
				@section('adsense_1')
			@endif
		</div>
	</div>
</div> 
@partial('footer')