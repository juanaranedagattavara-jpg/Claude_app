(function(blocks, element, blockEditor, components, i18n) {
    const { registerBlockType } = blocks;
    const { createElement: el, Fragment } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl, Button, ButtonGroup } = components;
    const { __ } = i18n;

    registerBlockType('sueno-andino/contacto-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, subtitle, formFields, buttonText, successMessage, errorMessage } = attributes;
            const blockProps = useBlockProps();

            const addFormField = () => {
                const newFields = [...formFields, {
                    name: 'nuevo_campo',
                    label: 'Nuevo Campo',
                    type: 'text',
                    placeholder: 'Placeholder del campo',
                    required: false
                }];
                setAttributes({ formFields: newFields });
            };

            const removeFormField = (index) => {
                const newFields = formFields.filter((_, i) => i !== index);
                setAttributes({ formFields: newFields });
            };

            const updateFormField = (index, field, value) => {
                const newFields = [...formFields];
                newFields[index] = { ...newFields[index], [field]: value };
                setAttributes({ formFields: newFields });
            };

            const moveFormField = (index, direction) => {
                const newFields = [...formFields];
                const newIndex = direction === 'up' ? index - 1 : index + 1;
                if (newIndex >= 0 && newIndex < newFields.length) {
                    [newFields[index], newFields[newIndex]] = [newFields[newIndex], newFields[index]];
                    setAttributes({ formFields: newFields });
                }
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
                            label: __('Texto del Botón', 'sueno-andino'),
                            value: buttonText,
                            onChange: (value) => setAttributes({ buttonText: value })
                        }),
                        el(TextControl, {
                            label: __('Mensaje de Éxito', 'sueno-andino'),
                            value: successMessage,
                            onChange: (value) => setAttributes({ successMessage: value })
                        }),
                        el(TextControl, {
                            label: __('Mensaje de Error', 'sueno-andino'),
                            value: errorMessage,
                            onChange: (value) => setAttributes({ errorMessage: value })
                        })
                    ),
                    el(PanelBody, { title: __('Campos del Formulario', 'sueno-andino'), initialOpen: true },
                        formFields.map((field, index) => 
                            el('div', { key: index, style: { marginBottom: '20px', padding: '15px', border: '1px solid #ddd', borderRadius: '8px', backgroundColor: '#f9f9f9' } },
                                el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '10px' } },
                                    el('h4', { style: { margin: 0 } }, `Campo ${index + 1}`),
                                    el(ButtonGroup, {},
                                        el(Button, {
                                            isSmall: true,
                                            onClick: () => moveFormField(index, 'up'),
                                            disabled: index === 0
                                        }, '↑'),
                                        el(Button, {
                                            isSmall: true,
                                            onClick: () => moveFormField(index, 'down'),
                                            disabled: index === formFields.length - 1
                                        }, '↓'),
                                        el(Button, {
                                            isDestructive: true,
                                            isSmall: true,
                                            onClick: () => removeFormField(index)
                                        }, 'Eliminar')
                                    )
                                ),
                                el(TextControl, {
                                    label: __('Nombre del Campo', 'sueno-andino'),
                                    value: field.name,
                                    onChange: (value) => updateFormField(index, 'name', value)
                                }),
                                el(TextControl, {
                                    label: __('Etiqueta', 'sueno-andino'),
                                    value: field.label,
                                    onChange: (value) => updateFormField(index, 'label', value)
                                }),
                                el('div', { style: { marginTop: '10px' } },
                                    el('label', { style: { display: 'block', marginBottom: '8px', fontWeight: 'bold' } }, __('Tipo de Campo', 'sueno-andino')),
                                    el(ButtonGroup, {},
                                        ['text', 'email', 'tel', 'textarea'].map(type =>
                                            el(Button, {
                                                key: type,
                                                isPrimary: field.type === type,
                                                isSmall: true,
                                                onClick: () => updateFormField(index, 'type', type)
                                            }, type.charAt(0).toUpperCase() + type.slice(1))
                                        )
                                    )
                                ),
                                el(TextControl, {
                                    label: __('Placeholder', 'sueno-andino'),
                                    value: field.placeholder,
                                    onChange: (value) => updateFormField(index, 'placeholder', value)
                                }),
                                field.type === 'textarea' && el(TextControl, {
                                    label: __('Filas', 'sueno-andino'),
                                    type: 'number',
                                    value: field.rows || 5,
                                    onChange: (value) => updateFormField(index, 'rows', parseInt(value))
                                }),
                                el('div', { style: { marginTop: '10px' } },
                                    el('label', { style: { display: 'flex', alignItems: 'center', gap: '8px' } },
                                        el('input', {
                                            type: 'checkbox',
                                            checked: field.required,
                                            onChange: (e) => updateFormField(index, 'required', e.target.checked)
                                        }),
                                        'Campo requerido'
                                    )
                                )
                            )
                        ),
                        el(Button, {
                            isPrimary: true,
                            onClick: addFormField
                        }, __('Agregar Campo', 'sueno-andino'))
                    )
                ),
                el('div', {
                    style: {
                        background: 'linear-gradient(135deg, #2a4351 0%, #1e3a47 100%)',
                        padding: '60px 20px',
                        borderRadius: '12px',
                        border: '2px dashed #ddd',
                        color: 'white'
                    }
                }, [
                    el('div', {
                        style: {
                            maxWidth: '800px',
                            margin: '0 auto',
                            textAlign: 'center'
                        }
                    }, [
                        el('h2', {
                            style: {
                                fontSize: '3rem',
                                fontWeight: '700',
                                color: 'white',
                                margin: '0 0 20px 0',
                                fontFamily: 'Playfair Display, serif'
                            }
                        }, title),
                        el('p', {
                            style: {
                                fontSize: '1.3rem',
                                color: 'rgba(255,255,255,0.8)',
                                margin: '0 0 40px 0',
                                lineHeight: '1.6',
                                maxWidth: '600px',
                                marginLeft: 'auto',
                                marginRight: 'auto'
                            }
                        }, subtitle),
                        el('div', {
                            style: {
                                maxWidth: '600px',
                                margin: '0 auto',
                                background: 'rgba(255,255,255,0.15)',
                                backdropFilter: 'blur(15px)',
                                borderRadius: '1.5rem',
                                padding: '3rem',
                                border: '1px solid rgba(255,255,255,0.3)',
                                boxShadow: '0 20px 40px rgba(0,0,0,0.2)'
                            }
                        }, [
                            el('div', {
                                style: {
                                    display: 'grid',
                                    gridTemplateColumns: 'repeat(1, 1fr)',
                                    gap: '1.5rem',
                                    marginBottom: '2rem'
                                }
                            }, formFields.map((field, index) =>
                                el('div', {
                                    key: index,
                                    style: {
                                        textAlign: 'left'
                                    }
                                }, [
                                    el('label', {
                                        style: {
                                            display: 'block',
                                            color: 'white',
                                            fontWeight: '500',
                                            marginBottom: '0.5rem',
                                            fontSize: '0.875rem'
                                        }
                                    }, [
                                        field.label,
                                        field.required && el('span', { style: { color: '#d3600f' } }, ' *')
                                    ]),
                                    field.type === 'textarea' ? 
                                        el('textarea', {
                                            placeholder: field.placeholder,
                                            rows: field.rows || 5,
                                            style: {
                                                width: '100%',
                                                padding: '1rem',
                                                border: '2px solid rgba(255,255,255,0.2)',
                                                borderRadius: '0.75rem',
                                                background: 'rgba(255,255,255,0.1)',
                                                color: 'white',
                                                fontSize: '1rem',
                                                outline: 'none',
                                                resize: 'vertical'
                                            }
                                        }) :
                                        el('input', {
                                            type: field.type,
                                            placeholder: field.placeholder,
                                            style: {
                                                width: '100%',
                                                padding: '1rem',
                                                border: '2px solid rgba(255,255,255,0.2)',
                                                borderRadius: '0.75rem',
                                                background: 'rgba(255,255,255,0.1)',
                                                color: 'white',
                                                fontSize: '1rem',
                                                outline: 'none'
                                            }
                                        })
                                ])
                            )),
                            el('button', {
                                style: {
                                    width: '100%',
                                    padding: '1.25rem 2rem',
                                    fontSize: '1.125rem',
                                    fontWeight: '700',
                                    textTransform: 'uppercase',
                                    letterSpacing: '0.05em',
                                    background: 'linear-gradient(135deg, #d3600f 0%, #c16134 100%)',
                                    color: 'white',
                                    border: 'none',
                                    borderRadius: '0.75rem',
                                    cursor: 'pointer',
                                    boxShadow: '0 10px 25px -5px rgba(211,96,15,0.4)'
                                }
                            }, buttonText)
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
