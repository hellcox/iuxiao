<?php
//配置文件
return [
    /**
     * Admin静态资源路径配置
     * 需要在index.php中定义 STATIC_PATH
     */
    'view_replace_str' => [
        '__CSS__'    => STATIC_PATH . 'admin/css',
        '__JS__'     => STATIC_PATH . 'admin/js',
        '__IMG__'    => STATIC_PATH . 'admin/images',
        '__LIB__'    => STATIC_PATH . 'admin/lib',
        '__STATIC__' => STATIC_PATH . 'admin/static',
    ],

];
