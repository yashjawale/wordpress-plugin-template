const blockSelector =
	'.wp-block-wordpress-plugin-template-sample-dynamic-block';

document
	.querySelectorAll< HTMLElement >( blockSelector )
	.forEach( ( block ) => {
		block.dataset.viewInitialized = 'true';
	} );

export {};
