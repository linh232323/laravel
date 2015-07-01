<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function()
{   
    Route::get('/',array('as'=>'index',function(){
        return view('admin.dashboard.index')->with('title','Dashboard');
    }));
    /* User Group */
    Route::resource('usergroup', 'Admin\User\UserGroupController');
    /* User */
    Route::resource('user', 'Admin\User\UserController');
    /* Setting */
    Route::resource('setting', 'Admin\Common\SettingController');
     /* Language */
    Route::resource('language', 'Admin\Common\LanguageController');
     /* Currency */
    Route::resource('currency', 'Admin\Common\CurrencyController');
    /* Category */
    Route::resource('category', 'Admin\Catalog\CategoryController');
    /* Hotel */
    Route::resource('hotel', 'Admin\Catalog\HotelController');
    /* Room */
    Route::get('room/{id}',array('as'=>'room_list_get','uses'=>'Admin\Catalog\RoomController@getList'))->where(array('id'=>'[0-9]+'));
    Route::get('room/getattribute',array('as'=>'room_attribute_get','uses'=>'Admin\Catalog\RoomController@getAttribute'));
    Route::get('room/getcategory',array('as'=>'room_category_get','uses'=>'Admin\Catalog\RoomController@getCategory'));
    Route::get('room/create/{hotel_id}',array('as'=>'room_create_get','uses'=>'Admin\Catalog\RoomController@getCreate'))->where(array('hotel_id'=>'[0-9]+'));
    Route::post('room/create',array('as'=>'room_create_post','uses'=>'Admin\Catalog\RoomController@postCreate'));
    Route::get('room/edit/{id}',array('as'=>'room_edit_get','uses'=>'Admin\Catalog\RoomController@getEdit'))->where(array('id'=>'[0-9]+'));
    Route::post('room/edit',array('as'=>'room_edit_post','uses'=>'Admin\Catalog\RoomController@postEdit'));
    Route::post('room/delete',array('as'=>'room_delete_post','uses'=>'Admin\Catalog\RoomController@postDelete'));
    /* Attribute */
    Route::group(['prefix' => 'attribute'], function(){
        /* Attribute Hotel */
        Route::resource('hotel', 'Admin\Catalog\AttributeHotelController');
        /* Attribute Room */
        Route::resource('room', 'Admin\Catalog\AttributeRoomController');
    });
    /* Attribute Group */
    Route::group(['prefix' => 'attributegroup'], function(){
        /* Attribute Group Hotel */
        Route::resource('hotel', 'Admin\Catalog\AttributeGroupHotelController');
        /* Attribute Group Room */
        Route::resource('room', 'Admin\Catalog\AttributeGroupRoomController');
    });
    /* Get Category */
    Route::get('getcategory/hotel',array('as'=>'hotel_category_get','uses'=>'Admin\Catalog\HotelController@getCategory'));
    Route::get('getcategory/tour',array('as'=>'tour_category_get','uses'=>'Admin\Catalog\TourController@getCategory'));
    /* Get Attribute */
    Route::get('getattribute/hotel',array('as'=>'hotel_attribute_get','uses'=>'Admin\Catalog\HotelController@getAttribute'));
    Route::get('getattribute/room',array('as'=>'room_attribute_get','uses'=>'Admin\Catalog\RoomController@getAttribute'));
    /* Tour */
    Route::resource('tour', 'Admin\Catalog\TourController');
    /* Transporter */
    Route::resource('transporter', 'Admin\Catalog\TransporterController');
    /* File Magager*/
    Route::get('filemanager',array('as'=>'filemanager','uses'=>'Admin\Common\FileManagerController@index'));
    Route::post('filemanager/folder',array('as'=>'filemanager_folder','uses'=>'Admin\Common\FileManagerController@folder'));
    Route::post('filemanager/upload',array('as'=>'filemanager_upload','uses'=>'Admin\Common\FileManagerController@upload'));
    Route::get('filemanager/delete',array('as'=>'filemanager_delete','uses'=>'Admin\Common\FileManagerController@delete'));
});
View::composer('catalog.common.header',function($view){
    $languages=App\Models\Common\Language::all();
    $view->with('languages',$languages);
});
View::composer('catalog.common.menu-top',function($view){
    $categories=App\Models\Catalog\Category::with('descriptions')->where('menu',0)->where('status',0)->get();
    $menu=menu($categories);
    $view->with('menu',$menu);
});
function menu($categories,$parent_id=0,$menu=""){
    if($categories){
        foreach ($categories as $key => $category) {
            $cate=App\Models\Catalog\Category::with('descriptions')->where('menu',0)->where('status',0)->where('parent_id',$category->id)->get();
            if($category->parent_id==$parent_id){
                if(isset($cate[0])){
                    $menu.='<li class="dropdown">';
                    $menu.='<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" title="'. $category->descriptions()->where('languageID',Lang::get('language.id'))->first()->name .'">'. $category->descriptions()->where('languageID',Lang::get('language.id'))->first()->name .' <b class="caret"></b></a>';
                    $menu.='<ul class="dropdown-menu">';
                    $menu.= menu($cate,$category->id);
                    $menu.='</ul>';
                    $menu.='</li>';
                }else{
                    $menu.='<li class="">';
                    $menu.='<a href="'.$category->id.'" title="'. $category->descriptions()->where('languageID',Lang::get('language.id'))->first()->name .'">'. $category->descriptions()->where('languageID',Lang::get('language.id'))->first()->name .'</a>';
                    $menu.='</li>';
                }
            }
        }
    }
    return $menu;
}
Route::group(array('prefix' => '{locale}'),function(){
    Route::get('/',array('as'=>'homepage','uses'=>'Catalog\Common\HomeController@index'));
    Route::any('hotel',array('as'=>'hotel','uses'=>'Catalog\Product\HotelController@index'));
    Route::any('hotel/{id}/{title}',array('as'=>'hotel_show','uses'=>'Catalog\Product\HotelController@show'))->where(array('id'=>'[0-9]+'));
    Route::any('room/{id}/{title}',array('as'=>'room_show','uses'=>'Catalog\Product\RoomController@show'))->where(array('id'=>'[0-9]+'));
});
