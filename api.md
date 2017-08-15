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