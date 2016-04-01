{% extends 'index.volt' %}

{% block title %}新增动态{% endblock %}

{% block content %}
    <div class="container">
        <p>{{ flash.output() }}</p>
        {{ form("method": "post",'id':'edit') }}
        {% for item in form.fields %}
            <div class="form-group">
                {{ item }}:{{ form.render(item,['class':'form-control']) }}<br/>
            </div>

        {% endfor %}
        <div class="form-group">
            {{ form.render('增加',['class':'btn btn-primary form-control']) }}
        </div>
        {{ endform() }}

    </div>
{% endblock %}