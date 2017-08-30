## 接口文档 ##

> **登录**

地址：[http://www.chaorenyundong.com/?s=/admin/index/login](http://www.chaorenyundong.com/?s=/admin/index/login "登录")

请求方式：POST

参数：   
`username:用户名`   
`password:密码`

接口返回：

    "code": 20000,
    "msg": "成功",
    "data": {
        "user_id": "1",
        "token": "ab4f700765fb971bd86be412NCT1SLwfHEI"
    }

<br><br>

> **添加菜单**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/addnode/token/64af9a94f48544854f892112NCT1SLwfHEI](http://www.chaorenyundong.com/?s=/admin/manager/addnode/token/64af9a94f48544854f892112NCT1SLwfHEI "添加菜单")

请求方式：POST

参数：   
`node_name:菜单名称`   
`node_url:菜单地址`   
`pid:上级菜单id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
	}

<br><br>

> **添加角色**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/addrole/token/64af9a94f48544854f892112NCT1SLwfHEI](http://www.chaorenyundong.com/?s=/admin/manager/addrole/token/64af9a94f48544854f892112NCT1SLwfHEI "添加角色")

请求方式：POST

参数：   
`role_name:角色名称`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": 2
	}

<br><br>

> **总菜单列表**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/menulists/token/2535bb43d3d040f4c8dc9d12NCT1SLwfHEI](http://www.chaorenyundong.com/?s=/admin/manager/menulists/token/2535bb43d3d040f4c8dc9d12NCT1SLwfHEI "总菜单列表")

请求方式：GET

参数：   


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": [
	        {
	            "node_id": "1",
	            "node_name": "主页",
	            "node_url": "zhuye.html",
	            "node_css": "fa fa-success",
	            "pid": "0",
	            "child": [
	                {
	                    "node_id": "13",
	                    "node_name": "1",
	                    "node_url": "1",
	                    "node_css": null,
	                    "pid": "1"
	                },
	                {
	                    "node_id": "14",
	                    "node_name": "1",
	                    "node_url": "1",
	                    "node_css": null,
	                    "pid": "1"
	                }
	            ]
	        },
	        {
	            "node_id": "4",
	            "node_name": "广告管理",
	            "node_url": "我千万千瓦",
	            "node_css": "我去我去",
	            "pid": "0",
	            "child": [
	                {
	                    "node_id": "10",
	                    "node_name": "2",
	                    "node_url": "3",
	                    "node_css": null,
	                    "pid": "4"
	                },
	                {
	                    "node_id": "11",
	                    "node_name": "2",
	                    "node_url": "3",
	                    "node_css": null,
	                    "pid": "4"
	                },
	                {
	                    "node_id": "12",
	                    "node_name": "2",
	                    "node_url": "3",
	                    "node_css": null,
	                    "pid": "4"
	                }
	            ]
	        },
	        {
	            "node_id": "5",
	            "node_name": "管理员",
	            "node_url": "飒飒",
	            "node_css": "飒飒",
	            "pid": "0",
	            "child": null
	        },
	        {
	            "node_id": "6",
	            "node_name": "主页",
	            "node_url": "啊",
	            "node_css": null,
	            "pid": "0",
	            "child": null
	        },
	        {
	            "node_id": "7",
	            "node_name": "主页",
	            "node_url": "html",
	            "node_css": null,
	            "pid": "0",
	            "child": null
	        },
	        {
	            "node_id": "8",
	            "node_name": "主页",
	            "node_url": "html",
	            "node_css": null,
	            "pid": "0",
	            "child": null
	        },
	        {
	            "node_id": "9",
	            "node_name": "的",
	            "node_url": "的",
	            "node_css": null,
	            "pid": "0",
	            "child": null
	        }
    	]
    }


<br><br>

> **删除菜单项**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/DelIdMenu/token/2535bb43d3d040f4c8dc9d12NCT1SLwfHEI/node_id/9](http://www.chaorenyundong.com/?s=/admin/manager/DelIdMenu/token/2535bb43d3d040f4c8dc9d12NCT1SLwfHEI/node_id/9 "删除菜单项")

请求方式：GET

参数：   
`node_id:菜单id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
	}


<br><br>

