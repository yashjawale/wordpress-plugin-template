import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import Edit from './edit';
import Save from './save';
import './style.scss';

registerBlockType( metadata.name, {
	title: metadata.title,
	category: 'text',
	attributes: metadata.attributes,
	edit: Edit,
	save: Save,
} );
