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