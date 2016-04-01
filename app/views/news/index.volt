{% extends 'index.volt' %}

{% block title %}新闻首页{% endblock %}

{% block content %}
    <div class="container">
        <div class="page-header">
            <h1>最新新闻</h1>
            <div>操作：<a href="{{ url(['for':'news.add']) }}">新增</a></div>
        </div>
        {% for n in news %}
            <h2><a href="{{ url(['for':'news.show','news':n.id]) }}">{{ n.title }}</a> </h2>
            <p>{{ n.content }}</p>
        {% endfor %}
    </div>
{% endblock %}