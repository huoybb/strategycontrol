{% extends "index.volt" %}
{% block title %}
    个人信息
{% endblock %}

{% block content %}
    <div class="container">
        {{ flash.output() }}
        <h1>我的个人信息</h1>
        <div>操作：<a href="{{ url(['for':'my.editInfo']) }}">修改</a></div>
        <div class="row">
            <table class="table table-hover table-layout:fixed">
                {% for key,value in user.getInfo() %}
                    <tr>
                        <td>{{ key }}</td>
                        <td>{{ value }}</td>
                    </tr>
                {% endfor %}
            </table>
        </div>
    </div>
{% endblock %}
