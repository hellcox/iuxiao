/*
Navicat MySQL Data Transfer

Source Server         : 本地服务器
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : iuxiao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-06-08 14:17:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `small_cover` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '测试文章', '测试', '测试测试测试测试测试', '', '', '测试吃屎', '1452369851', '1469856325', '', '', '1');
INSERT INTO `article` VALUES ('11', '测试文章', '测试测试，测试', '测试测试是否对第三方', '/upload/image/20170608/e1e6d6570909f6da9f5a1f073d50b414.jpg', '', '<p><span style=\"color: rgb(50, 50, 50); font-family: &quot;Century Gothic&quot;, &quot;Microsoft yahei&quot;; background-color: rgb(255, 255, 255);\">在TP5中</span><br style=\"color: rgb(50, 50, 50); font-family: &quot;Century Gothic&quot;, &quot;Microsoft yahei&quot;; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(50, 50, 50); font-family: &quot;Century Gothic&quot;, &quot;Microsoft yahei&quot;; background-color: rgb(255, 255, 255);\">我定义的两个模型</span><code class=\"prettyprint linenums lang-php prettyprinted\" style=\"position: relative; border: 1px solid rgb(209, 215, 220); padding: 2px; font-size: 14px; display: block; font-family: Consolas, &quot;Liberation Mono&quot;, Courier, monospace, 微软雅黑; margin: 10px 0px; white-space: normal; word-wrap: break-word; color: rgb(50, 50, 50); background-color: rgb(255, 255, 255);\"><ol class=\"linenums list-paddingleft-2\" style=\"margin-left: 40px; padding: 0px; color: rgb(43, 165, 216); list-style-position: outside; list-style-image: initial;\"><li><p><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">class</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Orders</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">extends</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Model</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">{</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">protected</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;$name&nbsp;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">&#39;orders&#39;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">;</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">public</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">function</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;errors</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(){</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">return</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;$this</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">-&gt;</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">hasMany</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">&#39;Error&#39;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">,</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">&#39;f_orderid&#39;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">}</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">}</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">class</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Error</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">extends</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Model</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">{</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">protected</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;$name&nbsp;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">&#39;orders_error&#39;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">;</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">}</span></p></li></ol></code><span style=\"color: rgb(50, 50, 50); font-family: &quot;Century Gothic&quot;, &quot;Microsoft yahei&quot;; background-color: rgb(255, 255, 255);\">然后进行查询</span><code class=\"prettyprint linenums lang-php prettyprinted\" style=\"position: relative; border: 1px solid rgb(209, 215, 220); padding: 2px; font-size: 14px; display: block; font-family: Consolas, &quot;Liberation Mono&quot;, Courier, monospace, 微软雅黑; margin: 10px 0px; white-space: normal; word-wrap: break-word; color: rgb(50, 50, 50); background-color: rgb(255, 255, 255);\"><ol class=\"linenums list-paddingleft-2\" style=\"margin-left: 40px; padding: 0px; color: rgb(43, 165, 216); list-style-position: outside; list-style-image: initial;\"><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">$orders&nbsp;</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;</span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Orders</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">::</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">get</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"lit\" style=\"color: rgb(0, 102, 102);\">1</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span></p></li><li><p><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"></span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">return</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">&nbsp;$orders</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">-&gt;</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">errors</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">;</span></p></li></ol></code><span style=\"color: rgb(50, 50, 50); font-family: &quot;Century Gothic&quot;, &quot;Microsoft yahei&quot;; background-color: rgb(255, 255, 255);\">报错Trying to get property of non-ob</span><x style=\"color: rgb(50, 50, 50); font-family: &quot;Century Gothic&quot;, &quot;Microsoft yahei&quot;; white-space: normal; background-color: rgb(255, 255, 255);\">ject<br/>指向的是return $orders-&gt;errors;<br/>我的理解是：errors不是一个对象<br/><br/>不是很理解，到底哪里错了，各位大神帮忙看一下</x></p>', '1496899082', '1496902487', '分类1', 'mysql,php', '1');

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES ('1', '超级管理员', '1', '13,14,15,12,1,3,6,9,10,11,7,8,5');
INSERT INTO `auth_group` VALUES ('3', '普通管理员', '1', '1,2,3');

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` VALUES ('1', '1');
INSERT INTO `auth_group_access` VALUES ('2', '3');
INSERT INTO `auth_group_access` VALUES ('4', '3');
INSERT INTO `auth_group_access` VALUES ('5', '3');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `category_id` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('1', 'admin/Index/index', '后台首页', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('3', 'admin/Index/test', '首页测试', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('5', 'admin/Rule/index', '权限规则列表', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('6', 'admin/Rule/add', '权限规则添加', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('7', 'admin/Rule/delete', '权限规则单条删除', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('8', 'admin/Rule/edit', '权限规则编辑', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('9', 'admin/Rule/category', '权限规则分组', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('10', 'admin/Rule/categoryAdd', '权限规则分组-添加', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('11', 'admin/Rule/categoryDelete', '权限规则分组-删除', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('12', 'admin/Group/index', '角色', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('13', 'admin/Group/add', '角色-添加', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('14', 'admin/Group/delete', '角色-删除', '1', '1', '', '1');
INSERT INTO `auth_rule` VALUES ('15', 'admin/Group/giveRules', '角色-编辑权限', '1', '1', '', '1');

-- ----------------------------
-- Table structure for auth_rule_category
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule_category`;
CREATE TABLE `auth_rule_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule_category
-- ----------------------------
INSERT INTO `auth_rule_category` VALUES ('1', '角色分组');
INSERT INTO `auth_rule_category` VALUES ('2', '权限规则');
INSERT INTO `auth_rule_category` VALUES ('3', '用户角色');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `reg_time` int(10) unsigned NOT NULL COMMENT '注册时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'admin', 'd8c5779d8819d4e8e2434d6c7c91dbfe', '0', '1');
INSERT INTO `user` VALUES ('3', 'test', 'd8c5779d8819d4e8e2434d6c7c91dbfe', '0', '1');
INSERT INTO `user` VALUES ('4', 'test1', 'd8c5779d8819d4e8e2434d6c7c91dbfe', '0', '0');
INSERT INTO `user` VALUES ('5', '1', 'd8c5779d8819d4e8e2434d6c7c91dbfe', '0', '1');
INSERT INTO `user` VALUES ('6', '2', 'd8c5779d8819d4e8e2434d6c7c91dbfe', '0', '1');
INSERT INTO `user` VALUES ('1', 'doudou', 'd8c5779d8819d4e8e2434d6c7c91dbfe', '0', '1');
