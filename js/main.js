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
			$('.news-item a').click(function() {
				var itemId = $(this).data('id') - 1;
				app.getData(itemId);
				return false;
			});
		},
		getData: function(itemId) {
			$.getJSON('/ajax/ajax.php?id=' + itemId, function(data) {
				app.urlChange(itemId);
				app.renderTemplate(data);
			});
		},
		urlChange: function(id) {

			history.pushState({param: 'Value'}, '', '/news/' + id);
		},
		renderTemplate: function(data) {
			var source   = $("#news-view-template").html();
			var template = Handlebars.compile(source);
			$('.news-list').hide();
			$('.news-full').html(template(data));
		},
		toMain: function() {
			window.addEventListener('popstate', function(e) {
				console.log(history.state);
				if(history.state == null) {
					$('.news-list').show();
					$('.news-full').html('');
				}
			});

		},

	}

	app.init();
});