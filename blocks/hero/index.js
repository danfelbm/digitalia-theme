const { registerBlockType } = wp.blocks;
const { InspectorControls, MediaUpload, RichText } = wp.blockEditor;
const { PanelBody, TextControl, Button } = wp.components;

registerBlockType('digitalia/hero', {
    edit: function(props) {
        const { attributes, setAttributes } = props;
        const {
            subtitle,
            title,
            description,
            primaryButtonText,
            secondaryButtonText,
            backgroundImage,
            containerClasses,
            gridClasses,
            contentClasses
        } = attributes;

        return [
            wp.element.createElement(InspectorControls, { key: 'settings' },
                wp.element.createElement(PanelBody, { title: 'Layout Settings' },
                    wp.element.createElement(TextControl, {
                        label: 'Container Classes',
                        value: containerClasses,
                        onChange: (value) => setAttributes({ containerClasses: value })
                    }),
                    wp.element.createElement(TextControl, {
                        label: 'Grid Classes',
                        value: gridClasses,
                        onChange: (value) => setAttributes({ gridClasses: value })
                    }),
                    wp.element.createElement(TextControl, {
                        label: 'Content Classes',
                        value: contentClasses,
                        onChange: (value) => setAttributes({ contentClasses: value })
                    })
                )
            ),
            wp.element.createElement('section', {},
                wp.element.createElement('div', { className: containerClasses },
                    wp.element.createElement('div', { className: gridClasses },
                        wp.element.createElement('div', { className: contentClasses },
                            wp.element.createElement(RichText, {
                                tagName: 'p',
                                value: subtitle,
                                onChange: (value) => setAttributes({ subtitle: value })
                            }),
                            wp.element.createElement(RichText, {
                                tagName: 'h1',
                                className: 'my-6 text-pretty text-4xl font-bold lg:text-6xl',
                                value: title,
                                onChange: (value) => setAttributes({ title: value })
                            }),
                            wp.element.createElement(RichText, {
                                tagName: 'p',
                                className: 'mb-8 max-w-xl text-muted-foreground lg:text-xl',
                                value: description,
                                onChange: (value) => setAttributes({ description: value })
                            }),
                            wp.element.createElement('div', { className: 'flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start' },
                                wp.element.createElement(RichText, {
                                    tagName: 'button',
                                    className: 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto',
                                    value: primaryButtonText,
                                    onChange: (value) => setAttributes({ primaryButtonText: value })
                                }),
                                wp.element.createElement(RichText, {
                                    tagName: 'button',
                                    className: 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto',
                                    value: secondaryButtonText,
                                    onChange: (value) => setAttributes({ secondaryButtonText: value })
                                })
                            )
                        ),
                        wp.element.createElement('div', { className: 'relative aspect-3/4' },
                            wp.element.createElement('div', { className: 'absolute inset-0 flex items-center justify-center' },
                                wp.element.createElement(MediaUpload, {
                                    onSelect: (media) => setAttributes({ backgroundImage: media.url }),
                                    type: 'image',
                                    render: ({ open }) => (
                                        wp.element.createElement('img', {
                                            src: backgroundImage,
                                            className: 'size-full text-muted-foreground opacity-20',
                                            onClick: open,
                                            style: { cursor: 'pointer' }
                                        })
                                    )
                                })
                            )
                        )
                    )
                )
            )
        ];
    },

    save: function(props) {
        const { attributes } = props;
        const {
            subtitle,
            title,
            description,
            primaryButtonText,
            secondaryButtonText,
            backgroundImage,
            containerClasses,
            gridClasses,
            contentClasses
        } = attributes;

        return wp.element.createElement('section', {},
            wp.element.createElement('div', { className: containerClasses },
                wp.element.createElement('div', { className: gridClasses },
                    wp.element.createElement('div', { className: contentClasses },
                        wp.element.createElement(RichText.Content, {
                            tagName: 'p',
                            value: subtitle
                        }),
                        wp.element.createElement(RichText.Content, {
                            tagName: 'h1',
                            className: 'my-6 text-pretty text-4xl font-bold lg:text-6xl',
                            value: title
                        }),
                        wp.element.createElement(RichText.Content, {
                            tagName: 'p',
                            className: 'mb-8 max-w-xl text-muted-foreground lg:text-xl',
                            value: description
                        }),
                        wp.element.createElement('div', { className: 'flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start' },
                            wp.element.createElement(RichText.Content, {
                                tagName: 'button',
                                className: 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto',
                                value: primaryButtonText
                            }),
                            wp.element.createElement(RichText.Content, {
                                tagName: 'button',
                                className: 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto',
                                value: secondaryButtonText
                            })
                        )
                    ),
                    wp.element.createElement('div', { className: 'relative aspect-3/4' },
                        wp.element.createElement('div', { className: 'absolute inset-0 flex items-center justify-center' },
                            wp.element.createElement('img', {
                                src: backgroundImage,
                                className: 'size-full text-muted-foreground opacity-20'
                            })
                        )
                    )
                )
            )
        );
    }
});
