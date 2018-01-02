$(function () {
    var BlogApiConfig = {
        "url": "http://localhost:8070/api" ,
        "version": "v1",
        "format": "json"
    }


    function getBlogApiUrl(endpoint)
    {
        return BlogApiConfig.url + "/" + BlogApiConfig.version + "/" + endpoint + ".json";
    }


    var controller = {
        init: function() {
            articlesView.init();
        },

        getArticles: function() {
            $.ajax({
                "url": getBlogApiUrl("articles"),
                "type": "get"
            })
            .done(function(data) {
                articlesView.render(data);
            });
        }
    }

    var articlesView = {
        init: function() {
          this.template =  $("#articles-template").html();
          this.articlesContainer = $("#articles-container");

          this.render();
        },

        render: function(data) {
            $.get(getBlogApiUrl("articles"), function(data) {
                var template = Handlebars.compile(this.template);
                var context = {
                    "articles": data.data
                }

                var compiledTemplate = template(context);
                this.articlesContainer.html(compiledTemplate);
            }.bind(this));
            // controller.getArticles();
        }
    }

    controller.init();
});

