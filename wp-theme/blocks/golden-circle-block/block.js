(function(blocks, element, blockEditor, components, i18n) {
    const { registerBlockType } = blocks;
    const { createElement: el } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl } = components;
    const { __ } = i18n;

    registerBlockType('sueno-andino/golden-circle-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { 
                title, subtitle, whyTitle, whyDescription, howTitle, howDescription, 
                whatTitle, whatDescription, newsletterTitle, newsletterDescription, 
                newsletterPlaceholder, newsletterButton 
            } = attributes;
            const blockProps = useBlockProps();

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
                        })
                    ),
                    el(PanelBody, { title: __('Sección ¿Por qué?', 'sueno-andino'), initialOpen: false },
                        el(TextControl, {
                            label: __('Título', 'sueno-andino'),
                            value: whyTitle,
                            onChange: (value) => setAttributes({ whyTitle: value })
                        }),
                        el(TextareaControl, {
                            label: __('Descripción', 'sueno-andino'),
                            value: whyDescription,
                            onChange: (value) => setAttributes({ whyDescription: value }),
                            rows: 3
                        })
                    ),
                    el(PanelBody, { title: __('Sección ¿Cómo?', 'sueno-andino'), initialOpen: false },
                        el(TextControl, {
                            label: __('Título', 'sueno-andino'),
                            value: howTitle,
                            onChange: (value) => setAttributes({ howTitle: value })
                        }),
                        el(TextareaControl, {
                            label: __('Descripción', 'sueno-andino'),
                            value: howDescription,
                            onChange: (value) => setAttributes({ howDescription: value }),
                            rows: 3
                        })
                    ),
                    el(PanelBody, { title: __('Sección ¿Qué?', 'sueno-andino'), initialOpen: false },
                        el(TextControl, {
                            label: __('Título', 'sueno-andino'),
                            value: whatTitle,
                            onChange: (value) => setAttributes({ whatTitle: value })
                        }),
                        el(TextareaControl, {
                            label: __('Descripción', 'sueno-andino'),
                            value: whatDescription,
                            onChange: (value) => setAttributes({ whatDescription: value }),
                            rows: 3
                        })
                    ),
                    el(PanelBody, { title: __('Newsletter', 'sueno-andino'), initialOpen: false },
                        el(TextControl, {
                            label: __('Título del Newsletter', 'sueno-andino'),
                            value: newsletterTitle,
                            onChange: (value) => setAttributes({ newsletterTitle: value })
                        }),
                        el(TextareaControl, {
                            label: __('Descripción del Newsletter', 'sueno-andino'),
                            value: newsletterDescription,
                            onChange: (value) => setAttributes({ newsletterDescription: value }),
                            rows: 2
                        }),
                        el(TextControl, {
                            label: __('Placeholder del Email', 'sueno-andino'),
                            value: newsletterPlaceholder,
                            onChange: (value) => setAttributes({ newsletterPlaceholder: value })
                        }),
                        el(TextControl, {
                            label: __('Texto del Botón', 'sueno-andino'),
                            value: newsletterButton,
                            onChange: (value) => setAttributes({ newsletterButton: value })
                        })
                    )
                ),
                el('div', {
                    style: {
                        background: 'linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%)',
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
                                fontWeight: '800',
                                color: '#2a4351',
                                margin: '0 0 20px 0'
                            }
                        }, title),
                        el('p', {
                            style: {
                                fontSize: '1.2rem',
                                color: '#666',
                                margin: '0 0 40px 0',
                                lineHeight: '1.6'
                            }
                        }, subtitle),
                        el('div', {
                            style: {
                                display: 'grid',
                                gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
                                gap: '30px',
                                marginBottom: '40px'
                            }
                        }, [
                            el('div', {
                                style: {
                                    textAlign: 'center',
                                    padding: '20px',
                                    background: 'rgba(255,255,255,0.8)',
                                    borderRadius: '12px',
                                    border: '1px solid rgba(211,96,15,0.1)',
                                    boxShadow: '0 10px 30px rgba(0,0,0,0.05)'
                                }
                            }, [
                                el('div', {
                                    style: {
                                        width: '60px',
                                        height: '60px',
                                        background: 'linear-gradient(135deg, #d3600f 0%, #c16134 100%)',
                                        borderRadius: '50%',
                                        margin: '0 auto 15px',
                                        display: 'flex',
                                        alignItems: 'center',
                                        justifyContent: 'center',
                                        fontSize: '1.5rem'
                                    }
                                }, '🎯'),
                                el('h3', {
                                    style: {
                                        fontSize: '1.3rem',
                                        fontWeight: '700',
                                        color: '#2a4351',
                                        margin: '0 0 10px 0'
                                    }
                                }, whyTitle),
                                el('p', {
                                    style: {
                                        fontSize: '0.9rem',
                                        color: '#666',
                                        lineHeight: '1.5',
                                        margin: '0'
                                    }
                                }, whyDescription)
                            ]),
                            el('div', {
                                style: {
                                    textAlign: 'center',
                                    padding: '20px',
                                    background: 'rgba(255,255,255,0.8)',
                                    borderRadius: '12px',
                                    border: '1px solid rgba(42,67,81,0.1)',
                                    boxShadow: '0 10px 30px rgba(0,0,0,0.05)'
                                }
                            }, [
                                el('div', {
                                    style: {
                                        width: '60px',
                                        height: '60px',
                                        background: 'linear-gradient(135deg, #2a4351 0%, #1e3a47 100%)',
                                        borderRadius: '50%',
                                        margin: '0 auto 15px',
                                        display: 'flex',
                                        alignItems: 'center',
                                        justifyContent: 'center',
                                        fontSize: '1.5rem'
                                    }
                                }, '⚙️'),
                                el('h3', {
                                    style: {
                                        fontSize: '1.3rem',
                                        fontWeight: '700',
                                        color: '#2a4351',
                                        margin: '0 0 10px 0'
                                    }
                                }, howTitle),
                                el('p', {
                                    style: {
                                        fontSize: '0.9rem',
                                        color: '#666',
                                        lineHeight: '1.5',
                                        margin: '0'
                                    }
                                }, howDescription)
                            ]),
                            el('div', {
                                style: {
                                    textAlign: 'center',
                                    padding: '20px',
                                    background: 'rgba(255,255,255,0.8)',
                                    borderRadius: '12px',
                                    border: '1px solid rgba(193,97,52,0.1)',
                                    boxShadow: '0 10px 30px rgba(0,0,0,0.05)'
                                }
                            }, [
                                el('div', {
                                    style: {
                                        width: '60px',
                                        height: '60px',
                                        background: 'linear-gradient(135deg, #c16134 0%, #d3600f 100%)',
                                        borderRadius: '50%',
                                        margin: '0 auto 15px',
                                        display: 'flex',
                                        alignItems: 'center',
                                        justifyContent: 'center',
                                        fontSize: '1.5rem'
                                    }
                                }, '🌟'),
                                el('h3', {
                                    style: {
                                        fontSize: '1.3rem',
                                        fontWeight: '700',
                                        color: '#2a4351',
                                        margin: '0 0 10px 0'
                                    }
                                }, whatTitle),
                                el('p', {
                                    style: {
                                        fontSize: '0.9rem',
                                        color: '#666',
                                        lineHeight: '1.5',
                                        margin: '0'
                                    }
                                }, whatDescription)
                            ])
                        ]),
                        el('div', {
                            style: {
                                textAlign: 'center',
                                padding: '30px',
                                background: 'linear-gradient(135deg, rgba(211,96,15,0.05) 0%, rgba(42,67,81,0.05) 100%)',
                                borderRadius: '16px',
                                border: '1px solid rgba(211,96,15,0.1)'
                            }
                        }, [
                            el('h3', {
                                style: {
                                    fontSize: '1.5rem',
                                    fontWeight: '700',
                                    color: '#2a4351',
                                    margin: '0 0 10px 0'
                                }
                            }, newsletterTitle),
                            el('p', {
                                style: {
                                    fontSize: '1rem',
                                    color: '#666',
                                    margin: '0 0 20px 0'
                                }
                            }, newsletterDescription),
                            el('div', {
                                style: {
                                    display: 'flex',
                                    gap: '10px',
                                    justifyContent: 'center',
                                    flexWrap: 'wrap',
                                    maxWidth: '400px',
                                    margin: '0 auto'
                                }
                            }, [
                                el('input', {
                                    type: 'email',
                                    placeholder: newsletterPlaceholder,
                                    style: {
                                        flex: '1',
                                        minWidth: '200px',
                                        padding: '10px 15px',
                                        border: '2px solid #e5d5c0',
                                        borderRadius: '25px',
                                        fontSize: '0.9rem',
                                        outline: 'none'
                                    }
                                }),
                                el('button', {
                                    style: {
                                        background: 'linear-gradient(135deg, #d3600f 0%, #c16134 100%)',
                                        color: 'white',
                                        padding: '10px 20px',
                                        border: 'none',
                                        borderRadius: '25px',
                                        fontSize: '0.9rem',
                                        fontWeight: '600',
                                        cursor: 'pointer',
                                        whiteSpace: 'nowrap'
                                    }
                                }, newsletterButton)
                            ])
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

