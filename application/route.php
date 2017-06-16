<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    // 导航页
    '[internet]'     => [
    	''		=> ['index/Index/sort?category=1'],
    ],

    '[technology]'     => [
        ''      => ['index/Index/sort?category=2'],
    ],

    // 文章详情
    '[article]'     => [
        ':id'   => ['index/detail', ['method' => 'get'], ['id' => '\d+']],
    ],

    // 搜索
    '[search]'     => [
        ''      => ['index/Index/search'],
    ],

];

