(function(blocks, element, blockEditor, components, i18n) {
    const { registerBlockType } = blocks;
    const { createElement: el, Fragment } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl, Button, ButtonGroup } = components;
    const { __ } = i18n;

    registerBlockType('sueno-andino/servicios-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, subtitle, services, ctaTitle, ctaDescription, ctaButton } = attributes;
            const blockProps = useBlockProps();

            const addService = () => {
                const newServices = [...services, {
                    title: 'Nuevo Servicio',
                    description: 'Descripción del nuevo servicio',
                    features: ['Característica 1', 'Característica 2'],
                    icon: '📋',
                    color: '#2a4351'
                }];
                setAttributes({ services: newServices });
            };

            const removeService = (index) => {
                const newServices = services.filter((_, i) => i !== index);
                setAttributes({ services: newServices });
            };

            const updateService = (index, field, value) => {
                const newServices = [...services];
                newServices[index] = { ...newServices[index], [field]: value };
                setAttributes({ services: newServices });
            };

            const updateServiceFeature = (serviceIndex, featureIndex, value) => {
                const newServices = [...services];
                newServices[serviceIndex].features[featureIndex] = value;
                setAttributes({ services: newServices });
            };

            const addServiceFeature = (serviceIndex) => {
                const newServices = [...services];
                newServices[serviceIndex].features.push('Nueva característica');
                setAttributes({ services: newServices });
            };

            const removeServiceFeature = (serviceIndex, featureIndex) => {
                const newServices = [...services];
                newServices[serviceIndex].features.splice(featureIndex, 1);
                setAttributes({ services: newServices });
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
                            rows: 3
                        }),
                        el(TextControl, {
                            label: __('Título CTA', 'sueno-andino'),
                            value: ctaTitle,
                            onChange: (value) => setAttributes({ ctaTitle: value })
                        }),
                        el(TextareaControl, {
                            label: __('Descripción CTA', 'sueno-andino'),
                            value: ctaDescription,
                            onChange: (value) => setAttributes({ ctaDescription: value }),
                            rows: 2
                        }),
                        el(TextControl, {
                            label: __('Texto del Botón CTA', 'sueno-andino'),
                            value: ctaButton,
                            onChange: (value) => setAttributes({ ctaButton: value })
                        })
                    ),
                    el(PanelBody, { title: __('Servicios', 'sueno-andino'), initialOpen: true },
                        services.map((service, index) => 
                            el('div', { key: index, style: { marginBottom: '20px', padding: '15px', border: '1px solid #ddd', borderRadius: '8px' } },
                                el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '10px' } },
                                    el('h4', { style: { margin: 0 } }, `Servicio ${index + 1}`),
                                    el(Button, {
                                        isDestructive: true,
                                        isSmall: true,
                                        onClick: () => removeService(index)
                                    }, 'Eliminar')
                                ),
                                el(TextControl, {
                                    label: __('Título', 'sueno-andino'),
                                    value: service.title,
                                    onChange: (value) => updateService(index, 'title', value)
                                }),
                                el(TextareaControl, {
                                    label: __('Descripción', 'sueno-andino'),
                                    value: service.description,
                                    onChange: (value) => updateService(index, 'description', value),
                                    rows: 2
                                }),
                                el(TextControl, {
                                    label: __('Icono (emoji)', 'sueno-andino'),
                                    value: service.icon,
                                    onChange: (value) => updateService(index, 'icon', value)
                                }),
                                el(TextControl, {
                                    label: __('Color', 'sueno-andino'),
                                    value: service.color,
                                    onChange: (value) => updateService(index, 'color', value)
                                }),
                                el('div', { style: { marginTop: '10px' } },
                                    el('label', { style: { display: 'block', marginBottom: '8px', fontWeight: 'bold' } }, __('Características', 'sueno-andino')),
                                    service.features.map((feature, featureIndex) =>
                                        el('div', { key: featureIndex, style: { display: 'flex', gap: '5px', marginBottom: '5px' } },
                                            el(TextControl, {
                                                value: feature,
                                                onChange: (value) => updateServiceFeature(index, featureIndex, value)
                                            }),
                                            el(Button, {
                                                isDestructive: true,
                                                isSmall: true,
                                                onClick: () => removeServiceFeature(index, featureIndex)
                                            }, '×')
                                        )
                                    ),
                                    el(Button, {
                                        isSecondary: true,
                                        isSmall: true,
                                        onClick: () => addServiceFeature(index)
                                    }, __('Agregar Característica', 'sueno-andino'))
                                )
                            )
                        ),
                        el(Button, {
                            isPrimary: true,
                            onClick: addService
                        }, __('Agregar Servicio', 'sueno-andino'))
                    )
                ),
                el('div', {
                    style: {
                        background: '#ffffff',
                        padding: '60px 20px',
                        borderRadius: '12px',
                        border: '2px dashed #ddd'
                    }
                }, [
                    el('div', {
                        style: {
                            maxWidth: '1200px',
                            margin: '0 auto',
                            textAlign: 'center'
                        }
                    }, [
                        el('h2', {
                            style: {
                                fontSize: '2.5rem',
                                fontWeight: '400',
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
                                gap: '30px',
                                marginBottom: '40px'
                            }
                        }, services.map((service, index) =>
                            el('div', {
                                key: index,
                                style: {
                                    background: service.color,
                                    borderRadius: '20px',
                                    padding: '30px',
                                    color: 'white',
                                    textAlign: 'left',
                                    position: 'relative',
                                    overflow: 'hidden'
                                }
                            }, [
                                el('div', {
                                    style: {
                                        width: '50px',
                                        height: '50px',
                                        background: 'rgba(211,96,15,0.08)',
                                        borderRadius: '15px',
                                        display: 'flex',
                                        alignItems: 'center',
                                        justifyContent: 'center',
                                        marginBottom: '20px',
                                        fontSize: '1.5rem'
                                    }
                                }, service.icon),
                                el('h3', {
                                    style: {
                                        fontSize: '1.3rem',
                                        fontWeight: '700',
                                        margin: '0 0 15px 0',
                                        fontFamily: 'Playfair Display, serif'
                                    }
                                }, service.title),
                                el('p', {
                                    style: {
                                        fontSize: '0.9rem',
                                        opacity: '0.9',
                                        margin: '0 0 20px 0',
                                        lineHeight: '1.6'
                                    }
                                }, service.description),
                                service.features && service.features.length > 0 && el('ul', {
                                    style: {
                                        listStyle: 'none',
                                        padding: '0',
                                        margin: '0 0 20px 0'
                                    }
                                }, service.features.map((feature, featureIndex) =>
                                    el('li', {
                                        key: featureIndex,
                                        style: {
                                            display: 'flex',
                                            alignItems: 'center',
                                            marginBottom: '8px',
                                            fontSize: '0.85rem',
                                            opacity: '0.8'
                                        }
                                    }, [
                                        el('span', {
                                            style: {
                                                width: '6px',
                                                height: '6px',
                                                background: '#d3600f',
                                                borderRadius: '50%',
                                                marginRight: '10px',
                                                flexShrink: '0'
                                            }
                                        }),
                                        feature
                                    ])
                                )),
                                el('button', {
                                    style: {
                                        background: 'rgba(255,255,255,0.1)',
                                        color: 'white',
                                        border: '1px solid rgba(255,255,255,0.2)',
                                        padding: '8px 16px',
                                        borderRadius: '8px',
                                        fontSize: '0.85rem',
                                        cursor: 'pointer'
                                    }
                                }, 'Conocer Más')
                            ])
                        )),
                        el('div', {
                            style: {
                                textAlign: 'center',
                                padding: '40px',
                                background: 'linear-gradient(135deg, rgba(42,67,81,0.05) 0%, rgba(211,96,15,0.05) 100%)',
                                borderRadius: '20px',
                                border: '1px solid rgba(211,96,15,0.1)'
                            }
                        }, [
                            el('h3', {
                                style: {
                                    fontSize: '1.8rem',
                                    fontWeight: '700',
                                    color: '#2a4351',
                                    margin: '0 0 15px 0',
                                    fontFamily: 'Playfair Display, serif'
                                }
                            }, ctaTitle),
                            el('p', {
                                style: {
                                    fontSize: '1rem',
                                    color: '#6b6b6b',
                                    margin: '0 0 20px 0',
                                    lineHeight: '1.6',
                                    maxWidth: '600px',
                                    marginLeft: 'auto',
                                    marginRight: 'auto'
                                }
                            }, ctaDescription),
                            el('button', {
                                style: {
                                    background: 'white',
                                    color: '#d3600f',
                                    border: 'none',
                                    padding: '12px 24px',
                                    borderRadius: '8px',
                                    fontSize: '0.9rem',
                                    fontWeight: '500',
                                    cursor: 'pointer'
                                }
                            }, ctaButton)
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

