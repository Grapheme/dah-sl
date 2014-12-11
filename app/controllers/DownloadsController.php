<?php

class DownloadsController extends BaseController {
	
	public function __construct(){
		
	}
	
	public function redactorUploadedImages(){
		
		$uploadPath = public_path('download');
		if(!file_exists($uploadPath)):
			echo json_encode(array());
			exit;
		endif;
		$fullList[0] = $fileList = array('thumb'=>'','image'=>'','title'=>'Изображение','folder'=>'Миниатюры');
		if($listDir = scandir($uploadPath)):
			$index = 0;
			foreach($listDir as $number => $file):
				if(is_file($uploadPath.'/'.$file)):
					$thumbnail = $uploadPath.'/thumbnail/thumb_'.$file;
					if(file_exists($thumbnail) && is_file($thumbnail)):
						$fileList['thumb'] = '/download/thumbnail/thumb_'.$file;
					endif;
					$fileList['image'] = '/download/'.$file;
					$fullList[$index] = $fileList;
					$index++;
				endif;
			endforeach;
		endif;
		echo json_encode($fullList);
	}
	
	public function redactorUploadImage(){
		
		$uploadPath = public_path('download');
		if(Input::hasFile('file')):
			$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
			if(!File::exists($uploadPath.'/thumbnail')):
				File::makeDirectory($uploadPath.'/thumbnail',0777,TRUE);
			endif;
			ImageManipulation::make(Input::file('file')->getRealPath())->resize(100,100)->save($uploadPath.'/thumbnail/thumb_'.$fileName);
			ImageManipulation::make(Input::file('file')->getRealPath())->save($uploadPath.'/'.$fileName);
			$file = array('filelink'=>'/download/'.$fileName);
			echo stripslashes(json_encode($file));
		else:
			exit('Нет файла для загрузки!');
		endif;
	}
	
}