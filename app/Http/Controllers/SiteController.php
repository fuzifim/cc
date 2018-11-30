<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Model\Note; 
use App\User; 
use Theme; 
use Auth; 
use Cache; 
use DB; 
use URL; 
class SiteController extends ConstructController
{
	public function __construct(){
		parent::__construct(); 
	}
	public function setStatus(){
		if(!empty($this->_parame['id'])){
			$note=Note::find($this->_parame['id']); 
			if(!empty($note->id)){
				$action=Input::get('action'); 
				if($action=='disableads'){
					$noteMer=array('ads'=>'disable'); 
					$note->attribute= array_merge($note->attribute, $noteMer);
				}else if($action=='activeads'){
					$noteMer=array('ads'=>'active'); 
					$note->attribute= array_merge($note->attribute, $noteMer);
				}else if($action=='blacklist'){
					$note->status='blacklist'; 
				}else if($action=='active'){
					$note->status='active'; 
				}else if($action=='pending'){
					$note->status='pending'; 
				}else if($action=='delete'){
					$note->status='delete'; 
				}
				$note->save(); 
				return response()->json(['success'=>true,
					'message'=>'Đã cập nhật trạng thái trang web '.$note->title, 
				]);
			}else{
				return response()->json(['success'=>true,
					'message'=>'Không tìm thấy trang web ', 
				]);
			}
		}
	}
}