{% extends 'index.volt' %}

{% block title %}首页{% endblock %}

{% block content %}
    <div class="container">
        <p>{{ flash.output() }}</p>
        <div class="page-header">
            <h1>新闻：{{ news.title }}</h1>
            <div>操作：<a href="{{ url(['for':'news.edit','news':news.id]) }}">修改</a>,<a href="{{ url(['for':'news.delete','news':news.id]) }}">删除</a></div>
        </div>
        <p>{{ news.content }}</p>

    </div>
{% endblock %}