<?
Theme::setTitle('Danh sách video'); 
Theme::setSearch('video'); 
Theme::setType('website'); 
Theme::setCanonical(route('video.list',config('app.url'))); 
$string='<script type="application/ld+json">
		{
		"@context" : "http://schema.org",
		"@type" : "WebSite",
		"name" : "Danh sách video",
		"alternateName" : "",
		"dateModified": "'.date('Y-m-d\TH:i:sP', strtotime(\Carbon\Carbon::now())).'",
		"url" : "'.route('video.list',config('app.url')).'"
		}
		</script>
	'; 
Theme::set('appendHeader', $string);
?>
@partial('header') 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<div class="container">
	<div class="form-group">
		<h1 class="text-light">Danh sách video</h1> 
	</div>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb mb5" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemscope itemtype="http://schema.org/Thing"
   itemprop="item" href="{{route('index',config('app.url'))}}"><span class="" itemprop="name">Cung Cấp</span></a></li> 
		</ol> 
	</nav>
	<div class="form-group">
		<div class="row">
			<div class="col-md-8">
				@if(count($getNote)>0) 
					<div class="form-group">
					@foreach($getNote as $item)
						<div class="list-group-item">
							<div class="row row-pad-5">
								<div class="col-5 col-md-5">
									<a class="image" href="{{route('video.show',array(config('app.url'),$item['_id'],str_slug($item['title'], '-')))}}">
										<img src="https:@if(!empty($item['thumb'])){{$item['thumb']}}@elseif(!empty($item['image'])){{$item['image']}}@endif" class="img-fluid lazy" alt="{!!$item['title']!!}" title="{!!$item['title']!!}">
									</a>
								</div>
								<div class="col-7 col-md-7">
									<strong><a class="title" href="{{route('video.show',array(config('app.url'),$item['_id'],str_slug($item['title'], '-')))}}">{!!$item['title']!!}</a></strong>
									<?
										$sec=$item['updated_at']->toDateTime()->format(DATE_RSS); 
										$time = strtotime($sec.' UTC');
										$dateInLocal = date("Y-m-d H:i:s", $time);
									?>
									<p><small>{{$dateInLocal}}</small></p>
								</div>
							</div>
						</div>
					@endforeach 
					</div>
					<div class="form-group">
						{!! html_entity_decode($getNote->links()) !!}
					</div>
				@endif
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
</div> 
@partial('footer') 
<?
	$dependencies = array(); 
	Theme::asset()->writeScript('loadLazy',' 
		$(".siteLink").click(function(){
			window.open(jQuery.parseJSON($(this).attr("data-url")),"_blank");
			return false; 
		}); 
		$(".showImageLink").click(function(){
			$("#showImageLarge").attr("src",$(this).attr("data-image")); 
			$("#showImageLarge").attr("title",$(this).attr("data-title")); 
			$("#showImageLarge").attr("alt",$(this).attr("data-title")); 
			$("#showImageLargeLink").attr("href",$(this).attr("data-url")); 
			$("#showImageLargeLink").text($(this).attr("data-title")); 
			return false; 
		});
	', $dependencies);
?>