> **修改菜单内容**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/editmenu/token/409dd822f6b93ceac8abd27d1b78750f/node_id/6](http://www.chaorenyundong.com/?s=/admin/manager/editmenu/token/409dd822f6b93ceac8abd27d1b78750f/node_id/6 "修改菜单内容")

请求方式：GET/POST

参数：   
get参数：
`node_id:菜单id`    
<br>
post参数（可选）：    
`node_name:菜单名称`   
`node_url:菜单地址`   
`node_css:菜单图标样式`   
`pid:上级菜单id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
	}

<br><br>

> **添加职位**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/addRole/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/manager/addRole/token/409dd822f6b93ceac8abd27d1b78750f "添加角色")

请求方式：POST

参数：
`$role_name:角色名称` 

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": 1
	}

<br><br>

> **新增管理员**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/addNewManager/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/manager/addNewManager/token/409dd822f6b93ceac8abd27d1b78750f "新增管理员")

请求方式：POST

参数：   
`username:用户名`   
`role:拥有的职位信息`（用英文逗号分隔的字符串）

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "user_id": 4
	    }
    }

<br><br>

> **管理员列表**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/ManagersList/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/manager/ManagersList/token/409dd822f6b93ceac8abd27d1b78750f "管理员列表")

请求方式：GET

参数：

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "1": {
	            "user_id": "1",
	            "username": "15110268175",
	            "role_name": [
	                "超级管理员"
	            ],
	            "create_time": "2017-08-15 15:57:06"
	        },
	        "2": {
	            "user_id": "2",
	            "username": "13731010152",
	            "role_name": [
	                "超级管理员",
	                "系统管理员"
	            ],
	            "create_time": "2017-08-15 15:57:06"
	        },
	        "3": {
	            "user_id": "3",
	            "username": "18222222222",
	            "role_name": [
	                "超级管理员"
	            ],
	            "create_time": "2017-08-21 15:17:46"
	        },
	        "4": {
	            "user_id": "4",
	            "username": "13666666666",
	            "role_name": [
	                "超级管理员"
	            ],
	            "create_time": "2017-08-21 15:21:38"
	        }
	    }
    }

<br><br>

> **管理员详情**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/ManagerIdInfo/token/409dd822f6b93ceac8abd27d1b78750f/user_id/2](http://www.chaorenyundong.com/?s=/admin/manager/ManagerIdInfo/token/409dd822f6b93ceac8abd27d1b78750f/user_id/2 "管理员详情")

请求方式：GET

参数：   
`user_id:管理员id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "2": {
	            "user_id": "2",
	            "username": "13731010152",
	            "role_name": [
	                "超级管理员",
	                "系统管理员"
	            ],
	            "create_time": "2017-08-15 15:57:06"
	        }
	    }
    }


<br><br>

> **管理员信息修改**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/editManagerInfo/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/manager/editManagerInfo/token/409dd822f6b93ceac8abd27d1b78750f "管理员信息修改")

请求方式：POST

