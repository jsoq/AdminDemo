<?php
/**
 * 后台菜单迁移文件
 * @author yupoxiong<i@yufuping.com>
 */

use think\Db;
use think\migration\Migrator;
use think\migration\db\Column;

class AdminMenu extends Migrator
{
    public function change()
    {
        $table = $this->table('admin_menu', ['comment'=>'后台菜单','engine' => 'InnoDB', 'encoding' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']);
        $table->addColumn('parent_id', 'integer', ['limit' => 11, 'default' => 0, 'comment' => '父级菜单'])
            ->addColumn('name', 'string', ['limit' => 30, 'default' => '', 'comment' => '名称'])
            ->addColumn('url', 'string', ['limit' => 100, 'default' => '', 'comment' => 'url'])
            ->addColumn('icon', 'string', ['limit' => 30, 'default' => 'fa-list', 'comment' => '图标'])
            ->addColumn('is_show', 'boolean', ['limit' => 1, 'default' => 1, 'comment' => '等级'])
            ->addColumn('sort_id', 'integer', ['limit' => 10, 'default' => '1000', 'comment' => '排序'])
            ->addColumn('log_method', 'string', ['limit' => 8, 'default' => '不记录', 'comment' => '记录日志方法'])
            ->addIndex(['url'], ['name' => 'index_url'])
            ->create();
        $this->insertData();
    }

    protected function insertData()
    {
        $data = '[{"id":1,"parent_id":0,"name":"后台首页","url":"admin/index/index","icon":"fa-home","is_show":1,"sort_id":99,"log_method":"不记录"},{"id":2,"parent_id":0,"name":"系统管理","url":"admin/sys","icon":"fa-desktop","is_show":1,"sort_id":1099,"log_method":"不记录"},{"id":3,"parent_id":2,"name":"用户管理","url":"admin/admin_user/index","icon":"fa-user","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":4,"parent_id":3,"name":"添加用户","url":"admin/admin_user/add","icon":"fa-plus","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":5,"parent_id":3,"name":"修改用户","url":"admin/admin_user/edit","icon":"fa-edit","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":6,"parent_id":3,"name":"删除用户","url":"admin/admin_user/del","icon":"fa-close","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":7,"parent_id":2,"name":"角色管理","url":"admin/admin_role/index","icon":"fa-group","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":8,"parent_id":7,"name":"添加角色","url":"admin/admin_role/add","icon":"fa-plus","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":9,"parent_id":7,"name":"修改角色","url":"admin/admin_role/edit","icon":"fa-edit","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":10,"parent_id":7,"name":"删除角色","url":"admin/admin_role/del","icon":"fa-close","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":11,"parent_id":7,"name":"角色授权","url":"admin/admin_role/access","icon":"fa-key","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":12,"parent_id":2,"name":"菜单管理","url":"admin/admin_menu/index","icon":"fa-align-justify","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":13,"parent_id":12,"name":"添加菜单","url":"admin/admin_menu/add","icon":"fa-plus","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":14,"parent_id":12,"name":"修改菜单","url":"admin/admin_menu/edit","icon":"fa-edit","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":15,"parent_id":12,"name":"删除菜单","url":"admin/admin_menu/del","icon":"fa-close","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":16,"parent_id":2,"name":"操作日志","url":"admin/admin_log/index","icon":"fa-keyboard-o","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":17,"parent_id":16,"name":"查看操作日志详情","url":"admin/admin_log/view","icon":"fa-search-plus","is_show":0,"sort_id":1000,"log_method":"不记录"},{"id":18,"parent_id":2,"name":"个人资料","url":"admin/admin_user/profile","icon":"fa-smile-o","is_show":1,"sort_id":1000,"log_method":"POST"},{"id":19,"parent_id":0,"name":"用户管理","url":"admin/user/mange","icon":"fa-users","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":20,"parent_id":19,"name":"用户管理","url":"admin/user/index","icon":"fa-user","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":21,"parent_id":20,"name":"添加用户","url":"admin/user/add","icon":"fa-plus","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":22,"parent_id":20,"name":"修改用户","url":"admin/user/edit","icon":"fa-pencil","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":23,"parent_id":20,"name":"删除用户","url":"admin/user/del","icon":"fa-trash","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":24,"parent_id":20,"name":"启用用户","url":"admin/user/enable","icon":"fa-circle","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":25,"parent_id":20,"name":"禁用用户","url":"admin/user/disable","icon":"fa-circle","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":26,"parent_id":19,"name":"用户等级管理","url":"admin/user_level/index","icon":"fa-th-list","is_show":1,"sort_id":1000,"log_method":"不记录"},{"id":27,"parent_id":26,"name":"添加用户等级","url":"admin/user_level/add","icon":"fa-plus","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":28,"parent_id":26,"name":"修改用户等级","url":"admin/user_level/edit","icon":"fa-pencil","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":29,"parent_id":26,"name":"删除用户等级","url":"admin/user_level/del","icon":"fa-trash","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":30,"parent_id":26,"name":"启用用户等级","url":"admin/user_level/enable","icon":"fa-circle","is_show":0,"sort_id":1000,"log_method":"POST"},{"id":31,"parent_id":26,"name":"禁用用户等级","url":"admin/user_level/disable","icon":"fa-circle","is_show":0,"sort_id":1000,"log_method":"POST"}]';

        $msg = '后台管理菜单导入成功.' . "\n";
        Db::startTrans();
        $data = json_decode($data, true);
        try {
            foreach ($data as $item) {
                \app\admin\model\AdminMenu::create($item);
            }
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $msg = $e->getMessage();
        }
        print ($msg);
    }
}
