{% extends 'index.volt' %}

{% block title %}首页{% endblock %}

{% block content %}
    <div class="container">
        <div class="page-header">
            <h1>新闻：{{ news.title }}</h1>
        </div>
        <p>{{ news.content }}</p>

    </div>
{% endblock %}