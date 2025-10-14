(function(blocks, element, blockEditor, components) {
    const { registerBlockType } = blocks;
    const { createElement: el } = element;
    const { InspectorControls, useBlockProps } = blockEditor;
    const { PanelBody, TextControl, TextareaControl } = components;

    registerBlockType('sueno-andino/hero-block', {
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { tituloLinea1, tituloLinea2, subtitulo, textoBoton, enlaceBoton } = attributes;
            const blockProps = useBlockProps();

            return el('div', blockProps, [
                el(InspectorControls, {},
                    el(PanelBody, { title: 'Configuración del Hero' },
                        el(TextControl, {
                            label: 'Título Línea 1 (Blanco)',
                            value: tituloLinea1,
                            onChange: (value) => setAttributes({ tituloLinea1: value })
                        }),
                        el(TextControl, {
                            label: 'Título Línea 2 (Naranja)',
                            value: tituloLinea2,
                            onChange: (value) => setAttributes({ tituloLinea2: value })
                        }),
                        el(TextareaControl, {
                            label: 'Subtítulo',
                            value: subtitulo,
                            onChange: (value) => setAttributes({ subtitulo: value }),
                            rows: 3
                        }),
                        el(TextControl, {
                            label: 'Texto del Botón',
                            value: textoBoton,
                            onChange: (value) => setAttributes({ textoBoton: value })
                        }),
                        el(TextControl, {
                            label: 'Enlace del Botón',
                            value: enlaceBoton,
                            onChange: (value) => setAttributes({ enlaceBoton: value })
                        })
                    )
                ),
                el('div', {
                    style: {
                        background: 'linear-gradient(135deg, #2a4351 0%, #1e3a47 100%)',
                        minHeight: '60vh',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        color: 'white',
                        textAlign: 'center',
                        padding: '2rem',
                        position: 'relative',
                        overflow: 'hidden'
                    }
                }, [
                    el('div', {
                        style: {
                            maxWidth: '900px',
                            zIndex: 2,
                            position: 'relative'
                        }
                    }, [
                        el('h1', {
                            style: {
                                fontSize: 'clamp(2rem, 5vw, 3rem)',
                                fontWeight: '800',
                                margin: '0 0 2rem 0',
                                lineHeight: '1.1',
                                fontFamily: 'Playfair Display, serif',
                                textShadow: '0 6px 12px rgba(0,0,0,0.6)'
                            }
                        }, [
                            el('div', {
                                style: {
                                    color: 'white',
                                    marginBottom: '0.5rem'
                                }
                            }, tituloLinea1),
                            el('div', {
                                style: {
                                    color: '#d3600f'
                                }
                            }, tituloLinea2)
                        ]),
                        el('p', {
                            style: {
                                fontSize: 'clamp(1.25rem, 3vw, 1.75rem)',
                                fontWeight: '300',
                                lineHeight: '1.4',
                                margin: '0 0 2rem 0',
                                textShadow: '0 2px 4px rgba(0,0,0,0.3)'
                            }
                        }, subtitulo),
                        el('a', {
                            href: enlaceBoton,
                            style: {
                                background: 'linear-gradient(135deg, #d3600f 0%, #c16134 100%)',
                                color: 'white',
                                padding: '1rem 2.5rem',
                                borderRadius: '0.75rem',
                                textDecoration: 'none',
                                fontWeight: '700',
                                fontSize: '1rem',
                                textTransform: 'uppercase',
                                letterSpacing: '0.05em',
                                display: 'inline-block',
                                boxShadow: '0 10px 25px -5px rgba(211,96,15,0.4)'
                            }
                        }, textoBoton)
                    ])
                ])
            ]);
        },
        save: function() {
            return null; // Se renderiza desde PHP
        }
    });
})(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components
);
