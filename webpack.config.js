const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...defaultConfig,
	entry: () => ( {
		main: path.resolve( __dirname, 'assets/src/js/main.ts' ),
		blocks: path.resolve( __dirname, 'assets/src/js/blocks.ts' ),
		editor: path.resolve( __dirname, 'assets/src/js/editor.ts' ),
		...defaultConfig.entry(),
	} ),
};
