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