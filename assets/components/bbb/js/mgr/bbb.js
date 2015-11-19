var bbb = function (config) {
	config = config || {};
	bbb.superclass.constructor.call(this, config);
};
Ext.extend(bbb, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('bbb', bbb);

bbb = new bbb();