参数：   
`user_id:管理员id`    
`role:管理员角色`（用英文逗号分隔的字符串）

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **管理员信息删除**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/delRoleInfo/token/409dd822f6b93ceac8abd27d1b78750f/user_id/4](http://www.chaorenyundong.com/?s=/admin/manager/delRoleInfo/token/409dd822f6b93ceac8abd27d1b78750f/user_id/4 "管理员信息删除")

请求方式：GET

参数：   
`user_id:管理员id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **管理员密码重置**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/PasswordReset/token/409dd822f6b93ceac8abd27d1b78750f/user_id/4](http://www.chaorenyundong.com/?s=/admin/manager/PasswordReset/token/409dd822f6b93ceac8abd27d1b78750f/user_id/4 "管理员密码重置")

请求方式：GET

参数：   
`user_id:管理员id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **职位列表**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/positionLists/token/fc94731595111968a6836caa7b7070c0](http://www.chaorenyundong.com/?s=/admin/manager/positionLists/token/fc94731595111968a6836caa7b7070c0 "职位列表")

请求方式：GET

参数：   

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": [
	        {
	            "role_id": "2",
	            "role_name": "超级管理员",
	            "child": [
	                {
	                    "rn_id": "1",
	                    "role_id": "2",
	                    "node_id": "1",
	                    "node_name": "主页",
	                    "node_url": "zhuye.html",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "2",
	                    "role_id": "2",
	                    "node_id": "2",
	                    "node_name": "投放效果",
	                    "node_url": "toufang.html",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "3",
	                    "role_id": "2",
	                    "node_id": "3",
	                    "node_name": "商家列表",
	                    "node_url": "shangjia.html",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "4",
	                    "role_id": "2",
	                    "node_id": "4",
	                    "node_name": "帮助与反馈",
	                    "node_url": "fankui.html",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "5",
	                    "role_id": "2",
	                    "node_id": "5",
	                    "node_name": "提现申请",
	                    "node_url": "tixian.html",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "6",
	                    "role_id": "2",
	                    "node_id": "6",
	                    "node_name": "广告管理",
	                    "node_url": "#",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "7",
	                    "role_id": "2",
	                    "node_id": "10",
	                    "node_name": "设备管理",
	                    "node_url": "#",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "8",
	                    "role_id": "2",
	                    "node_id": "13",
	                    "node_name": "管理员",
	                    "node_url": "#",
	                    "node_css": null,
	                    "pid": "0"
	                }
	            ]
	        },
	        {
	            "role_id": "3",
	            "role_name": "系统管理员",
	            "child": [
	                {
	                    "rn_id": "9",
	                    "role_id": "3",
	                    "node_id": "1",
	                    "node_name": "主页",
	                    "node_url": "zhuye.html",
	                    "node_css": null,
	                    "pid": "0"
	                },
	                {
	                    "rn_id": "10",
	                    "role_id": "3",
	                    "node_id": "2",
	                    "node_name": "投放效果",
	                    "node_url": "toufang.html",
	                    "node_css": null,
	                    "pid": "0"
	                }
	            ]
	        },
	        {
	            "role_id": "4",
	            "role_name": "系统",
	            "child": null
	        }
	    ]
    }


<br><br>

