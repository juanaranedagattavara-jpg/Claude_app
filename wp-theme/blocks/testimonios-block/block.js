(function(blocks, element, blockEditor, components, i18n) {
    const { registerBlockType } = blocks;
    const { createElement: el, Fragment } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl, Button, MediaUpload } = components;
    const { __ } = i18n;

    registerBlockType('sueno-andino/testimonios-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, subtitle, backgroundImage, testimonios } = attributes;
            const blockProps = useBlockProps();

            const addTestimonio = () => {
                const newTestimonios = [...testimonios, {
                    statistic: '100%',
                    statisticLabel: 'de satisfacción',
                    title: 'Nuevo Testimonio',
                    quote: 'Descripción del testimonio...',
                    author: 'Nombre del Autor',
                    position: 'Cargo o Posición',
                    color: '#d3600f'
                }];
                setAttributes({ testimonios: newTestimonios });
            };

            const removeTestimonio = (index) => {
                const newTestimonios = testimonios.filter((_, i) => i !== index);
                setAttributes({ testimonios: newTestimonios });
            };

            const updateTestimonio = (index, field, value) => {
                const newTestimonios = [...testimonios];
                newTestimonios[index] = { ...newTestimonios[index], [field]: value };
                setAttributes({ testimonios: newTestimonios });
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
                    el(PanelBody, { title: __('Testimonios', 'sueno-andino'), initialOpen: true },
                        testimonios.map((testimonio, index) => 
                            el('div', { key: index, style: { marginBottom: '20px', padding: '15px', border: '1px solid #ddd', borderRadius: '8px', backgroundColor: '#f9f9f9' } },
                                el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '10px' } },
                                    el('h4', { style: { margin: 0 } }, `Testimonio ${index + 1}`),
                                    el(Button, {
                                        isDestructive: true,
                                        isSmall: true,
                                        onClick: () => removeTestimonio(index)
                                    }, 'Eliminar')
                                ),
                                el(TextControl, {
                                    label: __('Estadística', 'sueno-andino'),
                                    value: testimonio.statistic,
                                    onChange: (value) => updateTestimonio(index, 'statistic', value)
                                }),
                                el(TextControl, {
                                    label: __('Etiqueta de Estadística', 'sueno-andino'),
                                    value: testimonio.statisticLabel,
                                    onChange: (value) => updateTestimonio(index, 'statisticLabel', value)
                                }),
                                el(TextControl, {
                                    label: __('Título del Caso', 'sueno-andino'),
                                    value: testimonio.title,
                                    onChange: (value) => updateTestimonio(index, 'title', value)
                                }),
                                el(TextareaControl, {
                                    label: __('Cita del Testimonio', 'sueno-andino'),
                                    value: testimonio.quote,
                                    onChange: (value) => updateTestimonio(index, 'quote', value),
                                    rows: 3
                                }),
                                el(TextControl, {
                                    label: __('Nombre del Autor', 'sueno-andino'),
                                    value: testimonio.author,
                                    onChange: (value) => updateTestimonio(index, 'author', value)
                                }),
                                el(TextControl, {
                                    label: __('Cargo/Posición', 'sueno-andino'),
                                    value: testimonio.position,
                                    onChange: (value) => updateTestimonio(index, 'position', value)
                                }),
                                el(TextControl, {
                                    label: __('Color (hex)', 'sueno-andino'),
                                    value: testimonio.color,
                                    onChange: (value) => updateTestimonio(index, 'color', value)
                                })
                            )
                        ),
                        el(Button, {
                            isPrimary: true,
                            onClick: addTestimonio
                        }, __('Agregar Testimonio', 'sueno-andino'))
                    )
                ),
                el('div', {
                    style: {
                        background: 'linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%)',
                        padding: '60px 20px',
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
                            background: 'linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,249,250,0.8) 100%)',
                            zIndex: 1
                        }
                    }),
                    el('div', {
                        style: {
                            position: 'relative',
                            zIndex: 2,
                            maxWidth: '1200px',
                            margin: '0 auto',
                            textAlign: 'center'
                        }
                    }, [
                        el('h2', {
                            style: {
                                fontSize: '2.5rem',
                                fontWeight: '700',
                                color: '#2a4351',
                                margin: '0 0 20px 0',
                                fontFamily: 'Playfair Display, serif'
                            }
                        }, title),
                        el('p', {
                            style: {
                                fontSize: '1.2rem',
                                color: '#6b6b6b',
                                margin: '0 0 40px 0',
                                lineHeight: '1.6',
                                maxWidth: '800px',
                                marginLeft: 'auto',
                                marginRight: 'auto'
                            }
                        }, subtitle),
                        el('div', {
                            style: {
                                display: 'grid',
                                gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
                                gap: '20px'
                            }
                        }, testimonios.map((testimonio, index) =>
                            el('div', {
                                key: index,
                                style: {
                                    background: 'white',
                                    borderRadius: '12px',
                                    padding: '20px',
                                    boxShadow: '0 10px 30px rgba(0,0,0,0.1)',
                                    border: '1px solid #f3f4f6',
                                    transition: 'all 0.3s ease'
                                }
                            }, [
                                el('div', {
                                    style: {
                                        textAlign: 'center',
                                        marginBottom: '15px'
                                    }
                                }, [
                                    el('div', {
                                        style: {
                                            width: '50px',
                                            height: '50px',
                                            background: `linear-gradient(135deg, ${testimonio.color} 0%, ${testimonio.color} 100%)`,
                                            borderRadius: '50%',
                                            display: 'flex',
                                            alignItems: 'center',
                                            justifyContent: 'center',
                                            margin: '0 auto 10px auto',
                                            color: 'white',
                                            fontWeight: '700',
                                            fontSize: '1.1rem'
                                        }
                                    }, testimonio.statistic),
                                    el('h3', {
                                        style: {
                                            fontSize: '1.3rem',
                                            fontWeight: '700',
                                            color: '#2a4351',
                                            margin: '0 0 5px 0'
                                        }
                                    }, testimonio.title),
                                    el('p', {
                                        style: {
                                            color: '#d3600f',
                                            fontWeight: '600',
                                            fontSize: '0.8rem',
                                            textTransform: 'uppercase',
                                            letterSpacing: '0.1em',
                                            margin: '0'
                                        }
                                    }, testimonio.statisticLabel)
                                ]),
                                el('blockquote', {
                                    style: {
                                        color: '#6b7280',
                                        lineHeight: '1.6',
                                        margin: '0 0 15px 0',
                                        fontStyle: 'italic',
                                        textAlign: 'center',
                                        fontSize: '0.9rem'
                                    }
                                }, `"${testimonio.quote}"`),
                                el('div', {
                                    style: {
                                        borderTop: '1px solid #f3f4f6',
                                        paddingTop: '10px',
                                        textAlign: 'center'
                                    }
                                }, [
                                    el('div', {
                                        style: {
                                            fontWeight: '600',
                                            color: '#2a4351',
                                            fontSize: '0.9rem'
                                        }
                                    }, testimonio.author),
                                    el('div', {
                                        style: {
                                            fontSize: '0.8rem',
                                            color: '#6b7280'
                                        }
                                    }, testimonio.position)
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
