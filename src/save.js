/* The save.js file is where we build the block structure to be saved into the database */

import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function Save() {
	
	return (
		<p {...useBlockProps.save()}>
			{__(
				'Content provided for the Basic Block Plugin',
				'basic-block'
			)}
		</p>
	);
}