> **职位详情**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/positionIdInfo/token/fc94731595111968a6836caa7b7070c0/role_id/2](http://www.chaorenyundong.com/?s=/admin/manager/positionIdInfo/token/fc94731595111968a6836caa7b7070c0/role_id/2 "职位详情")

请求方式：GET

参数：   
`role_id:职位id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "role_id": "2",
	        "role_name": "超级管理员",
	        "child": [
	            {
	                "rn_id": "1",
	                "role_id": "2",
	                "node_id": "1",
	                "node_name": "主页",
	                "node_url": "zhuye.html",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "2",
	                "role_id": "2",
	                "node_id": "2",
	                "node_name": "投放效果",
	                "node_url": "toufang.html",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "3",
	                "role_id": "2",
	                "node_id": "3",
	                "node_name": "商家列表",
	                "node_url": "shangjia.html",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "4",
	                "role_id": "2",
	                "node_id": "4",
	                "node_name": "帮助与反馈",
	                "node_url": "fankui.html",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "5",
	                "role_id": "2",
	                "node_id": "5",
	                "node_name": "提现申请",
	                "node_url": "tixian.html",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "6",
	                "role_id": "2",
	                "node_id": "6",
	                "node_name": "广告管理",
	                "node_url": "#",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "7",
	                "role_id": "2",
	                "node_id": "10",
	                "node_name": "设备管理",
	                "node_url": "#",
	                "node_css": null,
	                "pid": "0"
	            },
	            {
	                "rn_id": "8",
	                "role_id": "2",
	                "node_id": "13",
	                "node_name": "管理员",
	                "node_url": "#",
	                "node_css": null,
	                "pid": "0"
	            }
	        ]
	    }
    }


<br><br>

> **修改职位详情**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/editIdNode/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/manager/editIdNode/token/409dd822f6b93ceac8abd27d1b78750f "修改职位详情")

请求方式：POST

参数：   
`type:1.修改职位名称2.修改权限信息`   

`type=1参数为（role_id、role_name）,type=2参数为（role_id、node），其中node为一个用英文逗号隔开的字符串`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }

<br><br>

> **权限列表**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/nodeLists/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/manager/nodeLists/token/409dd822f6b93ceac8abd27d1b78750f "权限列表")

请求方式：POST

参数：    


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": [
	        {
	            "node_id": "1",
	            "node_name": "主页",
	            "node_url": "zhuye.html",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "2",
	            "node_name": "投放效果",
	            "node_url": "toufang.html",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "3",
	            "node_name": "商家列表",
	            "node_url": "shangjia.html",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "4",
	            "node_name": "帮助与反馈",
	            "node_url": "fankui.html",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "5",
	            "node_name": "提现申请",
	            "node_url": "tixian.html",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "6",
	            "node_name": "广告管理",
	            "node_url": "#",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "10",
	            "node_name": "设备管理",
	            "node_url": "#",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "13",
	            "node_name": "管理员",
	            "node_url": "#",
	            "node_css": null,
	            "pid": "0"
	        },
	        {
	            "node_id": "19",
	            "node_name": "y",
	            "node_url": "h",
	            "node_css": null,
	            "pid": "0"
	        }
	    ]
    }


<br><br>

> **删除职位信息**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/delNodeInfo/token/ca5230f11e0076ebbc9a718bcb78b4aa/role_id/31](http://www.chaorenyundong.com/?s=/admin/manager/delNodeInfo/token/ca5230f11e0076ebbc9a718bcb78b4aa/role_id/31 "删除职位信息")

请求方式：GET

参数：   
`role_id:职位id`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **属于当前用户的权限菜单列表**

地址：[http://www.chaorenyundong.com/?s=/admin/manager/UserHaveMenuLists/token/3409cc5b6793fb2e1b8027885755338b/username/123456789](http://www.chaorenyundong.com/?s=/admin/manager/UserHaveMenuLists/token/3409cc5b6793fb2e1b8027885755338b/username/123456789 "属于当前用户的权限菜单列表")

请求方式：GET

参数：   
`username:用户名`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": [
	        {
	            "node_id": "2",
	            "node_name": "投放效果",
	            "node_url": "toufang.html",
	            "node_css": null,
	            "pid": "0",
	            "child": null
	        },
	        {
	            "node_id": "2",
	            "node_name": "投放效果",
	            "node_url": "toufang.html",
	            "node_css": null,
	            "pid": "0",
	            "child": null
	        }
	    ]
    }

<br><br>

> **商家列表**

地址：[http://www.chaorenyundong.com/?s=/admin/Shop/ShoperList/token/3409cc5b6793fb2e1b8027885755338b](http://www.chaorenyundong.com/?s=/admin/Shop/ShoperList/token/3409cc5b6793fb2e1b8027885755338b "商家列表")

请求方式：GET

参数：  

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "list": [
	            {
	                "id": "46",
	                "equipment_num": "2",
	                "money_count": "0",
	                "looking_num": "15",
	                "order_num": 0
	            },
	            {
	                "id": "55",
	                "equipment_num": "0",
	                "money_count": "0",
	                "looking_num": 0,
	                "order_num": 0
	            },
	            {
	                "id": "56",
	                "equipment_num": "0",
	                "money_count": "0",
	                "looking_num": 0,
	                "order_num": 0
	            },
	            {
	                "id": "57",
	                "equipment_num": "0",
	                "money_count": "0",
	                "looking_num": "45",
	                "order_num": "3"
	            },
	            {
	                "id": "58",
	                "equipment_num": "0",
	                "money_count": "0",
	                "looking_num": 0,
	                "order_num": 0
	            },
	            {
	                "id": "59",
	                "equipment_num": "0",
	                "money_count": "0",
	                "looking_num": 0,
	                "order_num": 0
	            }
	        ],
	        "page": "<div>    </div>"
	    }
    }


<br><br>

> **提现申请列表**

地址：[http://www.chaorenyundong.com/?s=/admin/Shop/withdrawalsLists/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/Shop/withdrawalsLists/token/409dd822f6b93ceac8abd27d1b78750f "提现申请列表")

请求方式：GET

参数：   

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "list": [
	            {
	                "w_id": "3",
	                "money": "30",
	                "create_time": "1502722723",
	                "create_ip": "113.45.68.245",
					"user_id": "46",
	                "status": "1",
	                "card_name": "工商银行(1234)",
	                "username": "共享好友1",
	                "shop_name": "xmm"
	            },
	            {
	                "w_id": "4",
	                "money": "20",
	                "create_time": "1502723478",
	                "create_ip": "113.45.68.245",
					"user_id": "46",
	                "status": "1",
	                "card_name": "工商银行(1234)",
	                "username": "共享好友1",
	                "shop_name": "xmm"
	            },
	            {
	                "w_id": "5",
	                "money": "20",
	                "create_time": "1502723512",
	                "create_ip": "113.45.68.245",
					"user_id": "46",
	                "status": "1",
	                "card_name": "工商银行(1234)",
	                "username": "共享好友1",
	                "shop_name": "xmm"
	            },
	            {
	                "w_id": "6",
	                "money": "20",
	                "create_time": "1502723821",
	                "create_ip": "113.45.68.245",
					"user_id": "46",
	                "status": "1",
	                "card_name": "工商银行(1234)",
	                "username": "共享好友1",
	                "shop_name": "xmm"
	            },
	            {
	                "w_id": "7",
	                "money": "20",
	                "create_time": "1502727693",
	                "create_ip": "113.45.68.245",
					"user_id": "46",
	                "status": "1",
	                "card_name": "工商银行(1234)",
	                "username": "共享好友1",
	                "shop_name": "xmm"
	            },
	            {
	                "w_id": "9",
	                "money": "10",
	                "create_time": "1503216460",
	                "create_ip": "113.45.59.94",
					"user_id": "46",
	                "status": "1",
	                "card_name": "民生银行(8736)",
	                "username": "共享好友63",
	                "shop_name": "gxy"
	            }
	        ],
	        "page": "<div>  <span class=\"current\">1</span><a class=\"num\" href=\"/index.php/Admin/Shop/withdrawalsLists/token/3409cc5b6793fb2e1b8027885755338b/p/2.html\">2</a><a class=\"num\" href=\"/index.php/Admin/Shop/withdrawalsLists/token/3409cc5b6793fb2e1b8027885755338b/p/3.html\">3</a> <a class=\"next\" href=\"/index.php/Admin/Shop/withdrawalsLists/token/3409cc5b6793fb2e1b8027885755338b/p/2.html\">>></a> </div>"
	    }
    }


<br><br>

> **提现列表操作**

地址：[http://www.chaorenyundong.com/?s=/admin/Shop/withdrawalsIdControl/token/409dd822f6b93ceac8abd27d1b78750f](http://www.chaorenyundong.com/?s=/admin/Shop/withdrawalsIdControl/token/409dd822f6b93ceac8abd27d1b78750f "提现列表操作")

请求方式：GET

参数：   
`type:类型(1.通过2.不通过)`    
`1的参数：w_id`    
`2的参数:w_id、user_id、money`

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **退出登录**

地址：[http://www.chaorenyundong.com/?s=/admin/index/logout](http://www.chaorenyundong.com/?s=/admin/index/logout "退出登录")

请求方式：GET

参数：

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **pad异常设备**

地址：[http://www.chaorenyundong.com/?s=/admin/Pad/PadDamage/token/3409cc5b6793fb2e1b8027885755338b](http://www.chaorenyundong.com/?s=/admin/Pad/PadDamage/token/3409cc5b6793fb2e1b8027885755338b "pad异常设备")

请求方式：GET

说明：   
故障状态1:经纬度偏移2:屏碎3:没有画面4:触摸失灵5:无法充电6:底座损坏7:充电宝功能损坏8:电源失灵9:离线   
处理状态 1:报修，2:已修，3:已换新，4:无法修复

参数：

接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "list": [
	            {
	                "fault_id": "19",   ---自增id
	                "equipment_id": "1",   ---设备id
	                "user_id": "46",   ---用户id
	                "create_time": "2017-08-15 19:18:52",   ---启动时间
	                "status": "1",   ---故障状态
	                "end_time": "2017-08-15 23:14:01",   ---故障时间
	                "type": "1",   ---处理状态
	                "operation_time": null,   ---处理时间
	                "lng": "116.425144",   ---经度
	                "lat": "40.067963"   ---纬度
	            },
	            {
	                "fault_id": "20",
	                "equipment_id": "1",
	                "user_id": "46",
	                "create_time": "2017-08-15 19:18:52",
	                "status": "1",
	                "end_time": "2017-08-15 23:14:01",
	                "type": "1",
	                "operation_time": null,
	                "lng": "116.425144",
	                "lat": "40.067963"
	            },
	            {
	                "fault_id": "21",
	                "equipment_id": "1",
	                "user_id": "46",
	                "create_time": "2017-08-15 19:18:52",
	                "status": "1",
	                "end_time": "2017-08-15 23:14:01",
	                "type": "1",
	                "operation_time": null,
	                "lng": "116.425144",
	                "lat": "40.067963"
	            },
	            {
	                "fault_id": "22",
	                "equipment_id": "1",
	                "user_id": "46",
	                "create_time": "2017-08-15 19:18:52",
	                "status": "1",
	                "end_time": "2017-08-15 23:14:01",
	                "type": "1",
	                "operation_time": null,
	                "lng": "116.425144",
	                "lat": "40.067963"
	            },
	            {
	                "fault_id": "23",
	                "equipment_id": "1",
	                "user_id": "46",
	                "create_time": "2017-08-15 19:18:52",
	                "status": "1",
	                "end_time": "2017-08-15 23:14:01",
	                "type": "1",
	                "operation_time": null,
	                "lng": "116.425144",
	                "lat": "40.067963"
	            },
	            {
	                "fault_id": "24",
	                "equipment_id": "1",
	                "user_id": "46",
	                "create_time": "2017-08-15 19:18:52",
	                "status": "1",
	                "end_time": "2017-08-15 23:14:01",
	                "type": "1",
	                "operation_time": null,
	                "lng": "116.425144",
	                "lat": "40.067963"
	            }
	        ],
	        "page": "<div>    </div>"
	    }
    }


<br><br>

> **新增轮播**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/AddNewBanner/token/3409cc5b6793fb2e1b8027885755338b](http://www.chaorenyundong.com/?s=/admin/banner/AddNewBanner/token/3409cc5b6793fb2e1b8027885755338b "新增广告")

请求方式：POST

参数：   
`html_url:页面地址`   
`banner_order:广告排序`    
`img:图片`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": 1
    }


<br><br>

> **轮播序号验证**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/OrderYz/token/3409cc5b6793fb2e1b8027885755338b/banner_order/1](http://www.chaorenyundong.com/?s=/admin/banner/OrderYz/token/3409cc5b6793fb2e1b8027885755338b/banner_order/1 "广告序号验证")

请求方式：GET

参数：    
`banner_order:广告序号`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": "验证通过"
    }

<br><br>

> **轮播详情**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/BannerInfo/token/3409cc5b6793fb2e1b8027885755338b](http://www.chaorenyundong.com/?s=/admin/banner/BannerInfo/token/3409cc5b6793fb2e1b8027885755338b "广告详情")

请求方式：GET

参数：    
`banner_order:广告序号`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "list": [
	            {
	                "id": "12",
	                "img": "http://peita.oss-cn-beijing.aliyuncs.com/question/3261488273517.png",
	                "html_url": "1",
	                "status": "1",
	                "create_time": "1488273519",
	                "update_time": "1490947682",
	                "banner_order": "2"
	            },
	            {
	                "id": "13",
	                "img": "http://peita.oss-cn-beijing.aliyuncs.com/question/884561488273540.png",
	                "html_url": "2",
	                "status": "1",
	                "create_time": "1488273540",
	                "update_time": "1490947690",
	                "banner_order": "3"
	            },
	            {
	                "id": "14",
	                "img": "http://peita.oss-cn-beijing.aliyuncs.com/question/785431488273561.png",
	                "html_url": "3",
	                "status": "1",
	                "create_time": "1488273561",
	                "update_time": "1490947700",
	                "banner_order": "4"
	            },
	            {
	                "id": "16",
	                "img": "http://peita.oss-cn-beijing.aliyuncs.com/question/663971491537303.jpg",
	                "html_url": "1",
	                "status": "1",
	                "create_time": "1491537303",
	                "update_time": null,
	                "banner_order": "5"
	            },
	            {
	                "id": "17",
	                "img": "http://peita.oss-cn-beijing.aliyuncs.com/question/439941497254594.jpg",
	                "html_url": "http://www.qinqinchong.com/partner/source/chongtaapp",
	                "status": "1",
	                "create_time": "1497254594",
	                "update_time": null,
	                "banner_order": "1"
	            }
	        ],
	        "page": "<div>    </div>"
	    }
    }


<br><br>

> **修改轮播序号排序**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/AdminOrderSave/token/3409cc5b6793fb2e1b8027885755338b/banner_order/1/id/1](http://www.chaorenyundong.com/?s=/admin/banner/AdminOrderSave/token/3409cc5b6793fb2e1b8027885755338b/banner_order/1/id/1 "修改广告序号排序")

请求方式：GET

参数：    
`banner_order:广告序号`    
`id:自增id`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **根据id查看轮播详情**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/EditBannerIdInfo/token/3409cc5b6793fb2e1b8027885755338b/id/1](http://www.chaorenyundong.com/?s=/admin/banner/EditBannerIdInfo/token/3409cc5b6793fb2e1b8027885755338b/id/1 "根据id查看广告详情")

请求方式：GET

参数：    
`id:自增id`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "id": "12",
	        "img": "http://peita.oss-cn-beijing.aliyuncs.com/question/3261488273517.png",
	        "html_url": "1",
	        "status": "1",
	        "create_time": "2017-02-28 17:18:39",
	        "update_time": "2017-02-28 17:18:39",
	        "banner_order": "2"
	    }
    }


<br><br>

> **轮播修改**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/EditBanner/token/3409cc5b6793fb2e1b8027885755338b/id/1](http://www.chaorenyundong.com/?s=/admin/banner/EditBanner/token/3409cc5b6793fb2e1b8027885755338b/id/1 "广告修改")

请求方式：GET/POST

参数：    
`id:自增id` get传值     
post传值    
`html_url:网页链接`   
`status:状态是否显示  1.显示2.不显示`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }

<br><br>

> **根据id删除轮播**

地址：[http://www.chaorenyundong.com/?s=/admin/banner/BannerIdDel/token/3409cc5b6793fb2e1b8027885755338b/id/1](http://www.chaorenyundong.com/?s=/admin/banner/BannerIdDel/token/3409cc5b6793fb2e1b8027885755338b/id/1 "广告修改")

请求方式：GET/POST

参数：    
`id:自增id` get传值


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }

<br><br>

> **异常设备列表**

地址：[http://www.chaorenyundong.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1](http://www.chaorenyundong.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1 "异常设备列表")

请求方式：GET

参数：    
`page：当前页`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "list": [
	            {
	                "abnormal_id": "1",
	                "equipment_id": "1",
	                "abmprmal_time": "2017-08-20 16:21:35",
	                "img": null,
	                "last_num": "100",
	                "before_num": "20"
	            },
	            {
	                "abnormal_id": "2",
	                "equipment_id": "1",
	                "abmprmal_time": "2017-08-20 16:21:35",
	                "img": "",
	                "last_num": "100",
	                "before_num": "20"
	            },
	            {
	                "abnormal_id": "3",
	                "equipment_id": "1",
	                "abmprmal_time": "2017-08-20 16:21:35",
	                "img": "",
	                "last_num": "100",
	                "before_num": "20"
	            },
	            {
	                "abnormal_id": "4",
	                "equipment_id": "1",
	                "abmprmal_time": "2017-08-20 16:21:35",
	                "img": "",
	                "last_num": "100",
	                "before_num": "20"
	            },
	            {
	                "abnormal_id": "5",
	                "equipment_id": "1",
	                "abmprmal_time": "2017-08-20 16:21:35",
	                "img": "",
	                "last_num": "100",
	                "before_num": "20"
	            },
	            {
	                "abnormal_id": "6",
	                "equipment_id": "1",
	                "abmprmal_time": "2017-08-20 16:21:35",
	                "img": "",
	                "last_num": "100",
	                "before_num": "20"
	            }
	        ],
	        "page": {
	            "first_page": "http://www.sharedgxf.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a1",
	            "last_page": "http://www.sharedgxf.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a4",
	            "current_page": "http://www.sharedgxf.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a1",
	            "previous_page": "http://www.sharedgxf.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a1",
	            "next_page": "http://www.sharedgxf.com/?s=/admin/pad/abnormalLists/token/b7caabc99301d9448e9bbc14fa9660a2"
	        }
	    }
    }


<br><br>

> **排除异常设备**

地址：[http://www.chaorenyundong.com/?s=/admin/pad/IdDelAbnormal/token/3409cc5b6793fb2e1b8027885755338b/id/1](http://www.chaorenyundong.com/?s=/admin/pad/IdDelAbnormal/token/3409cc5b6793fb2e1b8027885755338b/id/1 "排除异常设备")

请求方式：GET

参数：    
`id:自增id` get传值


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }

<br><br>

> **异常设备---获取图像**

地址：[http://www.chaorenyundong.com/?s=/admin/pad/AbnormalGetImg/token/3409cc5b6793fb2e1b8027885755338b/equipment_id/1](http://www.chaorenyundong.com/?s=/admin/pad/AbnormalGetImg/token/3409cc5b6793fb2e1b8027885755338b/equipment_id/1 "异常设备---获取图像")

请求方式：GET

参数：    
`equipment_id:设备id` get传值


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": "获取图像指令发送成功"
    }


<br><br>

> **异常设备---查看图像**

地址：[http://www.chaorenyundong.com/?s=/admin/pad/SeleImg/token/3409cc5b6793fb2e1b8027885755338b/id/1](http://www.chaorenyundong.com/?s=/admin/pad/SeleImg/token/3409cc5b6793fb2e1b8027885755338b/id/1 "异常设备---查看图像")

请求方式：GET     

参数：    
`id:自增id` get传值


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **广告审核列表**

地址：[http://www.chaorenyundong.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1](http://www.chaorenyundong.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1 "广告审核列表")

请求方式：GET     

说明：status（1待审核，2成功，3失败，4资金不足）

参数：    
`page:当前页` 


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": {
	        "list": [
	            {
	                "a_id": "2",
	                "user_id": "1",
	                "create_time": "2017-08-15 19:18:52",
	                "imgs": "1.jpg",
	                "video": "http://test.520m.com.cn:2000/video/f6a4a5e6bac88a0685f55f9a9f8b1914.mp4",
	                "video_img": "https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=1130600584,3885612345&fm=173&s=2A104587D643810363BC649B03008040&w=600&h=2312&img.JPEG",
	                "browser": "127",
	                "status": "2",
	                "fail_reason": null
	            },
	            {
	                "a_id": "4",
	                "user_id": "1",
	                "create_time": "2017-08-15 19:18:52",
	                "imgs": null,
	                "video": "http://test.520m.com.cn:2000/video/f23c6a70f200d1c1f43f670e2ee286bc.mp4",
	                "video_img": "http://pic.qjimage.com/ph030/high/ph1676-p00084.jpg",
	                "browser": null,
	                "status": "1",
	                "fail_reason": null
	            }
	        ],
	        "page": {
	            "first_page": "http://www.sharedgxf.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1",
	            "last_page": "http://www.sharedgxf.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1",
	            "current_page": "http://www.sharedgxf.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1",
	            "previous_page": "http://www.sharedgxf.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1",
	            "next_page": "http://www.sharedgxf.com/?s=/admin/active/AdvertisingAuditLists/token/b7caabc99301d9448e9bbc14fa9660a7&page=1"
	        }
	    }
    }

<br><br>

> **广告审核---点击查看图片详情**

地址：[http://www.chaorenyundong.com/?s=/admin/active/ImgInfo/token/b7caabc99301d9448e9bbc14fa9660a7&a_id=2](http://www.chaorenyundong.com/?s=/admin/active/ImgInfo/token/b7caabc99301d9448e9bbc14fa9660a7&a_id=2 "点击查看图片详情")

请求方式：GET     

参数：    
`a_id:自增id` 


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": [
	        "1.jpg",
	        "2.jpg",
	        "3.jpg"
	    ]
    }


<br><br>

> **广告审核---通过**

地址：[http://www.chaorenyundong.com/?s=/admin/active/activeOk/token/b7caabc99301d9448e9bbc14fa9660a7&a_id=2](http://www.chaorenyundong.com/?s=/admin/active/ImgInfo/token/b7caabc99301d9448e9bbc14fa9660a7&a_id=2 "广告审核---通过")

请求方式：GET     

参数：    
`a_id:自增id` 


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }


<br><br>

> **广告审核---不通过**

地址：[http://www.chaorenyundong.com/?s=/admin/active/activeNo/token/b7caabc99301d9448e9bbc14fa9660a7](http://www.chaorenyundong.com/?s=/admin/active/activeNo/token/b7caabc99301d9448e9bbc14fa9660a7 "*广告审核---不通过")

请求方式：POST     

参数：    
`a_id:自增id`    
`fail_reason:拒绝理由(不能为空)`


接口返回：

	{
	    "code": 20000,
	    "msg": "成功",
	    "data": null
    }