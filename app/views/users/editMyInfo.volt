{% extends "index.volt" %}
{% block title %}
    修改个人信息
{% endblock %}

{% block content %}
    <div class="container">
        {{ flash.output() }}
        <h1>修改个人信息</h1>
        <div class="row">
            {{ form("method": "post","class":"form-horizontal","role":"form","action":url(['for':'my.saveInfo'])) }}
            {% for element in form %}
                {% if element.getName() != '修改' %}
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ element.getName() }}</label>
                        <div class="col-md-6">
                            {{ form.render(element.getName(),['class':"form-control"]) }}
                        </div>
                    </div>
                {% else %}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ form.render('修改',['class':"btn btn-primary"]) }}
                        </div>
                    </div>
                {% endif %}
            {% endfor %}
            {{ endform() }}
        </div>
    </div>
{% endblock %}
