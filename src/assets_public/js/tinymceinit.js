var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
if (typeof visina == 'undefined') {
    var visina=450;
}
tinymce.init({
    selector: 'textarea',
    height: visina,
    theme: 'modern',
    skin: 'tinymce-custom',
    // statusbar: false,
    elementpath: false,
    plugins: [
        'autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
    ],
    toolbar1: 'image | newdocument insertfile undo redo | formatselect | bold italic bullist numlist link blockquote alignleft aligncenter alignright  | template preview code',
    menubar: false,

    image_advtab: true,
    content_css: [
        // '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        bootstrapCss,
        tinymceCss,
        siteThemeCss,
        customCss
    ],
    body_class: "container-fluid",
    plugin_preview_width: x * 0.8,
    plugin_preview_height: y * 0.8,
    templates: templatesUrl,
    template_popup_width: x * 0.8,
    template_popup_height: y * 0.8,

    // forced_root_block : false,
    end_container_on_empty_block: true,

    // check code, needed to save correct image path
    wpautop: true,
    apply_source_formatting: true,
    extended_valid_elements: "article[*],aside[*],audio[*],canvas[*],command[*],datalist[*],details[*],embed[*],figcaption[*],figure[*],footer[*],header[*],hgroup[*],keygen[*],mark[*],meter[*],nav[*],output[*],progress[*],section[*],source[*],summary,time[*],video[*],wbr",
    remove_linebreaks: true,
    gecko_spellcheck: true,
    keep_styles: false,
    entities: "38,amp,60,lt,62,gt",
    accessibility_focus: true,
    paste_remove_styles: true,
    paste_remove_spans: true,
    paste_strip_class_attributes: "all",
    paste_text_use_dialog: true,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: false,
    media_strict: false,
    automatic_uploads: false,
    // end check code

    file_browser_callback: function (field_name, url, type, win) {

        var cmsURL = API.Data.base_url + '/laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: 'Filemanager',
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no"
        });
    }
});