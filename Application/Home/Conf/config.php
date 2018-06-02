<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'     =>  array(
			'__HOME__' => __ROOT__.'/Public/Admin',
            '__UPLOADS__' => __ROOT__.'/Application/Home/Uploads'
		), 
	///* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '10.6.78.219', // 服务器地址
    'DB_NAME'               =>  'first',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '111',          // 密码
    'DB_PORT'               =>  '13306',        // 端口
    'DB_PREFIX'             =>  'jifen_',    // 数据库表前缀
);