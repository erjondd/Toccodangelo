(function ($) {
    var MikadofSidebar = function () {

        this.widget_wrap = $('.widget-liquid-right, .block-editor-writing-flow');
        this.widget_area = $('#widgets-right');
        this.widget_add = $('#mkdf-add-widget');

        this.create_form();
        this.add_del_button();
        this.bind_events();
    };

    MikadofSidebar.prototype = {

        create_form: function () {
            this.widget_wrap.append(this.widget_add.html());
            this.widget_name = this.widget_wrap.find('input[name="mkdf-sidebar-widgets"]');
            this.nonce = this.widget_wrap.find('input[name="mkdf-delete-sidebar"]').val();
        },

        add_del_button: function () {

        var wrapper = this.widget_wrap.find('[data-widget-area-id*="mkdf-custom-sidebar-"]');

            if( wrapper.length ) {
                wrapper.parents( '.wp-block-widget-area' ).parent().append( '<span class="mkdf-delete-button"></span>' );
            }
        },

        add_del_button_legacy: function(){
            this.widget_area.find('.sidebar-mkdf-custom').append('<span class="mkdf-delete-button"></span>');
        },

        bind_events: function () {
            this.widget_wrap.on('click', '.mkdf-delete-button', $.proxy(this.delete_sidebar, this));
        },

        delete_sidebar: function (e) {
            var responseClick = confirm('Are you sure you want to delete this?');
            if (responseClick !== true) {
                return false;
            }

            var widget,
				title,
				widget_name,
				obj = this;

			if( this.is_block_widget ) {
				widget = $(e.currentTarget).parent();
				title = widget.find('[data-widget-area-id*="mkdf-custom-sidebar-"]');
				widget_name = $.trim(title.data('widget-area-id').replace('mkdf-custom-sidebar-', ''));
			} else {
				widget = $(e.currentTarget).parents('.widgets-holder-wrap:eq(0)');
				title = widget.find('.sidebar-name h2');
				widget_name = $.trim(title.text());
			}

            $.ajax({
                type: "POST",
                url: window.ajaxurl,
                data: {
                    action: 'mkdf_ajax_delete_custom_sidebar',
                    name: widget_name,
                    _wpnonce: obj.nonce
                },
                success: function (response) {
                    if (response === 'sidebar-deleted') {
                        widget.slideUp(200, function () {

                            $('.widget-control-remove', widget).trigger('click'); //delete all widgets inside
                            widget.remove();
                            if( ! this.is_block_widget ) {
                                wpWidgets.saveOrder();
                            }
                        });
                    }
                }
            });
        }
    };

    $(function()
	{
		setTimeout(function(){
			new MikadofSidebar();
		}, 3000);
	});
	
})(jQuery);	 