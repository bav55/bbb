bbb.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'bbb-panel-home', renderTo: 'bbb-panel-home-div'
		}]
	});
	bbb.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(bbb.page.Home, MODx.Component);
Ext.reg('bbb-page-home', bbb.page.Home);