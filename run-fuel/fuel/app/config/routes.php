<?php
return array(
//	'_root_'  => 'welcome/index',  // The default route
    '_root_'  => 'run/list',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

//    'admin/login' => 'run/adminIndex',
    'admin' => 'run/adminIndex',
    'admin/game_add' => 'run/adminGameAdd',
    'admin/join_list' => 'run/adminJoinList',

//    'page(/:id)?' => array('run/page', 'id' => 'page'),
    'page' => 'run/page',
    'sign_up' => 'run/signUp',
);
