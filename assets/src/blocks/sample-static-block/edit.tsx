import { RichText, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

type SampleStaticBlockAttributes = {
	content: string;
};

type SampleStaticBlockEditProps = {
	attributes: SampleStaticBlockAttributes;
	setAttributes: (
		attributes: Partial< SampleStaticBlockAttributes >
	) => void;
};

export default function Edit( {
	attributes,
	setAttributes,
}: SampleStaticBlockEditProps ) {
	const blockProps = useBlockProps();

	return (
		<RichText
			{ ...blockProps }
			tagName="p"
			value={ attributes.content }
			onChange={ ( content: string ) => setAttributes( { content } ) }
			placeholder={ __(
				'Write your static block content…',
				'wordpress-plugin-template'
			) }
		/>
	);
}
