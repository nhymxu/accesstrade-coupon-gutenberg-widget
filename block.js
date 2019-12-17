( function( blocks, element, serverSideRender ) {
 
    var el = element.createElement,
    registerBlockType = blocks.registerBlockType,
    ServerSideRender = serverSideRender;
 
    registerBlockType( 'nx-at-coupon-gutenberg-block', {
        title: 'AT coupon',
        icon: 'megaphone',
        category: 'widgets',
 
        edit: function( props ) {
 
            return (
                el(ServerSideRender, {
                    block: "nx-at-coupon-gutenberg-block",
                    attributes: props.attributes
                } )
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.serverSideRender,
) );
