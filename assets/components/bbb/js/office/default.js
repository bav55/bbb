Ext.onReady(function() {
	bbb.config.connector_url = OfficeConfig.actionUrl;

	var grid = new bbb.panel.Home();
	grid.render('office-bbb-wrapper');

	var preloader = document.getElementById('office-preloader');
	if (preloader) {
		preloader.parentNode.removeChild(preloader);
	}
});