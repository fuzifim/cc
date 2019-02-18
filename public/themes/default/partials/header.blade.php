        <title>{!! Theme::get('title') !!}</title>
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
		<meta name="robots" content="index,follow,noodp" />
		@if(!empty(Theme::get('canonical')))<link rel="canonical" href="{!! Theme::get('canonical') !!}" />@endif 
		@if(!empty(Theme::get('canonicalamp')))<link rel="amphtml" href="{!! Theme::get('canonicalamp') !!}">@endif 
		<meta name="author" content="{{$channel['info']->domain}}" />
		<link rel="icon" href="@if(!empty($channel['logo']->url_small)){{$channel['logo']->url_small}}@else {!!Theme::asset()->url('img/favicon.png')!!}?v=3 @endif" />
		<meta name="_token" content="{{ csrf_token() }}">
		<meta name="copyright" content="Copyright &copy {{date('Y')}} {{$channel['info']->domain}}.　All Right Reserved." />
		<meta http-equiv="Content-Language" content="{{Lang::locale()}}" />
		<meta name="robots" content="notranslate"/>
		<meta name="distribution" content="Global" />
		<meta name="RATING" content="GENERAL" />
		<meta property="og:locale" content="{{Lang::locale()}}">
		<meta property="og:title" content="{!! Theme::get('title') !!}">
		<meta property="og:description" content="{!! Theme::get('description') !!}">
		<meta property="og:type" content="{!! Theme::get('type') !!}">
		<meta property="og:url" content="{!! Theme::get('url') !!}">
		<meta property="og:image" content="{!! Theme::get('image') !!}" />
		<meta property="og:image:width" content="720" />
		<meta property="og:image:height" content="480" />
		@if(Theme::get('video'))<meta property="og:video" content="{!! Theme::get('video') !!}" />@endif
        {!! Theme::asset()->styles() !!}
		<link media="all" type="text/css" rel="stylesheet" href="{!!Theme::asset()->url('css/style.default.css')!!}?v=58">
		<style>
			@if(!empty($channel['color']->channel_menu))
				section{background:{{$channel['color']->channel_menu}}; }
				.nav-bracket > li > a{color:{{$channel['color']->channel_menu_text}}; }
				.nav-bracket .children > li > a{color:{{$channel['color']->channel_menu_text}}; }
				.sidebartitle{color:{{$channel['color']->channel_menu_text}}; }
				.contentpanel .panel-primary .panel-heading{background-color:{{$channel['color']->channel_menu}} !important;border-color:{{$channel['color']->channel_menu}} !important;color:{{$channel['color']->channel_menu_text}} !important;}
				.contentpanel .panel-primary .heading-program .categoryParentTitle a{color:{{$channel['color']->channel_menu_text}} !important;}
				.contentpanel .panel-primary .heading-program .dropdown-toggle{color:{{$channel['color']->channel_menu_text}} !important;}
			@else
				.contentpanel .panel-primary{border-color:#d82731 !important;}
				.contentpanel .panel-primary .panel-heading{background-color:#d82731 !important;border-color:#d82731 !important;}
				.contentpanel .panel-primary .heading-program .categoryParentTitle a{color:#fff !important;}
				.contentpanel .panel-primary .heading-program .dropdown-toggle{color:#fff !important;}
			@endif
			@if(!empty($channel['color']->channel_title))
				.pageheader h1{color:{{$channel['color']->channel_title_text}};}
				.pageheader{background:{{$channel['color']->channel_title}} !important;}
			@endif
			@if(!empty($channel['color']->channel_footer))
				.siteFooter{background:{{$channel['color']->channel_footer}} !important; color:{{$channel['color']->channel_footer_text}}; }
				.siteFooter h3 a{color:{{$channel['color']->channel_footer_text}};}
			@endif
			@if(!empty($channel['info']->channelAttributeBackground->media->media_url))
				body{background: url({{$channel['info']->channelAttributeBackground->media->media_url}}) !important; background-attachment: fixed !important; background-position:center top; background-size:cover; background-repeat:no-repeat;}
			@endif
		</style>
		@if(!empty($channel['color']->headerScript)){!!$channel['color']->headerScript!!}@endif 
    </head>
    <body class="fixed">