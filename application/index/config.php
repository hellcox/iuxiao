<?php
//配置文件
return [
    /**
     * Index静态资源路径配置
     * 需要在index.php中定义 STATIC_PATH
     */
    'view_replace_str' => [
        '__CSS__'    => STATIC_PATH . 'index/css',
        '__JS__'     => STATIC_PATH . 'index/js',
        '__IMG__'    => STATIC_PATH . 'index/image',
        '__LIB__'    => STATIC_PATH . 'index/lib',
    ],

];
