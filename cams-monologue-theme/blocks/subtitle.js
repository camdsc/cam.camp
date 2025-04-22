/**
 * Post Subtitle Block
 */
(function(blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var __ = i18n.__;
    var RichText = editor.RichText;

    blocks.registerBlockType('cams-monologue/subtitle', {
        title: __('Post Subtitle', 'cams-monologue'),
        icon: 'text',
        category: 'theme',
        attributes: {
            content: {
                type: 'string',
                source: 'html',
                selector: 'p',
            },
        },
        
        edit: function(props) {
            var content = props.attributes.content;
            
            function onChangeContent(newContent) {
                props.setAttributes({ content: newContent });
            }
            
            return el(
                'div', 
                { className: props.className },
                el(
                    RichText, 
                    {
                        tagName: 'p',
                        className: 'post-subtitle-editor',
                        value: content,
                        onChange: onChangeContent,
                        placeholder: __('Add post subtitle...', 'cams-monologue')
                    }
                )
            );
        },
        
        save: function(props) {
            var content = props.attributes.content;
            
            // Don't render anything if the subtitle is empty
            if (!content || content.trim() === '') {
                return null;
            }
            
            return el(
                RichText.Content, 
                {
                    tagName: 'p',
                    className: 'post-subtitle',
                    value: content
                }
            );
        },
    });
}(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element
)); 