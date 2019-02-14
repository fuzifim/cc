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
/*if(count($channel['info']->channelAttributeBanner)>0 && !empty($channel['info']->channelAttributeBanner[0]->media->media_name)){
	Theme::setImage(config('app.link_media').$channel['info']->channelAttributeBanner[0]->media->media_path.$channel['info']->channelAttributeBanner[0]->media->media_name);
}else{
	Theme::setImage('http://'.$channel["domainPrimary"].Theme::asset()->url('img/cungcap.jpg'));
}*/
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
@if($channel['security']==true)
    <?php
    Theme::asset()->add('summernote', 'assets/js/summernote/dist/summernote.css');
    Theme::asset()->usePath()->add('jquery.tagsinput', 'css/jquery.tagsinput.css');
    Theme::asset()->container('footer')->add('summernote', 'assets/js/summernote/dist/summernote.js');
    Theme::asset()->container('footer')->add('summernote-vi-VN', 'assets/js/summernote/lang/summernote-vi-VN.js');
    Theme::asset()->container('footer')->usePath()->add('jquery.tagsinput.min', 'js/jquery.tagsinput.min.js');
    ?>

	<?
		$dependencies = array();
		Theme::asset()->writeScript('changeChannel','
			jQuery(document).ready(function(){
				"use strict";
				$(".groupChannelName").on("click",".btnChannelNameEdit",function() {
					var channelNameText=$(this).parent().closest(".groupChannelName").find(".channelNameText");
					var channelDescriptionText=$(this).parent().closest(".groupChannelName").find(".channelDescriptionText");
					var channelKeywordsInput=$(this).parent().closest(".groupChannelName").find(".channelKeywordsInput");
					var changeChannelNameText=$(this).parent().closest(".groupChannelName").find(".changeChannelNameText");
					var channelName=$(this).attr("data-name");
					var channelDescription=channelDescriptionText.html();
					var channelKeywords=channelKeywordsInput.val();
					channelNameText.hide();
					changeChannelNameText.show();
					changeChannelNameText.append("<form id=\"changeChannelName\">"
						+"<div class=\"form-group\">"
							+"<input type=\"phone\" style=\"font-size:18px;\" name=\"channelName\" value=\""+channelName+"\" class=\"form-control\" placeholder=\"Nhập tên công ty, cửa hàng, tên website...\" required />"
							+"<label class=\"error\" for=\"channelName\"></label>"
						+"</div>"
						+"<div class=\"form-group\">"
							+"<textarea name=\"channelDescription\" id=\"summernote\" class=\"form-control\" placeholder=\"Mô tả kênh website...\" required >"+channelDescription+"</textarea>"
							+"<label class=\"error\" for=\"channelDescription\"></label>"
						+"</div>"
						+"<div class=\"form-group\">"
							+"<input name=\"channelKeywords\" id=\"channelKeywords\" class=\"form-control\" value=\""+channelKeywords+"\" placeholder=\"Từ khóa...\" >"
							+"<label class=\"error\" for=\"channelKeywords\"></label>"
						+"</div>"
						+"<div class=\"form-group\">"
							+"<button type=\"submit\" class=\"btn btn-xs btn-primary btnSaveChannelName\" data-id=\"\"><i class=\"fa fa-check\"></i> Lưu</button> "
							+"<button type=\"button\" class=\"btn btn-xs btn-default btnCancelChannelname\">Hủy</button>"
						+"</div>"
						+"</form>");
					jQuery(".groupChannelName #changeChannelName #channelKeywords").tagsInput({
						placeholderColor:"#999",
						width:"auto",
						height:"auto",
						"defaultText":"thêm từ..."
					});
					var $validator = jQuery(".groupChannelName #changeChannelName").validate({
						highlight: function(element) {
						  jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function(element) {
						  jQuery(element).closest(".form-group").removeClass("has-error");
						}
					});
					$(".groupChannelName").on("click",".btnSaveChannelName",function() {
						var $valid = jQuery(".groupChannelName #changeChannelName").valid();
						if(!$valid) {
							$validator.focusInvalid();
							return false;
						}else{
							$(".groupChannelName #preloaderInBox").css("display", "block");
							var formData = new FormData();
							formData.append("channelName", $(".groupChannelName #changeChannelName input[name=channelName]").val());
							formData.append("channelDescription", $(".groupChannelName #changeChannelName textarea[name=channelDescription]").val());
							formData.append("channelKeywords", $(".groupChannelName #changeChannelName input[name=channelKeywords]").val());
							$.ajax({
								url: "",
								headers: {"X-CSRF-TOKEN": $("meta[name=_token]").attr("content")},
								type: "post",
								cache: false,
								contentType: false,
								processData: false,
								data: formData,
								dataType:"json",
								success:function(result){
									$(".groupChannelName #preloaderInBox").css("display", "none");
									if(result.success==true){
										jQuery.gritter.add({
											title: "Thông báo!",
											text: result.msg,
											class_name: "growl-success",
											sticky: false,
											time: ""
										});
										location.reload();
									}else{
										jQuery.gritter.add({
											title: "Thông báo!",
											text: result.msg,
											class_name: "growl-danger",
											sticky: false,
											time: ""
										});
									}
								},
								error: function(result) {
								}
							});
						}
						return false;
					});
					$(".groupChannelName #summernote").summernote(
						{
							popover: {
								image: [
									["custom", ["imageAttributes"]],
									["imagesize", ["imageSize100", "imageSize50", "imageSize25"]],
									["float", ["floatLeft", "floatRight", "floatNone"]],
									["remove", ["removeMedia"]]
								],
							},
							lang: "vi-VN",
							imageAttributes:{
								imageDialogLayout:"default", // default|horizontal
								icon:"<i class=\"note-icon-pencil\"/>",
								removeEmpty:false // true = remove attributes | false = leave empty if present
							},
							displayFields:{
								imageBasic:true,  // show/hide Title, Source, Alt fields
								imageExtra:false, // show/hide Alt, Class, Style, Role fields
								linkBasic:true,   // show/hide URL and Target fields for link
								linkExtra:false   // show/hide Class, Rel, Role fields for link
							},
							placeholder: "Bạn đang viết gì? ",
							dialogsInBody: true,
							focus: true,
							minHeight: 150,   //set editable area"s height
							enterHtml: "<br>",
							//height:250,
							//minHeight:null,
							//maxHeight:null,
							toolbar: [
								["font", ["bold", "italic", "underline", "clear"]],
							],
							codemirror: {
								theme: "monokai"
							},
							callbacks: {
								onImageUpload: function (files){
										uploadImage(files[0]);
								}
							}
					});
					return false;
				});
				$(".groupChannelName").on("click",".btnCancelChannelname",function() {
					var channelNameText=$(this).parent().closest(".groupChannelName").find(".channelNameText");
					var changeChannelNameText=$(this).parent().closest(".groupChannelName").find(".changeChannelNameText");
					channelNameText.show();
					changeChannelNameText.empty();
				});
			});
		', $dependencies);
	?>
@endif
<section>
{!!Theme::partial('leftpanel', array('title' => 'Header'))!!}
<div class="mainpanel">
{!!Theme::partial('headerbar', array('title' => 'Header'))!!}
	<div class="pageheader">
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
</div>
</section>