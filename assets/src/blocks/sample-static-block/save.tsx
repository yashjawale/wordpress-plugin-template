import { RichText, useBlockProps } from '@wordpress/block-editor';

type SampleStaticBlockAttributes = {
	content: string;
};

type SampleStaticBlockSaveProps = {
	attributes: SampleStaticBlockAttributes;
};

export default function Save( { attributes }: SampleStaticBlockSaveProps ) {
	return (
		<RichText.Content
			{ ...useBlockProps.save() }
			tagName="p"
			value={ attributes.content }
		/>
	);
}
