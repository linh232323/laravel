<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            $post= array(
                array(
                    'name'          =>  'English',
                    'code'          =>  'en',
                    'locale'        =>  'en_US.UTF-8,en_US,en-gb,english',
                    'image'         =>  'gb.png',
                    'directory'     =>  'english',
                    'sort_order'    =>  0,
                    'status'        =>  0,
                ),
                array(
                    'name'          =>  'Việt Nam',
                    'code'          =>  'vn',
                    'locale'        =>  'vi_VN.UTF-8,vi_VN,vi-vn,vietnamese',
                    'image'         =>  'vn.png',
                    'directory'     =>  'vietnamese',
                    'sort_order'    =>  1,
                    'status'        =>  0,
                ),
            );
            DB::table('languages')->insert($post); 

            $post= array(
                array(
                    'name'          =>  'Administrator',
                ),
                array(
                    'name'          =>  'Employee',
                ),
            );
            DB::table('user_groups')->insert($post);

            $post= array(
                array(
                    'username'          =>  'Administrator',
                    'password'          =>  'Administrator',
                    'firstname'         =>  'Administrator',
                    'lastname'          =>  'Administrator',
                    'email'             =>  'Administrator@gmail.com',
                    'ip'                =>  ':::1',
                    'status'            =>  '0',
                    'user_group_id'     =>  '1',
                ),
                array(
                    'username'          =>  'User',
                    'password'          =>  'User123',
                    'firstname'         =>  'User_User',
                    'lastname'          =>  'User_User',
                    'email'             =>  'User@gmail.com',
                    'ip'                =>  ':::1',
                    'status'            =>  '0',
                    'user_group_id'     =>  '2',
                ),
                array(
                    'username'          =>  'User_1',
                    'password'          =>  'User123',
                    'firstname'         =>  'User_1',
                    'lastname'          =>  'User_1',
                    'email'             =>  'User_1@gmail.com',
                    'ip'                =>  ':::1',
                    'status'            =>  '0',
                    'user_group_id'     =>  '2',
                ),
            );
            DB::table('users')->insert($post);

            $post= array(
                array(
                    'name'              =>  'Hotel',
                ),
                array(
                    'name'              =>  'Tour',
                ),
            );
            DB::table('category_types')->insert($post);

            $post= array(
                array(
                    'name'              =>  'Hotel',
                    'parent_id'         =>  '0',
                    'typeID'            =>  '1',
                ),
                array(
                    'name'              =>  'Hotel - Ho Chi Minh',
                    'parent_id'         =>  '1',
                    'typeID'            =>  '1',
                ),
                array(
                    'name'              =>  'Hotel - Ha Noi',
                    'parent_id'         =>  '1',
                    'typeID'            =>  '1',
                ),
                array(
                    'name'              =>  'Hotel - Da Nang',
                    'parent_id'         =>  '1',
                    'typeID'            =>  '1',
                ),
                array(
                    'name'              =>  'Hotel - Ho Chi Minh - Thu Duc',
                    'parent_id'         =>  '2',
                    'typeID'            =>  '1',
                ),
                array(
                    'name'              =>  'Tour',
                    'parent_id'         =>  '0',
                    'typeID'            =>  '2',
                ),
                array(
                    'name'              =>  'Tour - Ho Chi Minh',
                    'parent_id'         =>  '6',
                    'typeID'            =>  '2',
                ),
                array(
                    'name'              =>  'Tour - Ha Noi',
                    'parent_id'         =>  '6',
                    'typeID'            =>  '2',
                ),
                array(
                    'name'              =>  'Tour - Da Nang',
                    'parent_id'         =>  '6',
                    'typeID'            =>  '2',
                ),
                array(
                    'name'              =>  'Tour - Ho Chi Minh - Thu Duc',
                    'parent_id'         =>  '7',
                    'typeID'            =>  '2',
                ),
            );
            DB::table('categories')->insert($post);

            $post= array(
                array(
                    'categoryID'         =>     '1',
                    'languageID'         =>     '1',
                    'name'               =>     'Hotel',
                    'meta_title'         =>     'Hotel',
                    'meta_keyword'       =>     'Hotel',
                    'meta_description'   =>     'Hotel',
                ),
                array(
                    'categoryID'         =>     '1',
                    'languageID'         =>     '2',
                    'name'               =>     'Khách sạn',
                    'meta_title'         =>     'Khách sạn',
                    'meta_keyword'       =>     'Khách sạn',
                    'meta_description'   =>     'Khách sạn',
                ),
                array(
                    'categoryID'         =>     '2',
                    'languageID'         =>     '1',
                    'name'               =>     'Ho Chi Minh',
                    'meta_title'         =>     'Ho Chi Minh',
                    'meta_keyword'       =>     'Ho Chi Minh',
                    'meta_description'   =>     'Ho Chi Minh',
                ),
                array(
                    'categoryID'         =>     '2',
                    'languageID'         =>     '2',
                    'name'               =>     'Hồ Chí Minh',
                    'meta_title'         =>     'Hồ Chí Minh',
                    'meta_keyword'       =>     'Hồ Chí Minh',
                    'meta_description'   =>     'Hồ Chí Minh',
                ),
                array(
                    'categoryID'         =>     '3',
                    'languageID'         =>     '1',
                    'name'               =>     'Ha Noi',
                    'meta_title'         =>     'Ha Noi',
                    'meta_keyword'       =>     'Ha Noi',
                    'meta_description'   =>     'Ha Noi',
                ),
                array(
                    'categoryID'         =>     '3',
                    'languageID'         =>     '2',
                    'name'               =>     'Hà Nội',
                    'meta_title'         =>     'Hà Nội',
                    'meta_keyword'       =>     'Hà Nội',
                    'meta_description'   =>     'Hà Nội',
                ),
                array(
                    'categoryID'         =>     '4',
                    'languageID'         =>     '1',
                    'name'               =>     'Da Nang',
                    'meta_title'         =>     'Da Nang',
                    'meta_keyword'       =>     'Da Nang',
                    'meta_description'   =>     'Da Nang',
                ),
                array(
                    'categoryID'         =>     '4',
                    'languageID'         =>     '2',
                    'name'               =>     '',
                    'meta_title'         =>     'Đà Nẵng',
                    'meta_keyword'       =>     'Đà Nẵng',
                    'meta_description'   =>     'Đà Nẵng',
                ),
                array(
                    'categoryID'         =>     '5',
                    'languageID'         =>     '1',
                    'name'               =>     'Thu Duc',
                    'meta_title'         =>     'Thu Duc',
                    'meta_keyword'       =>     'Thu Duc',
                    'meta_description'   =>     'Thu Duc',
                ),
                array(
                    'categoryID'         =>     '5',
                    'languageID'         =>     '2',
                    'name'               =>     'Thủ Dức',
                    'meta_title'         =>     'Thủ Dức',
                    'meta_keyword'       =>     'Thủ Dức',
                    'meta_description'   =>     'Thủ Dức',
                ),
                array(
                    'categoryID'         =>     '6',
                    'languageID'         =>     '1',
                    'name'               =>     'Tour',
                    'meta_title'         =>     'Hotel',
                    'meta_keyword'       =>     'Hotel',
                    'meta_description'   =>     'Hotel',
                ),
                array(
                    'categoryID'         =>     '6',
                    'languageID'         =>     '2',
                    'name'               =>     'Tour',
                    'meta_title'         =>     'Tour',
                    'meta_keyword'       =>     'Tour',
                    'meta_description'   =>     'Tour',
                ),
                array(
                    'categoryID'         =>     '7',
                    'languageID'         =>     '1',
                    'name'               =>     'Ho Chi Minh',
                    'meta_title'         =>     'Ho Chi Minh',
                    'meta_keyword'       =>     'Ho Chi Minh',
                    'meta_description'   =>     'Ho Chi Minh',
                ),
                array(
                    'categoryID'         =>     '7',
                    'languageID'         =>     '2',
                    'name'               =>     'Hồ Chí Minh',
                    'meta_title'         =>     'Hồ Chí Minh',
                    'meta_keyword'       =>     'Hồ Chí Minh',
                    'meta_description'   =>     'Hồ Chí Minh',
                ),
                array(
                    'categoryID'         =>     '8',
                    'languageID'         =>     '1',
                    'name'               =>     'Ha Noi',
                    'meta_title'         =>     'Ha Noi',
                    'meta_keyword'       =>     'Ha Noi',
                    'meta_description'   =>     'Ha Noi',
                ),
                array(
                    'categoryID'         =>     '8',
                    'languageID'         =>     '2',
                    'name'               =>     'Hà Nội',
                    'meta_title'         =>     'Hà Nội',
                    'meta_keyword'       =>     'Hà Nội',
                    'meta_description'   =>     'Hà Nội',
                ),
                array(
                    'categoryID'         =>     '9',
                    'languageID'         =>     '1',
                    'name'               =>     'Da Nang',
                    'meta_title'         =>     'Da Nang',
                    'meta_keyword'       =>     'Da Nang',
                    'meta_description'   =>     'Da Nang',
                ),
                array(
                    'categoryID'         =>     '9',
                    'languageID'         =>     '2',
                    'name'               =>     '',
                    'meta_title'         =>     'Đà Nẵng',
                    'meta_keyword'       =>     'Đà Nẵng',
                    'meta_description'   =>     'Đà Nẵng',
                ),
                array(
                    'categoryID'         =>     '10',
                    'languageID'         =>     '1',
                    'name'               =>     'Thu Duc',
                    'meta_title'         =>     'Thu Duc',
                    'meta_keyword'       =>     'Thu Duc',
                    'meta_description'   =>     'Thu Duc',
                ),
                array(
                    'categoryID'         =>     '10',
                    'languageID'         =>     '2',
                    'name'               =>     'Thủ Dức',
                    'meta_title'         =>     'Thủ Dức',
                    'meta_keyword'       =>     'Thủ Dức',
                    'meta_description'   =>     'Thủ Dức',
                ),
            );
            DB::table('category_descriptions')->insert($post);

            $post= array(
                array(
                    'name'         =>     'Facilities',
                ),
                array(
                    'name'         =>     'Languages',
                ),
                array(
                    'name'         =>     'Sports',
                ),
                array(
                    'name'         =>     'Internet',
                ),
            );
            DB::table('attribute_group_hotels')->insert($post);

            $post= array(
                array(
                    'attributegroupID'         =>     '1',
                    'languageID'               =>     '1',
                    'name'                     =>     'Facilities',
                ),
                array(
                    'attributegroupID'         =>     '2',
                    'languageID'               =>     '1',
                    'name'                     =>     'Languages',
                ),
                array(
                    'attributegroupID'         =>     '3',
                    'languageID'               =>     '1',
                    'name'                     =>     'Sports',
                ),
                array(
                    'attributegroupID'         =>     '4',
                    'languageID'               =>     '1',
                    'name'                     =>     'Internet',
                ),
                array(
                    'attributegroupID'         =>     '1',
                    'languageID'               =>     '2',
                    'name'                     =>     'Facilities',
                ),
                array(
                    'attributegroupID'         =>     '2',
                    'languageID'               =>     '2',
                    'name'                     =>     'Languages',
                ),
                array(
                    'attributegroupID'         =>     '3',
                    'languageID'               =>     '2',
                    'name'                     =>     'Sports',
                ),
                array(
                    'attributegroupID'         =>     '4',
                    'languageID'               =>     '2',
                    'name'                     =>     'Internet',
                ),
            );
            DB::table('attribute_group_hotel_descriptions')->insert($post);

            $post= array(
                array(
                    'attributegroupID'         =>     '1',
                    'name'                     =>     'ariport transfer',
                ),
                array(
                    'attributegroupID'         =>     '2',
                    'name'                     =>     'vietnamese',
                ),
                array(
                    'attributegroupID'         =>     '3',
                    'name'                     =>     'music',
                ),
                array(
                    'attributegroupID'         =>     '4',
                    'name'                     =>     'all wifi free',
                ),
                array(
                    'attributegroupID'         =>     '1',
                    'name'                     =>     'bar',
                ),
                array(
                    'attributegroupID'         =>     '2',
                    'name'                     =>     'english',
                ),
                array(
                    'attributegroupID'         =>     '3',
                    'name'                     =>     'game',
                ),
                array(
                    'attributegroupID'         =>     '4',
                    'name'                     =>     'wifi free',
                ),
            );
            DB::table('attribute_hotels')->insert($post);

            $post= array(
                array(
                    'attributeID'              =>     '1',
                    'languageID'               =>     '1',
                    'name'                     =>     'ariport transfer',
                ),
                array(
                    'attributeID'              =>     '1',
                    'languageID'               =>     '2',
                    'name'                     =>     'ariport transfer',
                ),
                array(
                    'attributeID'              =>     '2',
                    'languageID'               =>     '1',
                    'name'                     =>     'vietnamese',
                ),
                array(
                    'attributeID'              =>     '2',
                    'languageID'               =>     '2',
                    'name'                     =>     'vietnamese',
                ),
                array(
                    'attributeID'              =>     '3',
                    'languageID'               =>     '1',
                    'name'                     =>     'music',
                ),
                array(
                    'attributeID'              =>     '3',
                    'languageID'               =>     '2',
                    'name'                     =>     'music',
                ),
                array(
                    'attributeID'              =>     '4',
                    'languageID'               =>     '1',
                    'name'                     =>     'all wifi',
                ),
                array(
                    'attributeID'              =>     '4',
                    'languageID'               =>     '1',
                    'name'                     =>     'all wifi',
                ),
                array(
                    'attributeID'              =>     '5',
                    'languageID'               =>     '1',
                    'name'                     =>     'bar',
                ),
                array(
                    'attributeID'              =>     '5',
                    'languageID'               =>     '2',
                    'name'                     =>     'bar',
                ),
                array(
                    'attributeID'              =>     '6',
                    'languageID'               =>     '1',
                    'name'                     =>     'english',
                ),
                array(
                    'attributeID'              =>     '6',
                    'languageID'               =>     '2',
                    'name'                     =>     'english',
                ),
                array(
                    'attributeID'              =>     '7',
                    'languageID'               =>     '1',
                    'name'                     =>     'game',
                ),
                array(
                    'attributeID'              =>     '7',
                    'languageID'               =>     '2',
                    'name'                     =>     'game',
                ),
                array(
                    'attributeID'              =>     '8',
                    'languageID'               =>     '1',
                    'name'                     =>     'wifi free',
                ),
                array(
                    'attributeID'              =>     '8',
                    'languageID'               =>     '2',
                    'name'                     =>     'wifi free',
                ),
            );
            DB::table('attribute_hotel_descriptions')->insert($post);

            $post= array(
                array(
                    'name'                     =>     'Bus',
                ),
                array(
                    'name'                     =>     'Plane',
                ),
                array(
                    'name'                     =>     'Train',
                ),
                array(
                    'name'                     =>     'Boat',
                ),
            );
            DB::table('transporters')->insert($post);

            $post= array(
                array(
                    'name'                     =>     'Bus',
                    'transporterID'            =>     '1',
                    'languageID'               =>     '1',
                ),
                array(
                    'name'                     =>     'Buýt',
                    'transporterID'            =>     '1',
                    'languageID'               =>     '2',
                ),
                array(
                    'name'                     =>     'Plane',
                    'transporterID'            =>     '2',
                    'languageID'               =>     '1',
                ),
                array(
                    'name'                     =>     'Máy Bay',
                    'transporterID'            =>     '2',
                    'languageID'               =>     '2',
                ),
                array(
                    'name'                     =>     'Train',
                    'transporterID'            =>     '3',
                    'languageID'               =>     '1',
                ),
                array(
                    'name'                     =>     'Tàu Hỏa',
                    'transporterID'            =>     '3',
                    'languageID'               =>     '2',
                ),
                array(
                    'name'                     =>     'Boat',
                    'transporterID'            =>     '4',
                    'languageID'               =>     '1',
                ),
                array(
                    'name'                     =>     'Thuyền',
                    'transporterID'            =>     '4',
                    'languageID'               =>     '2',
                ),
            );
            DB::table('transporter_descriptions')->insert($post);
	}

}
