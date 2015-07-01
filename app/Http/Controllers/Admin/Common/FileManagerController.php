<?php namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use Response;
use App\Http\Requestst;
use App\Models\Common\FileManager;
use App\Models\Common\FileManagerDescription;
use App\Models\Common\Language;
use Auth;
use URL;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class FileManagerController extends AdminController{
	public function index()
	{
		$data['title']="FileManager";
		$dir_image="public/";
		if (Input::get('filter_name')) {
			$filter_name = rtrim(str_replace(array('../', '..\\', '..', '*'), '', Input::get('filter_name')), '/');
		} else {
			$filter_name = null;
		}
		// Make sure we have the correct directory
		if ((Input::get('directory'))) {
			$directory = rtrim($dir_image . 'catalog/' . str_replace(array('../', '..\\', '..'), '', Input::get('directory')), '/');
		} else {
			$directory = $dir_image . 'catalog';
		}
		if (Input::get('page')) {
			$page = Input::get('page');
		} else {
			$page = 1;
		}
		$data['images'] = array();
		// Get directories
		$directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);
		if (!$directories) {
			$directories = array();
		}
		// Get files
		$files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);
		if (!$files) {
			$files = array();
		}
		// Merge directories and files
		$images = array_merge($directories, $files);
		// Get total number of files and directories
		$image_total = count($images);
		// Split the array based on current page number and max number of items per page of 10
		$images = array_splice($images, ($page - 1) * 16, 16);
		foreach ($images as $image) {
			$name = str_split(basename($image), 14);
			if (is_dir($image)) {
				$url = '';
				if (Input::get('target')) {
					$url .= '&target=' . Input::get('target');
				}
				if (Input::get('thumb')) {
					$url .= '&thumb=' . Input::get('thumb');
				}
				if (Input::get('slide')) {
					$url .= '&slide=' . Input::get('slide');
				}
				$pos=strripos($image, 'catalog/');
				$path=substr($image,$pos);
				$href=urlencode(substr($image,$pos+8));
				$data['images'][] = array(
					'thumb' => '',
					'name'  => implode(' ', $name),
					'type'  => 'directory',
					'path'  => $path,
					'href'  => URL::route('filemanager'). '?directory='. $href . $url,
				);
			} elseif (is_file($image)) {
				$pos=strripos($image, 'catalog/');
				$path=substr($image,$pos);
				$href=urlencode(substr($image,$pos+8));
				$data['images'][] = array(
					'thumb' => $image,
					'name'  => implode(' ', $name),
					'type'  => 'image',
					'path'  => $path,
					'href'  => URL::route('filemanager'). '?directory='. $href ,
				);
			}
		}
		if (Input::get('directory')) {
			$data['directory'] = urlencode(Input::get('directory'));
		} else {
			$data['directory'] = '';
		}
		if (Input::get('filter_name')) {
			$data['filter_name'] = Input::get('filter_name');
		} else {
			$data['filter_name'] = '';
		}
		// Return the target ID for the file manager to set the value
		if (Input::get('target')) {
			$data['target'] = Input::get('target');
		} else {
			$data['target'] = '';
		}
		// Return the thumbnail for the file manager to show a thumbnail
		if (Input::get('thumb')) {
			$data['thumb'] = Input::get('thumb');
		} else {
			$data['thumb'] = '';
		}
		// Parent
		$url = '';
		if (Input::get('directory')) {
			$pos = strrpos(Input::get('directory'), '/');
			if ($pos) {
				$url .= '?directory=' . urlencode(substr(Input::get('directory'), 0, $pos));
			}else{
				$url .= '?directory=' ;
			}
		}else{
			$url .= '?directory=' ;
		}
		if (Input::get('target')) {
			$url .= '&target=' . Input::get('target');
		}
		if (Input::get('thumb')) {
			$url .= '&thumb=' . Input::get('thumb');
		}
		if ((Input::get('slide'))) {
			$url .= '&slide=' . Input::get('slide');
		}
		$data['parent'] = $url;
		// Refresh
		$url = '';
		if (Input::get('directory')) {
			$url .= '?directory=' . urlencode(Input::get('directory'));
		}else{
			$url .= '?directory=' ;
		}
		if (Input::get('target')) {
			$url .= '&target=' . Input::get('target');
		}
		if (Input::get('thumb')) {
			$url .= '&thumb=' . Input::get('thumb');
		}
		if (Input::get('slide')) {
			$url .= '&slide=' . Input::get('slide');
		}
		$data['refresh'] = $url;
		$url = '';
		if (Input::get('directory')) {
			$url .= '?directory=' . urlencode(html_entity_decode(Input::get('directory'), ENT_QUOTES, 'UTF-8'));
		}
		if (Input::get('filter_name')) {
			$url .= '&filter_name=' . urlencode(html_entity_decode(Input::get('filter_name'), ENT_QUOTES, 'UTF-8'));
		}
		if (Input::get('target')) {
			$url .= '&target=' . Input::get('target');
		}

		if (Input::get('thumb')) {
			$url .= '&thumb=' . Input::get('thumb');
		}
		if (Input::get('slide')) {
			$url .= '&slide=' . Input::get('slide');
		}
		if(Input::get('slide')){
			$data['slide']=1;
		}else{
			$data['slide']="";
		}
		$data['links'] = new Paginator($page, $image_total, 16, null,[
            'path'  => URL::route('filemanager').$url
        ]);
		return view('admin.common.filemanager.filemanager',$data);
	}
	public function upload() 
	{
		$dir_image="public/";
	 	$user_id = Auth::user()->user_group_id;
	 	$data=Input::all();
		// Make sure we have the correct directory
		if (Input::get('directory')) {
			$directory = rtrim($dir_image . 'catalog/' . str_replace(array('../', '..\\', '..'), '', Input::get('directory')), '/');
		} else {
			$directory = $dir_image . 'catalog';
		}
		// Check its a directory
		if (!is_dir($directory)) {
			return Response::json(array('mess'=>"Error"));
		}
		$count = count($data['file']);
		for ($i=0;$i<$count;$i++){
			if (!empty($data['file'][$i]->getClientOriginalName()) && is_file($data['file'][$i]->getRealPath())) {
				// Sanitize the filename
				$filename = basename(html_entity_decode($data['file'][$i]->getClientOriginalName(), ENT_QUOTES, 'UTF-8'));
				// Validate the filename length
				if ((strlen ($filename) < 3) || (strlen ($filename) > 255)) {
					return Response::json(array('mess'=>"Error: File Name Min: 3, Max: 255"));
				}
				// Allowed file mime types
				$allowed = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/gif' );
				if (!in_array($data['file'][$i]->getMimeType(), $allowed)) {
					return Response::json(array('mess'=>"Error"));
				}
				// Check to see if any PHP files are trying to be uploaded
				$content = file_get_contents($data['file'][$i]->getRealPath());
				if (preg_match('/\<\?php/i', $content)) {
					return Response::json(array('mess'=>"Error"));
				}
			}
			move_uploaded_file($data['file'][$i]->getRealPath(), $directory . '/' . $filename);
		}
		return Response::json(array('mess'=>"Success"));
	}

	public function folder() 
	{
		if(Request::ajax()){
			$user_id=Auth::user()->user_group_id;
			$dir_image="public/";
			// Make sure we have the correct directory
			if ((Input::get('directory'))) {
				$directory = rtrim($dir_image . 'catalog/' . str_replace(array('../', '..\\', '..'), '', Input::get('directory')), '/');
			} else {
					$directory = $dir_image . 'catalog';
			}
			// Check its a directory
			if (!is_dir($directory)) {
				return Response::json(array('mess'=>"Error"));
			}
			// Sanitize the folder name
			$folder = str_replace(array('../', '..\\', '..'), '', basename(html_entity_decode(Input::get('folder'), ENT_QUOTES, 'UTF-8')));
			// Validate the filename length
			if ((strlen($folder) < 1) || (strlen($folder) > 128)) {
				return Response::json(array('mess'=>"Error: Folder Name Min: 1 Max: 128"));
			}
			// Check if directory already exists or not
			if (is_dir($directory . '/' . $folder)) {
				return Response::json(array('mess'=>"Error: Folder Exists"));
			}
			mkdir($directory . '/' . $folder, 0777);
			return Response::json(array('mess'=>"Success"));
		}else{
			return Response::json(array('mess'=>"Error"));
		}

	}

	public function delete() 
	{
		if(Request::ajax()){
			$dir_image="public/";
			if ((Input::get('path'))) {
				$paths = Input::get('path');
			} else {
				$paths = array();
			}
			// Loop through each path to run validations
			foreach ($paths as $path) {
				$path = rtrim($dir_image . str_replace(array('../', '..\\', '..'), '', $path), '/');
				// Check path exsists
				if ($path == $dir_image . 'catalog') {
					return Response::json(array('mess'=>"Error"));
					break;
				}
			}
			// Loop through each path
			foreach ($paths as $path) {
				$path = rtrim($dir_image . str_replace(array('../', '..\\', '..'), '', $path), '/');
				// If path is just a file delete it
				if (is_file($path)) {
					unlink($path);
				// If path is a directory beging deleting each file and sub folder
				} elseif (is_dir($path)) {
					$files = array();
					// Make path into an array
					$path = array($path . '*');
					// While the path array is still populated keep looping through
					while (count($path) != 0) {
						$next = array_shift($path);
						foreach (glob($next) as $file) {
							// If directory add to path array
							if (is_dir($file)) {
								$path[] = $file . '/*';
							}
							// Add the file to the files to be deleted array
							$files[] = $file;
						}
					}
					// Reverse sort the file array
					rsort($files);
					foreach ($files as $file) {
						// If file just delete
						if (is_file($file)) {
							unlink($file);
						// If directory use the remove directory function
						} elseif (is_dir($file)) {
							rmdir($file);
						}
					}
				}
			}
			return Response::json(array('mess'=>"Success"));
		}else{
			return Response::json(array('mess'=>"Error"));
		}
	}
}