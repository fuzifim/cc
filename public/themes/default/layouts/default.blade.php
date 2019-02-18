<!DOCTYPE html>
<html>
    <head>
        {!! meta_init() !!}
		@if($channel['info']->service_attribute_id!=1 && $channel['info']->channel_date_end<\Carbon\Carbon::now()->format('Y-m-d H:i:s'))
			{!! Theme::partial('siteExpires') !!}
		@elseif($channel['info']->channel_status!='delete')
        {!! Theme::partial('header') !!}
        {!! Theme::content() !!}
        {!! Theme::partial('footer') !!}
            @scripts()
            @scripts('footer')
		@else
			{!! Theme::partial('siteDelete') !!}
		@endif
    </body>
</html>
