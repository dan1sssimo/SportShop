<<<<<<< HEAD
/* Flot plugin for plotting textual data or subcategories.
=======
/* Flot plugin for plotting textual data or categories.
>>>>>>> origin/prelast

Copyright (c) 2007-2014 IOLA and Ole Laursen.
Licensed under the MIT license.

Consider a dataset like [["February", 34], ["March", 20], ...]. This plugin
allows you to plot such a dataset directly.

<<<<<<< HEAD
To enable it, you must specify mode: "subcategories" on the axis with the textual
labels, e.g.

	$.plot("#placeholder", data, { xaxis: { mode: "subcategories" } });

By default, the labels are ordered as they are met in the data series. If you
need a different ordering, you can specify "subcategories" on the axis options
and list the subcategories there:

	xaxis: {
		mode: "subcategories",
		subcategories: ["February", "March", "April"]
	}

If you need to customize the distances between the subcategories, you can specify
"subcategories" as an object mapping labels to values

	xaxis: {
		mode: "subcategories",
		subcategories: { "February": 1, "March": 3, "April": 4 }
	}

If you don't specify all subcategories, the remaining subcategories will be numbered
=======
To enable it, you must specify mode: "categories" on the axis with the textual
labels, e.g.

	$.plot("#placeholder", data, { xaxis: { mode: "categories" } });

By default, the labels are ordered as they are met in the data series. If you
need a different ordering, you can specify "categories" on the axis options
and list the categories there:

	xaxis: {
		mode: "categories",
		categories: ["February", "March", "April"]
	}

If you need to customize the distances between the categories, you can specify
"categories" as an object mapping labels to values

	xaxis: {
		mode: "categories",
		categories: { "February": 1, "March": 3, "April": 4 }
	}

If you don't specify all categories, the remaining categories will be numbered
>>>>>>> origin/prelast
from the max value plus 1 (with a spacing of 1 between each).

Internally, the plugin works by transforming the input data through an auto-
generated mapping where the first category becomes 0, the second 1, etc.
Hence, a point like ["February", 34] becomes [0, 34] internally in Flot (this
is visible in hover and click events that return numbers rather than the
category labels). The plugin also overrides the tick generator to spit out the
<<<<<<< HEAD
subcategories as ticks instead of the values.

If you need to map a value back to its label, the mapping is always accessible
as "subcategories" on the axis object, e.g. plot.getAxes().xaxis.subcategories.
=======
categories as ticks instead of the values.

If you need to map a value back to its label, the mapping is always accessible
as "categories" on the axis object, e.g. plot.getAxes().xaxis.categories.
>>>>>>> origin/prelast

*/

(function ($) {
    var options = {
        xaxis: {
            categories: null
        },
        yaxis: {
            categories: null
        }
    };
<<<<<<< HEAD

    function processRawData(plot, series, data, datapoints) {
        // if subcategories are enabled, we need to disable
=======
    
    function processRawData(plot, series, data, datapoints) {
        // if categories are enabled, we need to disable
>>>>>>> origin/prelast
        // auto-transformation to numbers so the strings are intact
        // for later processing

        var xCategories = series.xaxis.options.mode == "categories",
            yCategories = series.yaxis.options.mode == "categories";
<<<<<<< HEAD

=======
        
>>>>>>> origin/prelast
        if (!(xCategories || yCategories))
            return;

        var format = datapoints.format;

        if (!format) {
            // FIXME: auto-detection should really not be defined here
            var s = series;
            format = [];
            format.push({ x: true, number: true, required: true });
            format.push({ y: true, number: true, required: true });

            if (s.bars.show || (s.lines.show && s.lines.fill)) {
                var autoscale = !!((s.bars.show && s.bars.zero) || (s.lines.show && s.lines.zero));
                format.push({ y: true, number: true, required: false, defaultValue: 0, autoscale: autoscale });
                if (s.bars.horizontal) {
                    delete format[format.length - 1].y;
                    format[format.length - 1].x = true;
                }
            }
<<<<<<< HEAD

=======
            
>>>>>>> origin/prelast
            datapoints.format = format;
        }

        for (var m = 0; m < format.length; ++m) {
            if (format[m].x && xCategories)
                format[m].number = false;
<<<<<<< HEAD

=======
            
>>>>>>> origin/prelast
            if (format[m].y && yCategories)
                format[m].number = false;
        }
    }

    function getNextIndex(categories) {
        var index = -1;
<<<<<<< HEAD

=======
        
>>>>>>> origin/prelast
        for (var v in categories)
            if (categories[v] > index)
                index = categories[v];

        return index + 1;
    }

    function categoriesTickGenerator(axis) {
        var res = [];
        for (var label in axis.categories) {
            var v = axis.categories[label];
            if (v >= axis.min && v <= axis.max)
                res.push([v, label]);
        }

        res.sort(function (a, b) { return a[0] - b[0]; });

        return res;
    }
<<<<<<< HEAD

    function setupCategoriesForAxis(series, axis, datapoints) {
        if (series[axis].options.mode != "categories")
            return;

=======
    
    function setupCategoriesForAxis(series, axis, datapoints) {
        if (series[axis].options.mode != "categories")
            return;
        
>>>>>>> origin/prelast
        if (!series[axis].categories) {
            // parse options
            var c = {}, o = series[axis].options.categories || {};
            if ($.isArray(o)) {
                for (var i = 0; i < o.length; ++i)
                    c[o[i]] = i;
            }
            else {
                for (var v in o)
                    c[v] = o[v];
            }
<<<<<<< HEAD

=======
            
>>>>>>> origin/prelast
            series[axis].categories = c;
        }

        // fix ticks
        if (!series[axis].options.ticks)
            series[axis].options.ticks = categoriesTickGenerator;

        transformPointsOnAxis(datapoints, axis, series[axis].categories);
    }
<<<<<<< HEAD

=======
    
>>>>>>> origin/prelast
    function transformPointsOnAxis(datapoints, axis, categories) {
        // go through the points, transforming them
        var points = datapoints.points,
            ps = datapoints.pointsize,
            format = datapoints.format,
            formatColumn = axis.charAt(0),
            index = getNextIndex(categories);

        for (var i = 0; i < points.length; i += ps) {
            if (points[i] == null)
                continue;
<<<<<<< HEAD

=======
            
>>>>>>> origin/prelast
            for (var m = 0; m < ps; ++m) {
                var val = points[i + m];

                if (val == null || !format[m][formatColumn])
                    continue;

                if (!(val in categories)) {
                    categories[val] = index;
                    ++index;
                }
<<<<<<< HEAD

=======
                
>>>>>>> origin/prelast
                points[i + m] = categories[val];
            }
        }
    }

    function processDatapoints(plot, series, datapoints) {
        setupCategoriesForAxis(series, "xaxis", datapoints);
        setupCategoriesForAxis(series, "yaxis", datapoints);
    }

    function init(plot) {
        plot.hooks.processRawData.push(processRawData);
        plot.hooks.processDatapoints.push(processDatapoints);
    }
<<<<<<< HEAD

=======
    
>>>>>>> origin/prelast
    $.plot.plugins.push({
        init: init,
        options: options,
        name: 'categories',
        version: '1.0'
    });
})(jQuery);
