{% extends "index.volt" %}
{% block title %}
    员工管理
{% endblock %}

{% block content %}
    <div class="container">
        {{ flash.output() }}
        <div class="row">
            <div>创建新用户：<a href="{{ url(['for':'users.add']) }}">创建</a></div>
            <table class="table table-hover table-layout:fixed">
                <tr>
                    <th>#</th>
                    <th>姓名</th>
                    <th>邮件</th>
                    <th>创建时间</th>
                    <th>角色</th>
                    <th>状态</th>
                    <th colspan="3">操作</th>
                </tr>
                {% for user in users %}
                <tr>
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                    <td>{{ user.role }}</td>
                    <td>{{ user.status }}</td>
                    <td><a href="{{ url(['for':'users.edit','user':user.id]) }}">修改</a></td>
                    <td><a href="#">删除</a></td>
                    <td><a href="#">发送密码遗忘邮件</a></td>
                </tr>
                {% endfor %}
            </table>
        </div>
    </div>
{% endblock %}
