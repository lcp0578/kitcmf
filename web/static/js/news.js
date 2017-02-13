/**
 * 
 */
console.log(JSON_URI);
$('#container').waterfall({
	itemCls: 'waterfall-item', 
	prefix: 'waterfall',
	fitWidth: true, 
	colWidth: 1000, 
	gutterWidth: 10,
	gutterHeight: 10,
	align: 'center',
	minCol: 1, 
	maxCol: undefined, 
	maxPage: undefined, 
	bufferPixel: -50, 
	containerStyle: {
		position: 'relative'
	},
	resizable: true, 
	isFadeIn: false,
	isAnimated: false,
	animationOptions: { 
	},
	isAutoPrefill: true,
	checkImagesLoaded: true,
	path: undefined,
	dataType: 'json', 
	params: {}, 
	path: function(page) {
        return JSON_URI + '?page=' + page;
    },
	loadingMsg: '<div style="text-align:center;padding:10px 0; color:#999;"><img src="data:image/gif;base64,R0lGODlhEAALAPQAAP///zMzM+Li4tra2u7u7jk5OTMzM1hYWJubm4CAgMjIyE9PT29vb6KiooODg8vLy1JSUjc3N3Jycuvr6+Dg4Pb29mBgYOPj4/X19cXFxbOzs9XV1fHx8TMzMzMzMzMzMyH5BAkLAAAAIf4aQ3JlYXRlZCB3aXRoIGFqYXhsb2FkLmluZm8AIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAEAALAAAFLSAgjmRpnqSgCuLKAq5AEIM4zDVw03ve27ifDgfkEYe04kDIDC5zrtYKRa2WQgAh+QQJCwAAACwAAAAAEAALAAAFJGBhGAVgnqhpHIeRvsDawqns0qeN5+y967tYLyicBYE7EYkYAgAh+QQJCwAAACwAAAAAEAALAAAFNiAgjothLOOIJAkiGgxjpGKiKMkbz7SN6zIawJcDwIK9W/HISxGBzdHTuBNOmcJVCyoUlk7CEAAh+QQJCwAAACwAAAAAEAALAAAFNSAgjqQIRRFUAo3jNGIkSdHqPI8Tz3V55zuaDacDyIQ+YrBH+hWPzJFzOQQaeavWi7oqnVIhACH5BAkLAAAALAAAAAAQAAsAAAUyICCOZGme1rJY5kRRk7hI0mJSVUXJtF3iOl7tltsBZsNfUegjAY3I5sgFY55KqdX1GgIAIfkECQsAAAAsAAAAABAACwAABTcgII5kaZ4kcV2EqLJipmnZhWGXaOOitm2aXQ4g7P2Ct2ER4AMul00kj5g0Al8tADY2y6C+4FIIACH5BAkLAAAALAAAAAAQAAsAAAUvICCOZGme5ERRk6iy7qpyHCVStA3gNa/7txxwlwv2isSacYUc+l4tADQGQ1mvpBAAIfkECQsAAAAsAAAAABAACwAABS8gII5kaZ7kRFGTqLLuqnIcJVK0DeA1r/u3HHCXC/aKxJpxhRz6Xi0ANAZDWa+kEAA7" alt=""><br />Loading...</div>',
	
	state: { 
		isDuringAjax: false, 
		isProcessingData: false, 
		isResizing: false,
		curPage: 1 
	},

	// callbacks
	callbacks: {
		/*
		 * loadingStart
		 * @param {Object} loading $('#waterfall-loading')
		 */
		loadingStart: function($loading) {
			$loading.show();
			//console.log('loading', 'start');
		},
		
		/*
		 * loadingFinished
		 * @param {Object} loading $('#waterfall-loading')
		 * @param {Boolean} isBeyondMaxPage
		 */
		loadingFinished: function($loading, isBeyondMaxPage) {
			if ( !isBeyondMaxPage ) {
				$loading.fadeOut();
				//console.log('loading finished');
			} else {
				//console.log('loading isBeyondMaxPage');
				$loading.remove();
			}
		},
		
		/*
		 * loadingError
		 * @param {String} xhr , "end" "error"
		 */
		loadingError: function($message, xhr) {
			$message.html('Data load faild, please try again later.');
		},
		
		/*
		 * renderData
		 * @param {String} data
		 * @param {String} dataType , "json", "jsonp", "html"
		 */
		renderData: function (data, dataType) {
			var tpl,
				template;
				
			if ( dataType === 'json' ||  dataType === 'jsonp'  ) { // json or jsonp format
				tpl = $('#waterfall-tpl').html();
				template = Handlebars.compile(tpl);
				
				return template(data);
			} else { // html format
				return data;
			}
		}
	},
	
	debug: false
});