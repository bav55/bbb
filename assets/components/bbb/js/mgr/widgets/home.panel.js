bbb.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'bbb-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('bbb') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('bbb_items'),
				layout: 'anchor',
				items: [{
					html: _('bbb_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'bbb-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	bbb.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(bbb.panel.Home, MODx.Panel);
Ext.reg('bbb-panel-home', bbb.panel.Home);
