$(function() {
	
	var app = {
		init: function() {
			this.handler();
			app.toMain();
			if(location.pathname.match(/\/news\/\d/)) {
				var id = location.pathname.match(/\d/);
				if(id != undefined) {
					app.getData(id);
				}
			}
		},
		handler: function() {
			$('.news-item a').click(function(e) {
				e.preventDefault();
				var href = $(this).attr("href");
				var itemId = $(this).data('id');
				app.getData(itemId);
				app.urlChange(href);
			});
		},
		getData: function(itemId) {
			var query = $.getJSON('/ajax/ajax.php?id=' + itemId, function(data) {
				app.renderTemplate(data);
			}, function() {
				alert('Не удалось найти новость')
			});
		},
		urlChange: function(el) {
			history.pushState({path: el}, '', el);
			console.log(history.state);
		},
		renderTemplate: function(data) {
			var source   = $("#news-view-template").html();
			var template = Handlebars.compile(source);
			$('.news-list').hide();
			$('.news-full').show();
			$('.news-full-content').html(template(data));
		},
		toMain: function() {
			window.addEventListener('popstate', function(e) {
				
				if(typeof e.state.path == 'string') {
					app.getData(e.state.path.match(/\d/));
					app.renderTemplate();
				} else {
					$('.news-full').hide();
					$('.news-list').show();
				}
			});

		},

	}

	app.init();
});