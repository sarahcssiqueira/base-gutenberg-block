/* Edit.js is where you’ll build the block admin interface */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

import '../style/editor.css';

export default function Edit() {
	return (
		<p {...useBlockProps()} className='edit'>
			{__('Basic Gutenberg Block', 'basic-block')}
		</p>
	);
}