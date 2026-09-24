import { RichText, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

type SampleDynamicBlockAttributes = {
	content: string;
};

type SampleDynamicBlockEditProps = {
	attributes: SampleDynamicBlockAttributes;
	setAttributes: (
		attributes: Partial< SampleDynamicBlockAttributes >
	) => void;
};

export default function Edit( {
	attributes,
	setAttributes,
}: SampleDynamicBlockEditProps ) {
	const blockProps = useBlockProps();

	return (
		<RichText
			{ ...blockProps }
			tagName="p"
			value={ attributes.content }
			onChange={ ( content: string ) => setAttributes( { content } ) }
			placeholder={ __(
				'Write your dynamic block content…',
				'wordpress-plugin-template'
			) }
		/>
	);
}
