/**
 * Scripts para bloques personalizados de Sueño Andino
 */

(function() {
    'use strict';

    // Registrar bloques dinámicamente
    if (typeof wp !== 'undefined' && wp.blocks && wp.element && wp.blockEditor && wp.components) {
        const { registerBlockType } = wp.blocks;
        const { createElement: el } = wp.element;
        const { InspectorControls, useBlockProps } = wp.blockEditor;
        const { PanelBody, TextControl, TextareaControl, Button, ButtonGroup, MediaUpload } = wp.components;

        // Hero Block
        registerBlockType('sueno-andino/hero-block', {
            edit: function(props) {
                const { attributes, setAttributes } = props;
                const { title, subtitle, backgroundImage, buttonText, leadMagnetText, leadMagnetTitle, leadMagnetDescription } = attributes;
                const blockProps = useBlockProps();

                return el('div', blockProps, [
                    el(InspectorControls, {},
                        el(PanelBody, { title: 'Configuración del Hero' },
                            el(TextControl, {
                                label: 'Título Principal',
                                value: title,
                                onChange: (value) => setAttributes({ title: value })
                            }),
                            el(TextareaControl, {
                                label: 'Subtítulo',
                                value: subtitle,
                                onChange: (value) => setAttributes({ subtitle: value }),
                                rows: 3
                            }),
                            el(TextControl, {
                                label: 'Texto del Botón Principal',
                                value: buttonText,
                                onChange: (value) => setAttributes({ buttonText: value })
                            }),
                            el(TextControl, {
                                label: 'Texto del Botón Lead Magnet',
                                value: leadMagnetText,
                                onChange: (value) => setAttributes({ leadMagnetText: value })
                            }),
                            el(TextControl, {
                                label: 'Título del Modal',
                                value: leadMagnetTitle,
                                onChange: (value) => setAttributes({ leadMagnetTitle: value })
                            }),
                            el(TextareaControl, {
                                label: 'Descripción del Modal',
                                value: leadMagnetDescription,
                                onChange: (value) => setAttributes({ leadMagnetDescription: value }),
                                rows: 2
                            }),
                            el('div', { style: { marginTop: '20px' } },
                                el('label', { style: { display: 'block', marginBottom: '8px', fontWeight: 'bold' } }, 'Imagen de Fondo'),
                                el(MediaUpload, {
                                    onSelect: (media) => setAttributes({ backgroundImage: media.url }),
                                    allowedTypes: ['image'],
                                    value: backgroundImage,
                                    render: ({ open }) => el(Button, {
                                        onClick: open,
                                        variant: 'secondary',
                                        style: { width: '100%' }
                                    }, backgroundImage ? 'Cambiar Imagen' : 'Seleccionar Imagen')
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
                            overflow: 'hidden',
                            borderRadius: '8px'
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
                return null; // Se renderiza desde PHP
            }
        });

        // Golden Circle Block
        registerBlockType('sueno-andino/golden-circle-block', {
            edit: function(props) {
                const { attributes, setAttributes } = props;
                const { title, subtitle, whyTitle, whyDescription, howTitle, howDescription, whatTitle, whatDescription, newsletterTitle, newsletterDescription, newsletterPlaceholder, newsletterButton } = attributes;
                const blockProps = useBlockProps();

                return el('div', blockProps, [
                    el(InspectorControls, {},
                        el(PanelBody, { title: 'Configuración General' },
                            el(TextControl, {
                                label: 'Título Principal',
                                value: title,
                                onChange: (value) => setAttributes({ title: value })
                            }),
                            el(TextareaControl, {
                                label: 'Subtítulo',
                                value: subtitle,
                                onChange: (value) => setAttributes({ subtitle: value }),
                                rows: 3
                            })
                        ),
                        el(PanelBody, { title: 'Sección ¿Por qué?' },
                            el(TextControl, {
                                label: 'Título',
                                value: whyTitle,
                                onChange: (value) => setAttributes({ whyTitle: value })
                            }),
                            el(TextareaControl, {
                                label: 'Descripción',
                                value: whyDescription,
                                onChange: (value) => setAttributes({ whyDescription: value }),
                                rows: 3
                            })
                        ),
                        el(PanelBody, { title: 'Sección ¿Cómo?' },
                            el(TextControl, {
                                label: 'Título',
                                value: howTitle,
                                onChange: (value) => setAttributes({ howTitle: value })
                            }),
                            el(TextareaControl, {
                                label: 'Descripción',
                                value: howDescription,
                                onChange: (value) => setAttributes({ howDescription: value }),
                                rows: 3
                            })
                        ),
                        el(PanelBody, { title: 'Sección ¿Qué?' },
                            el(TextControl, {
                                label: 'Título',
                                value: whatTitle,
                                onChange: (value) => setAttributes({ whatTitle: value })
                            }),
                            el(TextareaControl, {
                                label: 'Descripción',
                                value: whatDescription,
                                onChange: (value) => setAttributes({ whatDescription: value }),
                                rows: 3
                            })
                        ),
                        el(PanelBody, { title: 'Newsletter' },
                            el(TextControl, {
                                label: 'Título del Newsletter',
                                value: newsletterTitle,
                                onChange: (value) => setAttributes({ newsletterTitle: value })
                            }),
                            el(TextareaControl, {
                                label: 'Descripción del Newsletter',
                                value: newsletterDescription,
                                onChange: (value) => setAttributes({ newsletterDescription: value }),
                                rows: 2
                            }),
                            el(TextControl, {
                                label: 'Placeholder del Email',
                                value: newsletterPlaceholder,
                                onChange: (value) => setAttributes({ newsletterPlaceholder: value })
                            }),
                            el(TextControl, {
                                label: 'Texto del Botón',
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
                return null; // Se renderiza desde PHP
            }
        });

        // Servicios Block
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
                    el(InspectorControls, {},
                        el(PanelBody, { title: 'Configuración General' },
                            el(TextControl, {
                                label: 'Título Principal',
                                value: title,
                                onChange: (value) => setAttributes({ title: value })
                            }),
                            el(TextareaControl, {
                                label: 'Subtítulo',
                                value: subtitle,
                                onChange: (value) => setAttributes({ subtitle: value }),
                                rows: 3
                            }),
                            el(TextControl, {
                                label: 'Título CTA',
                                value: ctaTitle,
                                onChange: (value) => setAttributes({ ctaTitle: value })
                            }),
                            el(TextareaControl, {
                                label: 'Descripción CTA',
                                value: ctaDescription,
                                onChange: (value) => setAttributes({ ctaDescription: value }),
                                rows: 2
                            }),
                            el(TextControl, {
                                label: 'Texto del Botón CTA',
                                value: ctaButton,
                                onChange: (value) => setAttributes({ ctaButton: value })
                            })
                        ),
                        el(PanelBody, { title: 'Servicios' },
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
                                        label: 'Título',
                                        value: service.title,
                                        onChange: (value) => updateService(index, 'title', value)
                                    }),
                                    el(TextareaControl, {
                                        label: 'Descripción',
                                        value: service.description,
                                        onChange: (value) => updateService(index, 'description', value),
                                        rows: 2
                                    }),
                                    el(TextControl, {
                                        label: 'Icono (emoji)',
                                        value: service.icon,
                                        onChange: (value) => updateService(index, 'icon', value)
                                    }),
                                    el(TextControl, {
                                        label: 'Color',
                                        value: service.color,
                                        onChange: (value) => updateService(index, 'color', value)
                                    }),
                                    el('div', { style: { marginTop: '10px' } },
                                        el('label', { style: { display: 'block', marginBottom: '8px', fontWeight: 'bold' } }, 'Características'),
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
                                        }, 'Agregar Característica')
                                    )
                                )
                            ),
                            el(Button, {
                                isPrimary: true,
                                onClick: addService
                            }, 'Agregar Servicio')
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
                return null; // Se renderiza desde PHP
            }
        });
    }
})();