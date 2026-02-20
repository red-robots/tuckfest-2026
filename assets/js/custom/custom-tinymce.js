(function() {
  tinymce.PluginManager.add( 'ctabutton', function( editor, url ) {
      //console.log(url);
      var parts = url.split('assets');
      var themeURL = parts[0];
      
      // Add Button to Visual Editor Toolbar
      editor.addButton('edbutton1', {
          title: 'Button Dark Orange',
          cmd: 'edbutton1',
          image: themeURL + 'assets/images/custom-button.png',
      });

      // Add Command when Button Clicked
      editor.addCommand('edbutton1', function() {
        var selected_text = editor.selection.getContent();
        if ( selected_text.length === 0 ) {
            alert( 'Please select some text.' );
            return;
        }
        var open_column = '<span class="custom-button-element"><a data-mce-href="#" href="#"  data-mce-selected="inline-boundary" class="button-yellow">';
        var close_column = '</a></span>';
        var return_text = '';
        return_text = open_column + selected_text + close_column;
        editor.execCommand('mceReplaceContent', false, return_text);
        return;
      });
  });

})();