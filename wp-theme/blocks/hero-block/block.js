(function(blocks, element, blockEditor, components, i18n) {
    const { registerBlockType } = blocks;
    const { createElement: el } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl, MediaUpload, Button } = components;
    const { __ } = i18n;

    registerBlockType('sueno-andino/hero-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, subtitle, backgroundImage, buttonText, leadMagnetText, leadMagnetTitle, leadMagnetDescription } = attributes;
            const blockProps = useBlockProps();

            return el('div', blockProps, [
                el(InspectorControls, { key: 'inspector' },
                    el(PanelBody, { title: __('Configuración del Hero', 'sueno-andino'), initialOpen: true },
                        el(TextControl, {
                            label: __('Título Principal', 'sueno-andino'),
                            value: title,
                            onChange: (value) => setAttributes({ title: value })
                        }),
                        el(TextareaControl, {
                            label: __('Subtítulo', 'sueno-andino'),
                            value: subtitle,
                            onChange: (value) => setAttributes({ subtitle: value }),
                            rows: 3
                        }),
                        el(TextControl, {
                            label: __('Texto del Botón Principal', 'sueno-andino'),
                            value: buttonText,
                            onChange: (value) => setAttributes({ buttonText: value })
                        }),
                        el(TextControl, {
                            label: __('Texto del Botón Lead Magnet', 'sueno-andino'),
                            value: leadMagnetText,
                            onChange: (value) => setAttributes({ leadMagnetText: value })
                        }),
                        el(TextControl, {
                            label: __('Título del Modal', 'sueno-andino'),
                            value: leadMagnetTitle,
                            onChange: (value) => setAttributes({ leadMagnetTitle: value })
                        }),
                        el(TextareaControl, {
                            label: __('Descripción del Modal', 'sueno-andino'),
                            value: leadMagnetDescription,
                            onChange: (value) => setAttributes({ leadMagnetDescription: value }),
                            rows: 2
                        }),
                        el('div', { style: { marginTop: '20px' } },
                            el('label', { style: { display: 'block', marginBottom: '8px', fontWeight: 'bold' } }, __('Imagen de Fondo', 'sueno-andino')),
                            el(MediaUpload, {
                                onSelect: (media) => setAttributes({ backgroundImage: media.url }),
                                allowedTypes: ['image'],
                                value: backgroundImage,
                                render: ({ open }) => el(Button, {
                                    onClick: open,
                                    variant: 'secondary',
                                    style: { width: '100%' }
                                }, backgroundImage ? __('Cambiar Imagen', 'sueno-andino') : __('Seleccionar Imagen', 'sueno-andino'))
                            }),
                            backgroundImage && el('img', {
                                src: backgroundImage,
                                style: { width: '100%', height: 'auto', marginTop: '10px', borderRadius: '4px' }
                            })
                        )
                    )
                ),
                el('div', {
                    style: {
                        background: 'linear-gradient(135deg, #2a4351 0%, #1e3a47 100%)',
                        minHeight: '400px',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        color: 'white',
                        textAlign: 'center',
                        padding: '40px 20px',
                        position: 'relative',
                        overflow: 'hidden'
                    }
                }, [
                    backgroundImage && el('img', {
                        src: backgroundImage,
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            width: '100%',
                            height: '100%',
                            objectFit: 'cover',
                            zIndex: 0
                        }
                    }),
                    el('div', {
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            background: 'linear-gradient(135deg, rgba(42,67,81,0.7) 0%, rgba(30,58,71,0.6) 100%)',
                            zIndex: 1
                        }
                    }),
                    el('div', {
                        style: {
                            position: 'relative',
                            zIndex: 2,
                            maxWidth: '800px'
                        }
                    }, [
                        el('h1', {
                            style: {
                                fontSize: '2.5rem',
                                fontWeight: '800',
                                margin: '0 0 20px 0',
                                textShadow: '0 4px 8px rgba(0,0,0,0.3)'
                            }
                        }, title),
                        el('p', {
                            style: {
                                fontSize: '1.2rem',
                                lineHeight: '1.6',
                                margin: '0 0 30px 0',
                                opacity: '0.95',
                                textShadow: '0 2px 4px rgba(0,0,0,0.3)'
                            }
                        }, subtitle),
                        el('div', {
                            style: {
                                display: 'flex',
                                gap: '20px',
                                justifyContent: 'center',
                                flexWrap: 'wrap'
                            }
                        }, [
                            el('button', {
                                style: {
                                    background: 'linear-gradient(135deg, #d3600f 0%, #c16134 100%)',
                                    color: 'white',
                                    padding: '12px 24px',
                                    border: 'none',
                                    borderRadius: '8px',
                                    fontWeight: '700',
                                    cursor: 'pointer'
                                }
                            }, buttonText),
                            el('button', {
                                style: {
                                    background: 'linear-gradient(135deg, #2a4351 0%, #1e3a47 100%)',
                                    color: 'white',
                                    padding: '12px 24px',
                                    border: '2px solid rgba(255,255,255,0.2)',
                                    borderRadius: '8px',
                                    fontWeight: '700',
                                    cursor: 'pointer'
                                }
                            }, leadMagnetText)
                        ])
                    ])
                ])
            ]);
        },

        save: function() {
            // El bloque se renderiza desde PHP
            return null;
        }
    });
})(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.i18n
);

