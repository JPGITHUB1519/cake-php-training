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

        getArticles: function(renderCallback) {
            $.ajax({
                "url": getBlogApiUrl("articles"),
                "type": "get"
            })
            .done(function(data) {
                renderCallback(data);
            });
        },

        getArticleById: function($id) {
            $.ajax({
                "url": getBlogApiUrl("articles/" + $id),
                "type": "get"
            })
            .done(function(data) {
                console.log(data);
            });
        },

        getUsers: function() {
            $.ajax({
                "url": getBlogApiUrl("users"),
                "type": "get"
            })
            .done(function(data) {
                console.log(data);
            });
        }
    }

    var articlesView = {
        init: function() {
          this.template =  $("#articles-template").html();
          this.articlesContainer = $("#articles-container");
          controller.getArticleById(10);
          this.render();
        },

        render: function(data) {
            // pass a render callback function to the controller
            controller.getArticles(this.renderPost.bind(this));
        },

        renderPost: function(data) {
            var template = Handlebars.compile(this.template);
            var context = {
                "articles": data.data
            }

            var compiledTemplate = template(context);
            this.articlesContainer.html(compiledTemplate);
        }
    }

    controller.init();
});

