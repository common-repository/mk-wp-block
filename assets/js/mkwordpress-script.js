(function() {

    tinymce.PluginManager.add('mkwordpress_block', function( editor )
    {
        var shortcodeValues = [];
        jQuery.each( shortcodes_button, function(i)
        {
            shortcodeValues.push({text: shortcodes_button[i], value:i});
        });

        editor.addButton('mkwordpress_block', {
            type: 'listbox',
            tooltip:"MK Block Shortcode",
            onselect: function(e) {
                var mkwordpress_slug = (this.text());
                
                tinyMCE.activeEditor.selection.setContent( '[mkblock slug="' + mkwordpress_slug + '" class="' + mkwordpress_slug + '"]' );
            },
            values: shortcodeValues
        });
    });
})();