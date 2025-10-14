(function(blocks, element, blockEditor, components, i18n) {
    const { registerBlockType } = blocks;
    const { createElement: el, Fragment } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl, Button, MediaUpload } = components;
    const { __ } = i18n;

    registerBlockType('sueno-andino/timeline-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, subtitle, backgroundImage, timelineItems } = attributes;
            const blockProps = useBlockProps();

            const addTimelineItem = () => {
                const newItems = [...timelineItems, {
                    year: '2025',
                    shortYear: '25',
                    title: 'Nuevo Hito',
                    description: 'Descripción del nuevo hito histórico',
                    color: '#d3600f'
                }];
                setAttributes({ timelineItems: newItems });
            };

            const removeTimelineItem = (index) => {
                const newItems = timelineItems.filter((_, i) => i !== index);
                setAttributes({ timelineItems: newItems });
            };

            const updateTimelineItem = (index, field, value) => {
                const newItems = [...timelineItems];
                newItems[index] = { ...newItems[index], [field]: value };
                setAttributes({ timelineItems: newItems });
            };

            return el('div', blockProps, [
                el(InspectorControls, { key: 'inspector' },
                    el(PanelBody, { title: __('Configuración General', 'sueno-andino'), initialOpen: true },
                        el(TextControl, {
                            label: __('Título Principal', 'sueno-andino'),
                            value: title,
                            onChange: (value) => setAttributes({ title: value })
                        }),
                        el(TextareaControl, {
                            label: __('Subtítulo', 'sueno-andino'),
                            value: subtitle,
                            onChange: (value) => setAttributes({ subtitle: value }),
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
                    ),
                    el(PanelBody, { title: __('Elementos del Timeline', 'sueno-andino'), initialOpen: true },
                        timelineItems.map((item, index) => 
                            el('div', { key: index, style: { marginBottom: '20px', padding: '15px', border: '1px solid #ddd', borderRadius: '8px', backgroundColor: '#f9f9f9' } },
                                el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '10px' } },
                                    el('h4', { style: { margin: 0 } }, `Hito ${index + 1}`),
                                    el(Button, {
                                        isDestructive: true,
                                        isSmall: true,
                                        onClick: () => removeTimelineItem(index)
                                    }, 'Eliminar')
                                ),
                                el(TextControl, {
                                    label: __('Año', 'sueno-andino'),
                                    value: item.year,
                                    onChange: (value) => {
                                        updateTimelineItem(index, 'year', value);
                                        updateTimelineItem(index, 'shortYear', value.slice(-2));
                                    }
                                }),
                                el(TextControl, {
                                    label: __('Título del Hito', 'sueno-andino'),
                                    value: item.title,
                                    onChange: (value) => updateTimelineItem(index, 'title', value)
                                }),
                                el(TextareaControl, {
                                    label: __('Descripción', 'sueno-andino'),
                                    value: item.description,
                                    onChange: (value) => updateTimelineItem(index, 'description', value),
                                    rows: 2
                                }),
                                el(TextControl, {
                                    label: __('Color (hex)', 'sueno-andino'),
                                    value: item.color,
                                    onChange: (value) => updateTimelineItem(index, 'color', value)
                                })
                            )
                        ),
                        el(Button, {
                            isPrimary: true,
                            onClick: addTimelineItem
                        }, __('Agregar Hito', 'sueno-andino'))
                    )
                ),
                el('div', {
                    style: {
                        background: 'linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%)',
                        minHeight: '400px',
                        padding: '40px 20px',
                        borderRadius: '12px',
                        border: '2px dashed #ddd',
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
                            zIndex: 0,
                            opacity: 0.3
                        }
                    }),
                    el('div', {
                        style: {
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            background: 'rgba(255,255,255,0.7)',
                            zIndex: 1
                        }
                    }),
                    el('div', {
                        style: {
                            position: 'relative',
                            zIndex: 2,
                            maxWidth: '800px',
                            margin: '0 auto',
                            textAlign: 'center'
                        }
                    }, [
                        el('h2', {
                            style: {
                                fontSize: '2rem',
                                fontWeight: '700',
                                color: '#2a4351',
                                margin: '0 0 15px 0',
                                fontFamily: 'Playfair Display, serif'
                            }
                        }, title),
                        el('p', {
                            style: {
                                fontSize: '1.1rem',
                                color: '#374151',
                                margin: '0 0 30px 0',
                                lineHeight: '1.6'
                            }
                        }, subtitle),
                        el('div', {
                            style: {
                                textAlign: 'left',
                                maxWidth: '600px',
                                margin: '0 auto'
                            }
                        }, timelineItems.map((item, index) =>
                            el('div', {
                                key: index,
                                style: {
                                    display: 'flex',
                                    alignItems: 'flex-start',
                                    gap: '15px',
                                    marginBottom: '20px',
                                    padding: '15px',
                                    background: 'rgba(255,255,255,0.8)',
                                    borderRadius: '8px',
                                    border: '1px solid rgba(0,0,0,0.1)'
                                }
                            }, [
                                el('div', {
                                    style: {
                                        flexShrink: 0,
                                        width: '40px',
                                        textAlign: 'center'
                                    }
                                }, [
                                    el('div', {
                                        style: {
                                            width: '30px',
                                            height: '30px',
                                            backgroundColor: item.color,
                                            borderRadius: '50%',
                                            display: 'flex',
                                            alignItems: 'center',
                                            justifyContent: 'center',
                                            color: 'white',
                                            fontWeight: '700',
                                            fontSize: '0.8rem',
                                            margin: '0 auto'
                                        }
                                    }, item.shortYear),
                                    el('div', {
                                        style: {
                                            marginTop: '5px',
                                            fontSize: '0.7rem',
                                            color: item.color,
                                            fontWeight: '600'
                                        }
                                    }, item.year)
                                ]),
                                el('div', {
                                    style: {
                                        flex: 1,
                                        paddingTop: '5px'
                                    }
                                }, [
                                    el('h3', {
                                        style: {
                                            fontSize: '1rem',
                                            fontWeight: '700',
                                            color: '#2a4351',
                                            margin: '0 0 5px 0',
                                            lineHeight: '1.3'
                                        }
                                    }, item.title),
                                    el('p', {
                                        style: {
                                            color: '#374151',
                                            lineHeight: '1.4',
                                            margin: '0',
                                            fontSize: '0.85rem'
                                        }
                                    }, item.description)
                                ])
                            ])
                        ))
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
