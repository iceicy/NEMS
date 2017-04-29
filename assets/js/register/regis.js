var setScript = [
	//"../../../assets/vendor/datatables/media/js/jquery.dataTables.min.js",
	//	"../../../assets/vendor/datatables/media/js/dataTables.bootstrap.js",
	"../../../assets/vendor/bootstrap-filestyle/src/bootstrap-filestyle.js",
	"../../../assets/vendor/bootstrap-wysiwyg/bootstrap-wysiwyg.js",
	"../../../assets/vendor/bootstrap-wysiwyg/external/jquery.hotkeys.js",
	"../../../assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"
];
/*======= Load Script ==========*/
$.each(setScript, function(key, url) {
	//console.log(key + ": " + url);
	if (url) {
		$.getScript(url, function() {
			//console.log('===load ====');
		});
	}
});
setTimeout(function() {
	$('.wysiwyg').wysiwyg();
	$('.calendardate').datetimepicker({
		icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-crosshairs',
			clear: 'fa fa-trash'
		},
		format: 'DD/MM/YYYY',
		ignoreReadonly: true
	});
	/*
	if (!$.fn.DataTable.isDataTable('#table_news2')) {
		$('#table_news2').dataTable({
			'paging': true, // Table pagination
			'ordering': true, // Column ordering
			'info': true, // Bottom left status text
			sAjaxSource: '../../../assets/js/register/datatable.json',
			aoColumns: [
				{
					mData: 'no'
				}, {
					mData: 'topic'
				}, {
					mData: 'priority'
				}, {
					mData: 'st_date'
				}, {
					mData: 'en_date'
				}, {
					mData: function(source, type, val) {
						var btn = '';
						btn += '<div class="pull-center">';
						btn += '<button type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;';
						btn += '<button type="button" class="btn btn-xs btn-danger"><i class="fa fa-close"></i></button>';
						btn += '</div>';
						return btn;
					}
				}
			]
		});
	}*/

}, 1000);
