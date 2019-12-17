<?php
return array(
//'配置项'=>'配置值'
	
	//设置一个入口文件访问两个模块
    'MODULE_ALLOW_LIST' => array('Member','System','Wap'),
    'DEFAULT_MODULE'=>'Member', //设置默认访问模块
    //'DEFAULT_MODULE'=>'Wap', //设置默认访问模块

    //模块映射
  // 'URL_MODULE_MAP'    =>    array('System'=>'Admin'),
    
    //URL不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
    
    // 显示页面Trace信息
    //'SHOW_PAGE_TRACE' =>true,
    //'PAGE_TRACE_SAVE'=>true,
    
    'URL_MODEL'          => '2', //URL模式
    'SESSION_AUTO_START' => true, //是否开启session
    'DEFAULT_THEME'    =>    'Default',  //设置默认主题（View）
    
    //修改THINKPHP定界符
    'TMPL_L_DELIM'=>'<{',
    'TMPL_R_DELIM'=>'}>',
    
    //进行数据库的配置
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'huimingou2019.com', // 数据库名
    'DB_USER'   => 'liushaoguang', // 用户名
    'DB_PWD'    => 'cjf8616818', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'lscf_', // 数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    //此配置是为了区分数据库字段大小写的，不配置则自动转化为小写
    'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL), 

   // 'LOG_RECORD' => true, // 开启日志记录
  //  'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
   // 'LOG_TYPE'              =>  'File',  //日志文件记录
   
    //自定义success和error的提示页面模板
    //'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
    //'TMPL_ACTION_ERROR'=>'Public:error',
    
    //'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    //'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
    //'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
    //'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        // 定义格式1 数组方式
        //'静态地址'    =>     array('静态规则', '有效期', '附加规则'),
        // 定义格式2 字符串方式
       // 'Index:Index'    =>     '../../index',
 //   ),
    
   'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
   'APP_SUB_DOMAIN_RULES'    =>    array(
  'mycfht'             => 'System',  // 后台子域名指向System模块
  //'mycf'                => 'Member',  // PC端的子域名指向Member模块
  'mycf'                => 'Wap',  // PC端的子域名指向Member模块

	),
);
