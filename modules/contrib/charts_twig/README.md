# Introduction

This module allows you to render a chart using Twig. Note that when
adding the Twig into a View, the necessary charting libraries will
be stripped and the chart will not display until the JavaScript files
are already present on the page. Here's an example:

======

        {% set title = 'The Chart Title' %}
        {% set data = [10, 20, 30] %}
        {%
          set series = {
            'my_series' : {
              'title' : 'What is being plotted',
              'data' : data
            }
          }
        %}
        {%
          set xaxis = {
            'title' : 'X-Axis Label',
            'labels' : ['a', 'b', 'c']
          }
        %}
        {{ chart('my_twig_chart', 'column', title, series, xaxis, [], []) }}

======

This assumes that the Charts module has been enabled, that at least one
charting provider has been enabled, and that the Charts Default Settings
have been set.
