<?
if(!empty($channel['seo']->value)){
	$seoJson=json_decode($channel['seo']->value);
	if(!empty($seoJson->metaTitle)){
		$metaTitle=$seoJson->metaTitle;
	}else{
		$metaTitle=$channel['info']->channel_name;
	}
	if(!empty($seoJson->metaDescription)){
		$metaDescription=$seoJson->metaDescription;
	}else{
		$metaDescription=$channel['info']->channel_description;
	}
}else{
	$metaTitle=$channel['info']->channel_name;
	$metaDescription=$channel['info']->channel_description;
}
Theme::setTitle(html_entity_decode($metaTitle));
if(!empty($channel['info']->channel_keywords)){
	Theme::setKeywords($channel['info']->channel_keywords);
}else{
	Theme::setKeywords(html_entity_decode($metaTitle));
}
Theme::setDescription(mb_substr(strip_tags(html_entity_decode($metaDescription),""), 0, 255));
Theme::setCanonical(route("index",$channel["info"]->domain));
Theme::asset()->container('footer')->usePath()->add('jquery', 'js/jquery-1.11.1.min.js');
Theme::asset()->container('footer')->usePath()->add('jquery-migrate', 'js/jquery-migrate-1.2.1.min.js');
Theme::asset()->container('footer')->usePath()->add('bootstrap', 'js/bootstrap.min.js');
Theme::asset()->container('footer')->usePath()->add('modernizr', 'js/modernizr.min.js');
Theme::asset()->container('footer')->usePath()->add('toggles', 'js/toggles.min.js');
Theme::asset()->container('footer')->usePath()->add('jquery.cookies', 'js/jquery.cookies.js');
Theme::asset()->container('footer')->usePath()->add('jquery.gritter.min', 'js/jquery.gritter.min.js');
Theme::asset()->container('footer')->usePath()->add('jquery.validate.min', 'js/jquery.validate.min.js');
Theme::asset()->container('footer')->usePath()->add('swiper.min', 'library/swiper/js/swiper.min.js');
?>
@if(Auth::check())

@endif
<section>
{!!Theme::partial('leftpanel', array('title' => 'Header'))!!}
<div class="mainpanel">
{!!Theme::partial('headerbar', array('title' => 'Header'))!!}
	<div class="pageheader hidden-xs">
		<div class="groupChannelName">
			<div id="preloaderInBox">
				<div id="status"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<div class="channelNameText">
				<h1>
					{!!$channel['info']->channel_name!!}
					@if($channel['security']==true)<span><a href="" data-name="{!!$channel['info']->channel_name!!}" class="btnChannelNameEdit"><i class="fa fa-pencil"></i> sửa</a></span>@endif
				</h1>
				<span class="channelDescriptionText">{!!html_entity_decode($channel['info']->channel_description)!!}</span>
				<input type="hidden" class="channelKeywordsInput" value="{!!$channel['info']->channel_keywords!!}">
			</div>
			<div class="changeChannelNameText"></div>
		</div>
	</div>
	<div class="contentpanel">
		<div class="panel panel-dark panel-alt timeline-post">
			<div class="panel-body">
				<textarea placeholder="@lang('main.what_do_you_provide')..." class="form-control"></textarea>
			</div><!-- panel-body -->
			<div class="panel-footer">
				<div class="timeline-btns pull-left">
					<a href="" class="tooltips" data-toggle="tooltip" title="" data-original-title="Add Photo"><i class="glyphicon glyphicon-picture"></i></a>
					<a href="" class="tooltips" data-toggle="tooltip" title="" data-original-title="Add Video"><i class="glyphicon glyphicon-facetime-video"></i></a>
					<a href="" class="tooltips" data-toggle="tooltip" title="" data-original-title="Check In"><i class="glyphicon glyphicon-map-marker"></i></a>
					<a href="" class="tooltips" data-toggle="tooltip" title="" data-original-title="Tag User"><i class="glyphicon glyphicon-user"></i></a>
				</div><!--timeline-btns -->
				<button class="btn btn-sm btn-primary pull-right">@lang('main.share')</button>
			</div><!-- panel-footer -->
		</div>
	</div>
</div>
</section>