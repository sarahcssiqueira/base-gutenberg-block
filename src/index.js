/* WordPress Dependencies */
import { registerBlockType } from '@wordpress/blocks';

/* Style */
import '../style/style.css';

/* Imports */
import Edit from './edit';
import Save from './save';
import metadata from '../block.json';


registerBlockType( 
	metadata, {
		edit: Edit,
		save: Save
	} 
)