bbb.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'bbb-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('bbb_item_create'),
		width: 550,
		autoHeight: true,
		url: bbb.config.connector_url,
		action: 'mgr/Meetings/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	bbb.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(bbb.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('bbb_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('bbb_item_description'),
			name: 'description',
			id: config.id + '-description',
			height: 150,
			anchor: '99%'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('bbb_item_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('bbb-item-window-create', bbb.window.CreateItem);


bbb.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'bbb-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('bbb_item_update'),
		width: 550,
		autoHeight: true,
		url: bbb.config.connector_url,
		action: 'mgr/Meetings/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	bbb.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(bbb.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('bbb_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('bbb_item_description'),
			name: 'description',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('bbb_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('bbb-item-window-update', bbb.window.UpdateItem);