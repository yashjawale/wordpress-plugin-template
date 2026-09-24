const blockSelector = '.wp-block-wordpress-plugin-template-sample-static-block';

document
	.querySelectorAll< HTMLElement >( blockSelector )
	.forEach( ( block ) => {
		block.dataset.viewInitialized = 'true';
	} );

export {};
