Apnet Layout Bundle
===================

[![Travis-ci status](https://travis-ci.org/apnet/LayoutBundle.png?branch=master)](https://travis-ci.org/apnet/LayoutBundle/) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/deebbaed-eaff-46ef-a648-332bdf4cf58a/mini.png)](https://insight.sensiolabs.com/projects/deebbaed-eaff-46ef-a648-332bdf4cf58a)

Base layout template bundled with [Bootstrap](https://github.com/apnet/bootstrap), [jQuery](https://github.com/apnet/jquery) and [html5shiv](https://github.com/apnet/html5shiv)

Installation
------------

Add requirements to composer.json:

``` json
{
  "require" : {
    "apnet/layout-bundle" : "~3.0"
  }
}
```

Configurations
--------------

Register `ApnetAsseticImporterBundle` and `ApnetLayoutBundle` bundles in the `AppKernel.php` file

``` php
// ...other bundles ...
$bundles[] = new Apnet\AsseticImporterBundle\ApnetAsseticImporterBundle();
$bundles[] = new Apnet\LayoutBundle\ApnetLayoutBundle();
```

Twig
----

Use [ApnetLayoutBundle::body.html.twig](https://github.com/apnet/LayoutBundle/blob/master/src/Apnet/LayoutBundle/Resources/views/body.html.twig) as a parent for all your layout twig templates

``` twig
{% extends "ApnetLayoutBundle::body.html.twig" %}

{% block title %}LayoutBundle{% endblock %}

{% block stylesheets_core %}
    {{ parent() }}

    <link href="{{ imported_asset('...css') }}" rel="stylesheet" type="text/css" />
{% endblock %}

{% block body_core %}
    <div class="container">
        ...
    </div>
{% endblock %}

{% block javascripts_core %}
    {{ parent() }}

    <script type="text/javascript" src="{{ imported_asset('...js') }}"></script>
{% endblock %}
```
